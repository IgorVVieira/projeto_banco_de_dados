<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('styles')
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-5.0.0-beta2-dist/css/bootstrap.rtl.min.css.map') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-5.15.3-web/css/all.css') }}">
    <title>Aeroporto</title>
</head>

<body>
    @yield('content')

</body>

@yield('scripts')
<script src="{{ asset('assets/bootstrap-5.0.0-beta2-dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/fontawesome-free-5.15.3-web/js/all.js') }}"></script>
