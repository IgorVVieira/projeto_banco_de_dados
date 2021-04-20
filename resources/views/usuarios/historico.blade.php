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
                    <h1 class="h3 mb-1 text-gray-800">Meu histórico de passagens compradas</h1>
                    <p class="mb-4">Aqui é possível verificar todo histórico de comprar em seu cartão de crédito/débito.</p>
                    <p>
                    </p>

                    <div class="row">
                        @foreach ($passagens as $passagem)
                            <div class="col-lg-6">
                                <div class="card mb-4 py-3 border-bottom-primary">
                                    <div class="card-body">
                                        Classe: {{ $passagem->classe }} <br>
                                        Valor: R$ {{ $passagem->preco }} <br>
                                        Data de emissão: {{ data_br($passagem->data_emissao) }} <br>
                                        Data do voo: {{ data_br($passagem->data_voo) }} <br>
                                        Origem: {{ $passagem->origem }} - {{ $passagem->origem_uf }} <br>
                                        Destino: {{ $passagem->destino }} - {{ $passagem->destino_uf }} <br>
                                        <hr>
                                        Tipo de cartão: {{ $passagem->tipo }} <br>
                                        Nome do titular: {{ $passagem->titular }} <br>
                                        Data de validade: {{ data_br($passagem->data_validade) }} <br>
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

@section('scripts')
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
@endsection
