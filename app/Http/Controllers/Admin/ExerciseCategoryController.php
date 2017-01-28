<?php

namespace App\Http\Controllers\Admin;

use App\Models\ExerciseCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExerciseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ExerciseCategory::orderBy('category_name')->get();

        return view('admin.exercise-categories.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.exercise-categories.create');
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
            'category_name' => 'required'
        ]);

        ExerciseCategory::create([
            'category_name' => $request->category_name
        ]);

        return redirect('/admin/exercise-categories');
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
        $category = ExerciseCategory::findOrFail($id);

        return view('admin.exercise-categories.edit', [
            'category' => $category
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
            'category_name' => 'required'
        ]);

        $category = ExerciseCategory::findOrFail($id);

        $category->update([
            'category_name' => $request->category_name,
            'active' => (!empty($request->active)) ? 1 : 0
        ]);

        return redirect('/admin/exercise-categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = ExerciseCategory::findOrFail($id);

        $category->delete();

        return redirect('/admin/exercise-categories');
    }
}
