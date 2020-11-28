<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/images/favicon.png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Shadow ratings</title>

    <!-- Scripts -->    
    <script src="/js/app.js?v=2" defer></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}?v=3" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700&family=Roboto+Mono:wght@100;200;300;400;500&family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
</head>
<body>    
    
    @yield('content')
    
</body>
</html>

