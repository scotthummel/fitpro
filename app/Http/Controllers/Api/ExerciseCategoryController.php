<?php

namespace App\Http\Controllers\Api;

use App\FitPro\Transformers\ExerciseCategoryTransformer;
use App\Http\Controllers\ApiController;
use App\Models\ExerciseCategory;
use Illuminate\Http\Request;

class ExerciseCategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param ExerciseCategoryTransformer $transformer
     * @return \Illuminate\Http\Response
     */
    public function index(ExerciseCategoryTransformer $transformer)
    {
        $categories = ExerciseCategory::where('active', 1)->orderBy('category_name')->get();

        return $this->respond([
            'data' => $transformer->transformCollection($categories->toArray())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
