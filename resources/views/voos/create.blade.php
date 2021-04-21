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
                                            <h1 class="h4 text-gray-900 mb-4">Cadastre um voo!</h1>
                                        </div>
                                        <form action="{{ url('voo/cadastrar') }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <div class="form-group">
                                                <label for="aviao_id">Avião</label>
                                                <select class="form-control" name="aviao_id" required>
                                                    @foreach ($avioes as $aviao)
                                                        <option value="{{ $aviao->id }}">{{ $aviao->modelo }} -
                                                            {{ $aviao->codigo }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-10">
                                                    <input name="origem" type="text"
                                                        class="form-control form-control-user"
                                                        placeholder="Origem" required>
                                                </div>
                                                <div class="form-group col-lg-2">
                                                    <input name="origem_uf" type="text" class="form-control form-control-user"
                                                        placeholder="UF" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-10">
                                                    <input name="destino" type="text"
                                                        class="form-control form-control-user"
                                                        placeholder="Destino" required>
                                                </div>
                                                <div class="form-group col-lg-2">
                                                    <input name="destino_uf" type="text" class="form-control form-control-user"
                                                        placeholder="UF" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="data_voo">Data do voo</label>
                                                <input name="data_voo" type="date" class="form-control item" required>
                                            </div>
                                            <div class="form-group">
                                                <input name="codigo" type="number" class="form-control item" placeholder="Código" required>
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
