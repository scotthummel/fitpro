<?php

namespace App\Http\Controllers\Admin;

use App\Models\BodyPart;
use App\Models\Exercise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercises = Exercise::with('partOfBody')->get();

        return view('admin.exercises.index', [
            'exercises' => $exercises
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bodyParts = BodyPart::where('active', 1)->orderBy('body_part')->get();

        return view('admin.exercises.create', [
            'bodyParts' => $bodyParts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'body_part_id' => 'required',
            'exercise_name' => 'required'
        ]);

        Exercise::create([
            'body_part_id' => $request->body_part_id,
            'exercise_name' => $request->exercise_name
        ]);

        return redirect('/admin/exercises');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exercise = Exercise::with('partOfBody')->findOrFail($id);

        $bodyParts = BodyPart::where('active', 1)->orderBy('body_part')->get();

        return view('admin.exercises.edit', [
            'exercise' => $exercise,
            'bodyParts' => $bodyParts
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'body_part_id' => 'required',
            'exercise_name' => 'required'
        ]);

        $exercise = Exercise::findOrFail($id);

        $exercise->update([
            'body_part_id' => $request->body_part_id,
            'exercise_name' => $request->exercise_name,
            'active' => (!empty($request->active)) ? 1 : 0
        ]);

        return redirect('/admin/exercises');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exercise = Exercise::findOrFail($id);

        $exercise->delete();

        return redirect('/admin/exercises');
    }
}
