@extends('templates.template')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
@endsection

@section('content')
    <div class="registration-form">
        <form action="{{ url('usuario/cadastrar-usuario') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-icon">
                <span><i class="fas fa-user"></i></span>
            </div>
            <div class="form-group">
                <input name="nome" type="text" class="form-control item" id="username" placeholder="Nome Completo" required>
            </div>
            <div class="form-group">
                <input name="email" type="email" class="form-control item" id="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input name="cpf" type="text" class="form-control item" id="cpf" placeholder="CPF (Sem ponto ou traço)"
                    required min="11" max="11">
            </div>
            <div class="row">
                <div class="form-group col-lg-4">
                    <input name="cep" type="text" class="form-control item" id="cep" placeholder="CEP" required min="8"
                        max="8">
                </div>
                <div class="form-group col-lg-8">
                    <input name="bairro" type="text" class="form-control item" id="bairro" placeholder="Bairro" required
                        max="40">
                </div>
            </div>
            <div class="form-group">
                <input name="logradouro" type="text" class="form-control item" id="logradouro" placeholder="Logradouro"
                    required max="50">
            </div>
            <div class="row">
                <div class="form-group col-lg-5">
                    <input name="numero" type="text" class="form-control item" id="numero" placeholder="Número da casa"
                        required max="10">
                </div>
                <div class="form-group col-lg-7">
                    <input name="complemento" type="text" class="form-control item" id="complemento"
                        placeholder="Complemento(opcional)" required max="30">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-9">
                    <input name="cidade" type="text" class="form-control item" id="cidade" placeholder="Cidade" required
                        max="50">
                </div>
                <div class="form-group col-lg-3">
                    <input name="uf" type="text" class="form-control item" id="uf" placeholder="UF" required min="2"
                        max="2">
                </div>
            </div>
            <div class="form-group">
                <input name="senha" type="password" class="form-control item" id="senha" placeholder="Senha">
            </div>
            {{-- <div class="form-group">
                <input type="date" class="form-control item" id="birth-date" placeholder="Birth Date">
            </div> --}}
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Cadastrar <i class="fas fa-save"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')

@endsection
