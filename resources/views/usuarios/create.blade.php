@extends('templates.template')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
@endsection

@section('content')
    <div class="registration-form">
        <form action="{{ url('cadastrar-usuario') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-icon">
                <span><i class="fas fa-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="username" placeholder="Nome Completo">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" id="password" placeholder="Senha">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="phone-number" placeholder="Phone Number">
            </div>
            <div class="form-group">
                <input type="date" class="form-control item" id="birth-date" placeholder="Birth Date">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Cadastrar <i class="fas fa-save"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')

@endsection
