<?php

namespace App\Services;

use App\Models\Board;
use App\Models\Officer;
use App\Http\Requests\StoreOfficerRequest;
use App\Http\Requests\UpdateOfficerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfficerService
{
    public function getOfficersList(Request $request): array
    {
        $boards = Board::active()->orderBy('display_order')->get();
        $selectedBoardId = $request->query('board_id') ?? ($boards->first()?->id ?? null);

        $selectedBoard = $selectedBoardId
            ? Board::findOrFail($selectedBoardId)
            : $boards->first();

        $officers = $selectedBoard
            ? $selectedBoard->activeOfficers()->get()
            : collect();

        return compact('boards', 'selectedBoard', 'officers');
    }

    public function prepareCreateData(Request $request): array
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
            'Director',
        ];

        $hierarchyLevels = [
            0 => 'President/Chairperson (Top)',
            1 => 'Vice President/Vice Chair',
            2 => 'Secretary/Treasurer',
            3 => 'Member/Director',
            4 => 'Committee Head',
        ];

        return compact('boards', 'selectedBoard', 'positions', 'hierarchyLevels');
    }

    public function prepareEditData(Officer $officer): array
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
            'Director',
        ];

        $hierarchyLevels = [
            0 => 'President/Chairperson (Top)',
            1 => 'Vice President/Vice Chair',
            2 => 'Secretary/Treasurer',
            3 => 'Member/Director',
            4 => 'Committee Head',
        ];

        return compact('officer', 'boards', 'positions', 'hierarchyLevels');
    }


    public function storeOfficer(StoreOfficerRequest $request): void
    {
    /** @var \Illuminate\Http\Request|\App\Http\Requests\StoreOfficerRequest $request */

        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            $validated['photo_path'] = $request->file('photo')->store('officers', 'public');
        }

        $board = Board::find($validated['board_id']);
        $validated['department'] = $board->name ?? null;
        $validated['status'] = 'active';
        $validated['order'] = $validated['order'] ?? 0;

        Officer::create($validated);
    }

    public function updateOfficer(UpdateOfficerRequest $request, Officer $officer): void
    {
    /** @var \Illuminate\Http\Request|\App\Http\Requests\UpdateOfficerRequest $request */

        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            if ($officer->photo_path) {
                Storage::disk('public')->delete($officer->photo_path);
            }
            $validated['photo_path'] = $request->file('photo')->store('officers', 'public');
        }

        $validated['order'] = $validated['order'] ?? $officer->order ?? 0;
        $board = Board::find($validated['board_id']);
        $validated['department'] = $board->name ?? null;

        $officer->update($validated);
    }

    public function deleteOfficer(Officer $officer): void
    {
        if ($officer->photo_path) {
            Storage::disk('public')->delete($officer->photo_path);
        }

        $officer->delete();
    }
}
