<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Checkup;

class CheckupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->tipo != 'medico'){
            $checkups = Checkup::all()->where('fk_users_id',Auth::user()->id);
            return view('checkup.listapac', compact('checkups'));
        }
        $checkups = Checkup::orderBy('created_at', 'description')->paginate(10);
        return view('checkup.listamed', compact('checkups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->tipo == 'medico'){
            $usu = User::All()->where('tipo','usuario');
            return view('checkup.form', compact('usuario'));
        }
        
        return redirect()->route('home');

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
            'fk_users_id' => 'required|numeric|min:0',
            'data_checkup'=>'required|date|min:4|max:10',
            'peso'=>'required|numeric|min:0.1|max:400',
            'altura'=>'required|numeric|min:0.1|max:3',
            'art_pressao'=>'required|string|min:4|max:30',
            'glicose'=>'required|numeric|integer|min:1|max:200',
            'colesterol_ldl'=>'required|numeric|min:1|max:200',
            'colesterol_hdl'=>'required|numeric|min:2|max:100',
            'observacoes'=>'required|string|min:1|max:500'
        ]);

        $checkup = new Checkup([
            'fk_users_id' => $request->get('fk_users_id'),
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
        return redirect('checkup.index')->with('success', 'Checkup criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $checkup = Checkup::find($id);
        return view('checkup.show', compact('checkup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->tipo == 'medico'){
            $checkup = Checkup::find($id);
            return view('checkup.edit', compact('checkup'));

        }
        return redirect()->route('home');
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
        $request->validate([
            'data_checkup'=>'required|date|min:4|max:10',
            'peso'=>'required|numeric|min:0.1|max:400',
            'altura'=>'required|numeric|min:0.1|max:3',
            'art_pressao'=>'required|string|min:4|max:30',
            'glicose'=>'required|numeric|integer|min:1|max:200',
            'colesterol_ldl'=>'required|numeric|min:1|max:200',
            'colesterol_hdl'=>'required|numeric|min:2|max:100',
            'observacoes'=>'required|string|min:1|max:500'
        ]);

        $checkup = Checkup::find($request->get('id'));

        $checkup->data_checkup = $request->get('data_checkup');
        $checkup->peso = $request->get('peso');
        $checkup->altura = $request->get('altura');
        $checkup->art_pressao = $request->get('art_pressao');
        $checkup->glicose = $request->get('glicose');
        $checkup->colesterol_ldl = $request->get('colesterol_ldl');
        $checkup->colesterol_hdl = $request->get('colesterol_hdl');
        $checkup->observacoes = $request->get('observacoes');
        
        $checkup->save();
        return redirect('checkup.index')->with('success', 'Checkup alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->tipo == 'medico'){
            $checkup = Checkup::find($id);
            $checkup->delete();
            return redirect('checkup.index')->with('success', 'Checkup deletado com sucesso!');
        }
        return redirect()->route('home');
    }
}
