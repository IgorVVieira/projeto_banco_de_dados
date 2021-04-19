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
                                            <h1 class="h4 text-gray-900 mb-4">Cadastre um cartão!</h1>
                                        </div>
                                        <form action="{{ url('cartao/cadastrar') }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <div class="form-group">
                                                <select class="form-control" name="tipo" id="tipo" required>
                                                    <option value="Crédito">Crédito</option>
                                                    <option value="Débito">Débito</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input name="nome_titular" type="text"
                                                    class="form-control form-control-user" placeholder="Nome do titular" required>
                                            </div>
                                            <div class="form-group">
                                                <input name="data_validade" type="date" class="form-control item"
                                                    placeholder="Data de validade" required>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-8">
                                                    <input name="numero" type="number"
                                                        class="form-control form-control-user"
                                                        placeholder="Número do cartão" required>
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <input name="cvv" type="number" class="form-control form-control-user"
                                                        placeholder="CVV" required>
                                                </div>
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

@section('modals')
    <div class="modal fade" id="deleteCartaoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deseja realmente excluir o cartão?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Exluir" se deseja deletar o cartão.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger" href="{{ url('usuario/sair') }}">Excluir</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
@endsection
