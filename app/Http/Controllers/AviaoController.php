<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AviaoController extends Controller
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
        return view('avioes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empresa_aerea_id = Session::get('usuario.id');
        $qtd_assentos = $request->qtd_assentos;
        $modelo = $request->modelo;
        $codigo = $request->codigo;

        DB::insert('INSERT INTO avioes (empresa_aerea_id, qtd_assentos, modelo, codigo)
        VALUES (?, ?, ?, ?)', [$empresa_aerea_id, $qtd_assentos, $modelo, $codigo]);

        return redirect('aviao/todos/' . $empresa_aerea_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $avioes = DB::select('SELECT * FROM avioes WHERE empresa_aerea_id = ?', [$id]);

        return view('avioes.show', compact('avioes'));
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
    public function destroy(Request $request)
    {
        $id = $request->id;
        $empresa_aerea_id = Session::get('usuario.id');
        DB::delete('DELETE FROM avioes WHERE id = ?', [$id]);

        return redirect('aviao/todos/' . $empresa_aerea_id);
    }
}
