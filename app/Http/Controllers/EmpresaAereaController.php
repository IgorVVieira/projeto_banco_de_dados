<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EmpresaAereaController extends Controller
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
        return view('empresas.create');
    }

    public function entrar()
    {
        return view('empresas.login');
    }

    public function login(Request $request)
    {
        $cnpj = $request->cnpj;
        $senha = $request->senha;

        $usuario = DB::select('SELECT * FROM empresas_aereas WHERE cnpj = ? AND senha = ?', [$cnpj, $senha]);

        if (!$usuario) {
            echo "<script langauge='javascrip'> window.alert('Dados incorretos!')</script>";
        } else {
            $usuarioLogin = $usuario[0];
            Session::put('usuario.nome', $usuarioLogin->razao_social);
            Session::put('usuario.id', $usuarioLogin->id);
            Session::put('usuario.cnpj', $usuarioLogin->cnpj);

            return redirect('/voos');
        }
    }

    public function logOut()
    {
        Session::forget('usuario.nome');
        Session::forget('usuario.id');
        Session::forget('usuario.cnpj');

        return redirect('/');
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
