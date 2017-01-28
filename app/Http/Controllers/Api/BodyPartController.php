<?php

namespace App\Http\Controllers\Api;

use App\FitPro\Transformers\BodyPartTransformer;
use App\Http\Controllers\ApiController;
use App\Models\BodyPart;
use Illuminate\Http\Request;

class BodyPartController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param BodyPartTransformer $transformer
     * @return \Illuminate\Http\Response
     */
    public function index(BodyPartTransformer $transformer)
    {
        $bodyParts = BodyPart::where('active', 1)->orderBy('body_part')->get();

        return $this->respond([
            'data' => $transformer->transformCollection($bodyParts->toArray())
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
