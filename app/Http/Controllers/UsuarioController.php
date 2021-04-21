<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('usuarios')->get();
        return view('index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    public function entrar()
    {
        return view('usuarios.login');
    }

    public function historicoCompras()
    {
        $user_id = Session::get('usuario.id');
        $passagens = DB::select('SELECT DISTINCT P.*, C.nome_titular as titular, C.tipo as tipo, C.data_validade,
        V.origem , V.origem_uf, V.destino, V.destino_uf, V.data_voo
        FROM passagens P, cartoes C, usuarios U, voos V
        WHERE C.id = P.cartao_id AND P.voo_id = V.id AND C.usuario_id = ?', [$user_id]);

        return view('usuarios.historico', compact('passagens'));
    }

    public function login(Request $request)
    {
        $cpf = $request->cpf;
        $senha = $request->senha;

        $usuario = DB::select('SELECT * FROM usuarios WHERE cpf = ? AND senha = ?', [$cpf, $senha]);

        if (!$usuario) {
            echo "<script langauge='javascript'> window.alert('Dados incorretos!')</script>";
        } else {
            $usuarioLogin = $usuario[0];
            Session::put('usuario.nome', $usuarioLogin->nome);
            Session::put('usuario.id', $usuarioLogin->id);
            Session::put('usuario.cpf', $usuarioLogin->cpf);

            return redirect('/voos');
        }
    }

    public function logOut()
    {
        Session::forget('usuario.nome');
        Session::forget('usuario.id');
        Session::forget('usuario.cpf');

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
        $nome = $request->nome;
        $email = $request->email;
        $cpf = $request->cpf;
        $cep = $request->cep;
        $logradouro = $request->logradouro;
        $numero = $request->numero;
        $complemento = $request->complemento;
        $bairro = $request->bairro;
        $cidade = $request->cidade;
        $uf = $request->uf;
        $senha = $request->senha;

        DB::insert('INSERT INTO usuarios (
            nome, email, cpf, cep, logradouro, numero, complemento, bairro, cidade, uf, senha
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$nome, $email, $cpf, $cep, $logradouro, $numero, $complemento, $bairro, $cidade, $uf, $senha]);

        return redirect()->back();
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
        $usuarios = DB::select('SELECT * FROM usuarios WHERE id = ?', [$id]);
        $usuario = $usuarios[0];

        return view('usuarios.edit', compact('usuario'));
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
