<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FURNIRO</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/Meubel House_Logos-05.png') }}">
</head>
<body>
    @include('components.navbar')
    <main class="mx-auto pt-20">
        @yield('content')
    </main>
    @include('components.footer')
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
