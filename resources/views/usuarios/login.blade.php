@extends('templates.template')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/signin.css') }}">
@endsection

@section('content')
    <div class="text-center" id="body">
        <main class="form-signin">
            <form method="POST" action="{{ url('usuario/login') }}">
                @csrf
                @method('POST')
                <i class="fas fa-user fa-7x p-2"></i>
                <h1 class="h3 mb-3 fw-normal">Login</h1>

                <div class="form-floating">
                    <label for="floatingInput">Usuário (CPF)</label>
                    <input type="text" class="form-control" name="cpf" id="floatingInput" placeholder="CPF">
                </div>
                <div class="form-floating">
                    <label for="floatingPassword">Senha</label>
                    <input type="password" name="senha" class="form-control" id="floatingPassword" placeholder="Senha">
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
                <p class="mt-5 mb-3 text-muted">&copy; {{ date('Y') }}</p>
            </form>
        </main>
    </div>
    <div class="mt-4">
        <div class="d-flex justify-content-center links">
            Não tem uma conta? <a href="{{ url('usuario/novo') }}" class="ml-2">Cadastre-se</a>
        </div>
        <div class="d-flex justify-content-center links">
            <a href="{{ url('empresa/entrar') }}">Entrar como empresa</a>
        </div>
    </div>
@endsection
