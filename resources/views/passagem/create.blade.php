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
                                            <h1 class="h4 text-gray-900 mb-4">Cadastre uma nova Passagem!</h1>
                                        </div>
                                        <form action="{{ url('passagem/cadastrar') }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <div class="form-group">
                                                <label for="voo_id">Selecione o voo</label>
                                                <select class="form-control" name="voo_id" required>
                                                    @foreach ($voos as $voo)
                                                        <option value="{{ $voo->id }}">{{ $voo->origem }} -
                                                            {{ $voo->destino }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input name="codigo" type="number"
                                                    class="form-control form-control-user" placeholder="Codigo" required>
                                            </div>
                                            <div class="form-group">
                                                <input name="preco" type="number"
                                                    class="form-control form-control-user" placeholder="Preço" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="data_emissao">Data de emissão</label>
                                                <input name="data_emissao" type="date" class="form-control item"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="classe">Classe</label>
                                                <select class="form-control" name="classe" required>
                                                        <option value="Econômica">Econômica</option>
                                                        <option value="Executiva">Executiva</option>
                                                </select>
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
