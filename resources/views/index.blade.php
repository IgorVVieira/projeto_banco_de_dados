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
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center">Voôs agendados</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Empresa</th>
                                        <th>Preço</th>
                                        <th>Origem</th>
                                        <th>Destino</th>
                                        <th>Data</th>
                                        <th>Classe</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Empresa</th>
                                        <th>Preço</th>
                                        <th>Origem</th>
                                        <th>Destino</th>
                                        <th>Data</th>
                                        <th>Classe</th>
                                        <th>Ação</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($voos as $voo)
                                        <tr>
                                            <td>{{ $voo->id }}</td>
                                            <td>{{ $voo->empresa }}</td>
                                            <td>R$ {{ $voo->preco }}</td>
                                            <td>{{ $voo->origem }} - {{ $voo->origem_uf }}</td>
                                            <td>{{ $voo->destino }} - {{ $voo->destino_uf }}</td>
                                            <td>{{ data_br($voo->data_voo) }}</td>
                                            <td>{{ $voo->classe }}</td>
                                            <td class="align-center">
                                                @if (Session::get('usuario.cpf') != null)
                                                    <a class="btn btn-primary btn-circle" data-toggle="modal"
                                                        data-target="#comprarPassagemModal" data-id="{{ $voo->id }}"
                                                        data-preco="{{ $voo->preco }}">
                                                        <i class="fas fa-shopping-cart"></i>
                                                    </a>
                                                @else
                                                    <button class="btn btn-primary btn-circle" disabled>
                                                        <i class="fas fa-shopping-cart"></i>
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @include('layouts.footer')
            </div>
        </div>
        <!-- Rolar pra cima-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
    </div>
@endsection

@section('modals')
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deseja realmente sair?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Logout" se deseja encerrar a sessão.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    @if (Session::get('usuario.cpf') != null)
                        <a class="btn btn-primary" href="{{ url('usuario/sair') }}">Logout</a>
                        @else
                        <a class="btn btn-primary" href="{{ url('empresa/sair') }}">Logout</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="comprarPassagemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deseja compar a passagem?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ url('passagem/comprar') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="id" value="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="cartao">Selecione o cartão:</label>
                            <select class="form-control" name="cartao" id="cartao" required>
                                @foreach ($cartoes as $cartao)
                                    <option value="{{ $cartao->id }}">{{ $cartao->nome_titular }} -
                                        {{ data_br($cartao->data_validade) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" href="{{ url('usuario/sair') }}">Comprar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/demo/datatables-demo.js') }}"></script>

    <script>
        $('#comprarPassagemModal').on('show.bs.modal', function(event) {
            let button = $(event.relatedTarget);
            let id = button.data('id');
            let modal = $(this);
            modal.find('input[name="id"]').val(id);
        });

    </script>
@endsection
