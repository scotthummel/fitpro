<?php

namespace App\Http\Controllers\Api;

use App\Fitpro\Transformers\ExerciseTransformer;
use App\Http\Controllers\ApiController;
use App\Models\Exercise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExerciseController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param ExerciseTransformer $transformer
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ExerciseTransformer $transformer)
    {
        if (!empty($request->query('part_id'))) {
            $exercises = Exercise::where('active', 1)
                ->where('body_part_id', $request->query('part_id'))
                ->orderBy('exercise_name')
                ->get();
        } else {
            $exercises = Exercise::where('active', 1)
                ->orderBy('exercise_name')
                ->get();
        }

        return $this->respond([
            'data' => $transformer->transformCollection($exercises->toArray())
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
