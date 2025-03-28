<!doctype html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ URL::asset('build/images/favicon-32x32.png') }}" type="image/png">
    <title>Suspeitos</title>

    @yield('css')

    @include('layouts.head-css')

</head>

<body>

@include('layouts.topbar')
@include('layouts.sidebar')

<main class="main-wrapper">
    <div class="main-content">

        @yield('content')

    </div>
</main>

<div class="overlay btn-toggle"></div>

@include('layouts.footer')

@include('layouts.vendor-scripts')

@yield('scripts')

</body>

</html>
