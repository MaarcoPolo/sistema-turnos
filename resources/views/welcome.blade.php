<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Turnos Oficialia</title>

        <link rel="shortcut icon" type="image/png" href="{{ asset('/icons/favicon.ico') }}">
        <link rel="shortcut icon" sizes="192x192" href="{{ asset('/icons/favicon.ico') }}">

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

        <!-- Styles -->
        <style>
            .swal2-container{
                z-index: 10000!important;
            }
        </style>
    </head>
    <body class="antialiased">
        <div id="app"></div>
        
        @vite('resources/js/app.js')
    </body>
</html>
