<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PassagemController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresa_aerea_id = Session::get('usuario.id');
        $voos = DB::select('SELECT * FROM voos WHERE empresa_aerea_id = ?', [$empresa_aerea_id]);
        return view('passagem.create', compact('voos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $voo_id = $request->voo_id;
        $codigo = $request->codigo;
        $preco = $request->preco;
        $data_emissao = $request->data_emissao;
        $classe = $request->classe;

        DB::insert('INSERT INTO passagens (voo_id, codigo, preco, data_emissao, classe)
        VALUES (?, ?, ?, ?)', [$voo_id, $codigo, $preco, $data_emissao, $classe]);

        return redirect('/voos');
    }

    public function comprar(Request $request)
    {
        $id = $request->id;
        $cartao_id = $request->cartao;

        DB::update('UPDATE passagens set cartao_id = ? WHERE id = ?', [$cartao_id, $id]);

        return redirect('/voos');
    }
}
