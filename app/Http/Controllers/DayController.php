<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Direction;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexForUser()
    {   
        $days = Day::where('date', '>=', date("Y-m-d"))->where('status', true)->orderBy('date', 'asc')->get();
        return response()->view('days.index',[
            'days' => $days,
        ]);
    }
    public function indexForModerator(Request $request)
    {   
        $status = $request->query('status') ?? null;
        $search = $request->query('search') ?? null;
        $date = $request->query('date') ?? null;
        
        $days = Day::when($status !== null, function (Builder $query) use ($status) {
            if($status == '-'){ 
                $query->where('date', '<', date("Y-m-d"));
            }else{ 
                $query->where('status', $status)->where('date', '>=', date("Y-m-d"));
            }
        })->when($search, function (Builder $query, string $search) {
            $query->whereAny([
                'title','direction','address',
            ], 'like', "%$search%");
        })->when($date, function (Builder $query, string $date) {
            $query->where('date', $date);
        })->orderBy('date', 'desc')->get();

        $days = $days->fresh('direction');
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
        $day = Day::where('date', '>=', date("Y-m-d"))->find($id);

        if(!$day) abort(404, '«День открытых дверей» не найден');

        $directions = Direction::all();
        return response()->view('days.edit', [
            'day' => $day,
            'directions' => $directions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $day = Day::where('date', '>=', date("Y-m-d"))->find($id);

        if(!$day) abort(404, '«День открытых дверей» не найден');

        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'time' => ['required', 'date_format:H:i'],
            'date' => ['required', Rule::date()->format('Y-m-d'), 'after:tomorrow'],
            'address' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:65000'],
            'direction_id' => ['nullable', 'integer', 'exists:directions,id'],
        ]);

        $day->update($validated);

        return redirect()->route('days.index');
    }

    public function setStatus(string $id)
    {
        $day = Day::where('date', '>=', date("Y-m-d"))->find($id);

        if(!$day) abort(404, '«День открытых дверей» не найден');
        
        $day->update(['status' => !$day->status]);
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $day = Day::where('date', '>=', date("Y-m-d"))->find($id)->delete();

        if(!$day) abort(404, '«День открытых дверей» не найден');

        return redirect()->back();
    }
}
