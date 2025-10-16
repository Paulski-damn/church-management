<?php

namespace App\Http\Controllers;

use App\Models\Officer;
use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfficerController extends Controller
{
    public function index(Request $request)
    {
        $boards = Board::active()->orderBy('display_order')->get();
        $selectedBoardId = $request->query('board_id') ?? ($boards->first()?->id ?? null);

        // Get selected board or first board
        $selectedBoard = $selectedBoardId
            ? Board::findOrFail($selectedBoardId)
            : $boards->first();

        // Get officers for selected board
        $officers = $selectedBoard
            ? $selectedBoard->activeOfficers()->get()
            : collect();

        return view('officers.index', compact('boards', 'selectedBoard', 'officers'));
    }

    public function create(Request $request)
    {
        $boards = Board::active()->get();
        $selectedBoardId = $request->query('board_id');
        $selectedBoard = $selectedBoardId ? Board::findOrFail($selectedBoardId) : null;

        $positions = [
            'President/Chairperson',
            'Vice President/Vice Chair',
            'Secretary',
            'Treasurer',
            'Auditor',
            'Member',
            'Committee Head',
            'Director'
        ];

        $hierarchyLevels = [
            0 => 'President/Chairperson (Top)',
            1 => 'Vice President/Vice Chair',
            2 => 'Secretary/Treasurer',
            3 => 'Member/Director',
            4 => 'Committee Head',
        ];

        return view('officers.create', compact('boards', 'selectedBoard', 'positions', 'hierarchyLevels'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'board_id' => 'required|exists:boards,id',
            'hierarchy_level' => 'required|integer|min:0|max:4',
            'bio' => 'nullable|string|max:1000',
            'email' => 'nullable|email|max:255',
            'contact_number' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer|min:0',
            'term_start' => 'nullable|date',
            'term_end' => 'nullable|date|after_or_equal:term_start',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('officers', 'public');
            $validated['photo_path'] = $photoPath;
        }

        $validated['status'] = 'active';
        $validated['order'] = $validated['order'] ?? 0;

        Officer::create($validated);

        return redirect()->route('officers.index', ['board_id' => $validated['board_id']])
            ->with('success', 'Officer added successfully!');
    }

    public function show(Officer $officer)
    {

        return view('officers.partials.show', compact('officer')); // fallback full page if needed
    }

    public function edit(Officer $officer)
    {
        $boards = Board::active()->get();

        $positions = [
            'President/Chairperson',
            'Vice President/Vice Chair',
            'Secretary',
            'Treasurer',
            'Auditor',
            'Member',
            'Committee Head',
            'Director'
        ];

        $hierarchyLevels = [
            0 => 'President/Chairperson (Top)',
            1 => 'Vice President/Vice Chair',
            2 => 'Secretary/Treasurer',
            3 => 'Member/Director',
            4 => 'Committee Head',
        ];

        return view('officers.edit', compact('officer', 'boards', 'positions', 'hierarchyLevels'));
    }

    public function update(Request $request, Officer $officer)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'board_id' => 'required|exists:boards,id',
            'hierarchy_level' => 'required|integer|min:0|max:4',
            'bio' => 'nullable|string|max:1000',
            'email' => 'nullable|email|max:255',
            'contact_number' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer|min:0',
            'status' => 'required|in:active,inactive',
            'term_start' => 'nullable|date',
            'term_end' => 'nullable|date|after_or_equal:term_start',
        ]);

        if ($request->hasFile('photo')) {
            if ($officer->photo_path) {
                Storage::disk('public')->delete($officer->photo_path);
            }

            $photoPath = $request->file('photo')->store('officers', 'public');
            $validated['photo_path'] = $photoPath;
        }

        $officer->update($validated);

        return redirect()->route('officers.index', ['board_id' => $validated['board_id']])
            ->with('success', 'Officer updated successfully!');
    }

    public function destroy(Officer $officer)
    {
        $boardId = $officer->board_id;

        if ($officer->photo_path) {
            Storage::disk('public')->delete($officer->photo_path);
        }

        $officer->delete();

        return redirect()->route('officers.index', ['board_id' => $boardId])
            ->with('success', 'Officer deleted successfully!');
    }
}