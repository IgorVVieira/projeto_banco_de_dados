<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\CartaoContoller;

class VooController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Session::get('usuario.id');

        $cartoes = DB::select('SELECT * FROM cartoes where usuario_id = ?', [$user_id]);
        $voos = DB::select('SELECT V.*, E.razao_social as empresa, P.preco as preco, P.classe as classe
        FROM voos V, empresas_aereas E, PASSAGENS P GROUP BY V.id');
        // SELECT V.*, E.razao_social as empresa, P.preco as preco, P.classe as classe
        // FROM voos V, empresas_aereas E, PASSAGENS P
        // WHERE V.empresa_aerea_id = E.id AND P.voo_id = V.id
        return view('index', compact('voos', 'cartoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresa_aerea_id = Session::get('usuario.id');
        $avioes = DB::select('SELECT * FROM avioes WHERE empresa_aerea_id = ?', [$empresa_aerea_id]);
        return view('voos.create', compact('avioes'));
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
        $aviao_id = $request->aviao_id;
        $origem = $request->origem;
        $origem_uf = $request->origem_uf;
        $destino = $request->destino;
        $destino_uf = $request->destino_uf;
        $codigo = $request->codigo;
        $data_voo = $request->data_voo;

        DB::insert('INSERT INTO voos (empresa_aerea_id, aviao_id, origem, origem_uf, destino, destino_uf, codigo, data_voo)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)', [$empresa_aerea_id, $aviao_id, $origem, $origem_uf, $destino, $destino_uf, $codigo, $data_voo]);

        return redirect('/');
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
