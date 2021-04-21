<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartaoContoller extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cartoes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo = $request->tipo;
        $nome_titular = $request->nome_titular;
        $data_validade = $request->data_validade;
        $numero = $request->numero;
        $cvv = $request->cvv;
        $user_id = Session::get('usuario.id');

        DB::insert('INSERT INTO cartoes (usuario_id, tipo, nome_titular, data_validade, numero, cvv)
        values (?, ?, ?, ?, ?, ? )', [$user_id, $tipo, $nome_titular, $data_validade, $numero, $cvv]);

        return redirect('cartao/todos/' . $user_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cartoes = DB::select('SELECT * FROM cartoes where usuario_id = ?', [$id]);

        return view('cartoes.show', compact('cartoes'));
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
        $user_id = Session::get('usuario.id');
        DB::delete('DELETE FROM cartoes where id = ?', [$id]);

        return redirect('cartao/todos/' . $user_id);
    }
}
