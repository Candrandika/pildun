<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Piala Dunia | @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"></script>
        

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        <style>
            body{
                min-height: 100vh;
                display: grid;
                grid-template-areas: 'header'
                                     'main'
                                     'footer';
                grid-template-rows: auto 1fr auto;
            }
            header{
                grid-area: header;
            }
            main{
                grid-area: main;
            }
            footer{
                grid-area: footer;
            }
        </style>
    </head>
    <body>
        @include('layout.header')

        <main>
            @yield('content')
        </main>

        @include('layout.footer')
    </body>
</html>
