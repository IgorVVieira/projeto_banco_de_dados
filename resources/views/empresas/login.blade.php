@extends('templates.template')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/signin.css') }}">
@endsection

@section('content')
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark p-2">
        <a class="navbar-brand" href="{{  url('/') }}">
            <img src="{{ asset('img/favicon-32x32.png') }}" alt="Logo">
            Início</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Comprar passagem</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link 2</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="/" id="navbardrop" data-toggle="dropdown">
                    Cadastrar
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ url('usuario/novo-usuario') }}">Usuário</a>
                    <a class="dropdown-item" href="{{ url('empresa/nova-empresa') }}">Empresa</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Login
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ url('usuario/entrar') }}">Usuário</a>
                    <a class="dropdown-item" href="{{ url('empresa/entrar') }}">Empresa</a>
                </div>
            </li>
        </ul>
    </nav>
    <div class="text-center" id="body">
        <main class="form-signin">
            <form method="POST" action="{{ url('empresa/login') }}">
                @csrf
                @method('POST')
                <i class="fas fa-building fa-7x p-2"></i>
                <h1 class="h3 mb-3 fw-normal">Login</h1>

                <div class="form-floating">
                    <input type="text" class="form-control" name="cnpj" id="floatingInput" placeholder="CNPJ">
                    <label for="floatingInput">Usuário (CNPJ)</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="senha" class="form-control" id="floatingPassword" placeholder="Senha">
                    <label for="floatingPassword">Senha</label>
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Lembrar de mim
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
                <p class="mt-5 mb-3 text-muted">&copy; {{ date('Y') }}</p>
            </form>
        </main>
    </div>
@endsection
