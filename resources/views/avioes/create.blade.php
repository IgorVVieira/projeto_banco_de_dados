@extends('templates.template')

@section('styles')
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div id="wrapper">
        @include('layouts.sideMenu')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('layouts.topMenu')
                <div class="container">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Cadastre um novo avião!</h1>
                                        </div>
                                        <form action="{{ url('aviao/cadastrar') }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <div class="form-group">
                                                <input name="qtd_assentos" type="number"
                                                    class="form-control form-control-user"
                                                    placeholder="Quantidade de assentos" required min="20" max="186">
                                            </div>
                                            <div class="form-group">
                                                <input name="modelo" type="text" class="form-control form-control-user"
                                                    placeholder="Modelo" required>
                                            </div>
                                            <div class="form-group">
                                                <input name="codigo" type="number" class="form-control form-control-user"
                                                    placeholder="Código" required min="0">
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Cadastrar <i class="fas fa-save"></i>
                                            </button>
                                            <hr>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
@endsection
