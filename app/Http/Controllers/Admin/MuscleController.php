<?php

namespace App\Http\Controllers\Admin;

use App\Models\BodyPart;
use App\Models\Muscle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MuscleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $muscles = Muscle::with('partOfBody')->get();

        return view('admin.muscles.index', [
            'muscles' => $muscles
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

        return view('admin.muscles.create', [
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
            'muscle_name' => 'required'
        ]);

        Muscle::create([
            'body_part_id' => $request->body_part_id,
            'muscle_name' => $request->muscle_name
        ]);

        return redirect('/admin/muscles');
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
        $bodyParts = BodyPart::where('active', 1)->orderBy('body_part')->get();

        $muscle = Muscle::with('partOfBody')->findOrFail($id);

        return view('admin.muscles.edit', [
            'bodyParts' => $bodyParts,
            'muscle' => $muscle
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
            'muscle_name' => 'required'
        ]);

        $muscle = Muscle::findOrFail($id);

        $muscle->update([
            'body_part_id' => $request->body_part_id,
            'muscle_name' => $request->muscle_name,
            'active' => (!empty($request->active)) ? 1 : 0
        ]);

        return redirect('/admin/muscles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $muscle = Muscle::findOrFail($id);

        $muscle->delete();

        return redirect('/admin/muscles');
    }
}
