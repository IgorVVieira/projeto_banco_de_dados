@extends('templates.template')

@section('content')
    <h1>Teste</h1>
    @foreach ($users as $user)
        {{ $user->nome }} <br>
    @endforeach
    <hr>
    <a href="{{ url('usuario/novo-usuario') }}">Tela de criar usuário</a> <br>
    <a href="{{ url('usuario/entrar') }}">Tela login do usuário</a>
@endsection
