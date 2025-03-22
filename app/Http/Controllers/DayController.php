<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Direction;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexForUser()
    {
        return response()->view('days.index');
    }
    public function indexForModerator()
    {   
        $days = Day::all();
        $days->fresh('direction');
        return response()->view('days.index', [
            'moderator' => true,
            'days' => $days,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $directions = Direction::all();
        return response()->view('days.create', [
            'directions' => $directions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'time' => ['required', 'date_format:H:i'],
            'date' => ['required', Rule::date()->format('Y-m-d'), 'after:tomorrow'],
            'address' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:65000'],
            'direction_id' => ['nullable', 'integer', 'exists:directions,id'],
        ]);
        Day::create($validated);
        return redirect()->route('days.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function setStatus(string $id)
    {
        $user = Day::find($id);
        
        $user->update(['status' => !$user->status]);
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
