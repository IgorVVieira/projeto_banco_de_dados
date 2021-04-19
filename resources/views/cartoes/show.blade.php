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
                    <h1 class="h3 mb-1 text-gray-800">Meus cartões de crédito/débito</h1>
                    <p class="mb-4">Aqui é possível gerenciar seus cartões (criar/excluir).</p>
                    <p>
                        <a href="{{ url('cartao/novo') }}" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-flag"></i>
                            </span>
                            <span class="text">Novo Cartão</span>
                        </a>
                    </p>

                    <div class="row">
                        @foreach ($cartoes as $cartao)
                            <div class="col-lg-6">
                                <div class="card mb-4 py-3 border-bottom-primary">
                                    <div class="card-body">
                                        Tipo: {{ $cartao->tipo }} <br>
                                        Nome do Titular: {{ $cartao->nome_titular }} <br>
                                        Data de validade: {{ data_br($cartao->data_validade) }} <br>
                                        Número: {{ $cartao->numero }} <br>
                                        CVV: {{ $cartao->cvv }} <br>
                                        <a data-id="{{ $cartao->id }}" class="btn btn-danger btn-circle"
                                            data-toggle="modal" data-target="#deleteCartaoModal">
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
                <form action="{{ url('cartao/deletar') }}" method="POST">
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
        $('#deleteCartaoModal').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget);
        let id = button.data('id');
        console.log(id);
        let modal = $(this);
        modal.find('input[name="id"]').val(id);
    });
    </script>
@endsection
