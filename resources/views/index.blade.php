@extends('templates.template')

@section('content')
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top p-2">
        <a class="navbar-brand" href="#">Início</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Link 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link 2</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Cadastrar
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ url('usuario/novo-usuario') }}">Usuário</a>
                    <a class="dropdown-item" href="#">Empresa</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Login
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ url('usuario/entrar') }}">Usuário</a>
                    <a class="dropdown-item" href="#">Empresa</a>
                </div>
            </li>
        </ul>
    </nav>

    <div class="col-10 m-auto mt-5 p-5">
        <h1 class="text-center">Voos</h1>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Empresa aérea</th>
                    <th scope="col">Origem</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Código</th>
                    <th scope="col">Data</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($voos as $voo)
                    <tr>
                        <th scope="row">{{ $voo->id }}</th>
                        <td>{{ $voo->empresa }}</td>
                        <td>{{ $voo->origem }} - {{ $voo->origem_uf }}</td>
                        <td>{{ $voo->destino }} - {{ $voo->destino_uf }}</td>
                        <td>{{ $voo->codigo }}</td>
                        <td>{{ data_br($voo->data_voo) }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
@endsection
