<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Officer;
use App\Http\Requests\StoreOfficerRequest;
use App\Http\Requests\UpdateOfficerRequest;
use App\Services\OfficerService;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    protected OfficerService $officerService;

    public function __construct(OfficerService $officerService)
    {
        $this->officerService = $officerService;
    }

    public function index(Request $request)
    {
        $data = $this->officerService->getOfficersList($request);
        return view('officers.index', $data);
    }

    public function create(Request $request)
    {
        $data = $this->officerService->prepareCreateData($request);
        return view('officers.create', $data);
    }

    public function store(StoreOfficerRequest $request)
    {
        $this->officerService->storeOfficer($request);

        return redirect()
            ->route('officers.index', ['board_id' => $request->validated()['board_id']])
            ->with('success', 'Officer added successfully!');
    }

    public function show(Officer $officer)
    {
        return view('officers.partials.show', compact('officer'));
    }

    public function edit(Officer $officer)
    {
        $data = $this->officerService->prepareEditData($officer);
        return view('officers.edit', $data);
    }

    public function update(UpdateOfficerRequest $request, Officer $officer)
    {
        $this->officerService->updateOfficer($request, $officer);

        return redirect()
            ->route('officers.index', ['board_id' => $request->validated()['board_id']])
            ->with('success', 'Officer updated successfully!');
    }

    public function destroy(Officer $officer)
    {
        $board_id = $officer->board_id;
        $this->officerService->deleteOfficer($officer);

        return redirect()
            ->route('officers.index', ['board_id' => $board_id])
            ->with('success', 'Officer deleted successfully!');
    }
}
