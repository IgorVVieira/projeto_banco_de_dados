@extends('templates.template')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
@endsection

@section('content')
    <div class="registration-form">
        <form action="{{ url('empresa/cadastrar') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-icon">
                <span><i class="fas fa-building"></i></span>
            </div>
            <div class="form-group">
                <input name="razao_social" type="text" class="form-control item" id="razao_social"
                    placeholder="Razão Social" required>
            </div>
            <div class="form-group">
                <input name="cnpj" type="text" class="form-control item" id="cnpj" placeholder="CNPJ (Sem ponto ou traço)"
                    required min="14" max="14">
            </div>
            <div class="form-group">
                <input name="email" type="email" class="form-control item" id="email" placeholder="Email" required>
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
                    <input name="numero" type="text" class="form-control item" id="numero" placeholder="Número do local"
                        required max="10">
                </div>
                <div class="form-group col-lg-7">
                    <input name="complemento" type="text" class="form-control item" id="complemento"
                        placeholder="Complemento(opcional)" max="30">
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
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Cadastrar <i class="fas fa-save"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')

@endsection
