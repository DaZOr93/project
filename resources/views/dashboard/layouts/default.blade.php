<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Documents')</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>
<div class="container">

@include('dashboard.layouts.blocks.nav.index')
    @yield('content')

    @include('dashboard.layouts.blocks.footer.index')
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
