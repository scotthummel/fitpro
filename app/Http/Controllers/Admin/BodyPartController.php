<?php

namespace App\Http\Controllers\Admin;

use App\Models\BodyPart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BodyPartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bodyParts = BodyPart::orderBy('body_part')->get();

        return view('admin.body-parts.index', [
            'bodyParts' => $bodyParts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.body-parts.create');
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
            'body_part' => 'required'
        ]);

        BodyPart::create([
           'body_part' => $request->body_part
        ]);

        return redirect('/admin/body-parts');
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
        $bodyPart = BodyPart::findOrFail($id);

        return view('admin.body-parts.edit', [
            'bodyPart' => $bodyPart
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
        $bodyPart = BodyPart::findOrFail($id);

        $bodyPart->update([
            'body_part' => $request->body_part,
            'active' => (!empty($request->active)) ? 1 : 0
        ]);

        return redirect('/admin/body-parts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bodyPart = BodyPart::findOrFail($id);

        $bodyPart->delete();

        return redirect('/admin/body-parts');
    }
}
