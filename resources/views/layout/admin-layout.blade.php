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

        <style>
            * {
                font-family: 'Nunito', sans-serif;
            }
            body{
                min-height: 100vh;
                display: grid;
                grid-template-areas: 'aside header'
                                     'aside main'
                                     'footer footer';
                grid-template-rows: auto 1fr auto;
                grid-template-columns: auto 1fr;
            }
            header{
                grid-area: header;
            }
            aside{
                grid-area: aside;
            }
            main{
                grid-area: main;
            }
            footer{
                grid-area: footer;
            }
        </style>
        @stack('style')
    </head>
    <body>
        @include('layout.admin-aside')
        
        @include('layout.admin-header')

        <main>
            @yield('content')
        </main>

        @include('layout.admin-footer')

        @stack('script')
    </body>
</html>
