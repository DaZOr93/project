<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Documents')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="{{  URL::asset('/css/style.css') }}">
</head>
<body>
<div class="container">

@include('works.layouts.blocks.nav.index')
    @yield('content')

    @include('works.layouts.blocks.footer.index')
</div>
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
