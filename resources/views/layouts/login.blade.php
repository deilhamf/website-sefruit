<!DOCTYPE html>
<html>

<head>
    @yield('title')

    <!-- Favicons -->
    <link href="{{ asset('logreg/img/favicon/favicon.png') }}" rel="icon">
    <link href="{{ asset('logreg/img/favicon/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <link rel="stylesheet" type="text/css" href="{{ asset('logreg/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('template/assets/css/fontawesome.min.css') }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    @yield('content')
    <script type="text/javascript" src="{{ asset('logreg/js/main.js') }}"></script>
</body>

</html>