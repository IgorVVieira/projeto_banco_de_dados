@extends('templates.template')

@section('content')

<h1>Teste</h1>
@foreach ($users as $user)
{{ $user->nome }} <br>
@endforeach
<hr>

@endsection
