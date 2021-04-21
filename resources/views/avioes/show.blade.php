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
                <div class="container-fluid">
                    <h1 class="h3 mb-1 text-gray-800">Meus aviões</h1>
                    <p class="mb-4">Aqui é possível gerenciar seus aviões (criar/excluir).</p>
                    <p>
                        <a href="{{ url('aviao/novo') }}" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-flag"></i>
                            </span>
                            <span class="text">Novo avião</span>
                        </a>
                    </p>

                    <div class="row">
                        @foreach ($avioes as $aviao)
                            <div class="col-lg-6">
                                <div class="card mb-4 py-3 border-bottom-primary">
                                    <div class="card-body">
                                        Quantidade de assentos: {{ $aviao->qtd_assentos }} <br>
                                        Modelo: {{ $aviao->modelo }} <br>
                                        Código: {{ $aviao->codigo }}
                                        <a data-id="{{ $aviao->id }}" class="btn btn-danger btn-circle"
                                            data-toggle="modal" data-target="#deleteAviaoModal">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
@endsection

@section('modals')
    <div class="modal fade" id="deleteAviaoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deseja realmente excluir o avião?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Exluir" se deseja deletar o avião.</div>
                <form action="{{ url('aviao/deletar') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input name="id" type="hidden" value="">
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>

    <script>
        $('#deleteAviaoModal').on('show.bs.modal', function(event) {
            let button = $(event.relatedTarget);
            let id = button.data('id');
            console.log(id);
            let modal = $(this);
            modal.find('input[name="id"]').val(id);
        });

    </script>
@endsection
