<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Day;
use App\Models\EducationalInstitution;
use App\Models\Recording;
use Illuminate\Http\Request;

class RecordingConroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $recordings = Recording::where('day_id', $id)->get();
        return response()->view('recordings.index', [
            'recordings' => $recordings,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $day = Day::where('date', '>=', date("Y-m-d"))->find($id);

        if(!$day) abort(404, '«День открытых дверей» не найден');

        $educational_institutions = EducationalInstitution::all();
        $courses = Course::all();
        return response()->view('recordings.create', [
            'day' => $day,
            'educational_institutions' => $educational_institutions,
            'courses' => $courses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $day = Day::where('date', '>=', date("Y-m-d"))->find($id);

        if(!$day) abort(404, '«День открытых дверей» не найден');

        $validated = $request->validate([
            'day_id' => ['nullable', 'string', 'max:255'],
            'educational_institution_id' => ['required', 'integer', 'exists:educational_institutions,id'],
            'course_id' => ['required', 'integer', 'exists:courses,id'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'email:rfc,dns'],
            'name_institution' => ['required', 'string', 'max:255'],
        ]);

        $validated['day_id'] = $day->id;

        Recording::create($validated);

        return redirect()->route('page.index');
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
