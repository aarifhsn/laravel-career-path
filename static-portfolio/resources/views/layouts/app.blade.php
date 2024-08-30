<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    <title>Static Portfolio</title>
    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">

    @include('components.header')

    @if (Route::currentRouteName() !== 'home')

    <div class="content mt-5 pt-5 d-flex flex-column justify-content-center align-items-center" style="min-height: 500px;">
        @yield('content')

    </div>
    @endif

    @include('components.footer')

    <!-- Vendor JS Files -->

    <script href="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script href="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
    <script href="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <!-- Main JS File -->
    <script href="{{asset('assets/js/main.js')}}"></script>

</body>

</html>