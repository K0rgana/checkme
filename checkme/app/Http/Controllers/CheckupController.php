<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('checkup.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'data_checkup'=>'required',
            'peso'=>'required',
            'altura'=>'required',
            'art_pressao'=>'required',
            'glicose'=>'required',
            'colesterol_ldl'=>'required',
            'colesterol_hdl'=>'required',
            'observacoes'=>'required'
        ]);

        $checkup = new Checkup([
            'data_checkup' => $request->get('data_checkup'),
            'peso' => $request->get('peso'),
            'altura' => $request->get('altura'),
            'art_pressao' => $request->get('art_pressao'),
            'glicose' => $request->get('glicose'),
            'colesterol_ldl' => $request->get('colesterol_ldl'),
            'colesterol_hdl' => $request->get('colesterol_hdl'),
            'observacoes' => $request->get('observacoes')
        ]);
        $checkup->save();
        return redirect('/checkup')->with('success', 'Checkup criado com sucesso!');
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
