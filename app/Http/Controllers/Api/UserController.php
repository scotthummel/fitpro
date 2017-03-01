<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Fitpro\Transformers\UserTransformer;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param UserTransformer $transformer
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, UserTransformer $transformer)
    {
        if (!empty($request->query('search'))) {
            $bodyParts = User::where('active', 1)
                ->where('first_name', 'LIKE', '%' . $request->search, '%')
                ->orWhere('last_name', 'LIKE', '%' . $request->search, '%')
                ->orWhere('email', 'LIKE', '%' . $request->search, '%')
                ->orderBy('last_name')
                ->get();
        } else {
            $bodyParts = User::where('active', 1)->orderBy('last_name')->get();
        }

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
