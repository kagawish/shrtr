<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Shrtr</title>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1>
            Shrtr Service
        </h1>

        <div id="app"></div>

        {{-- <script src="http://localhost:8080/main.js"></script> --}}
        <script src="./js/bundle.js"></script>
    </body>
</html>
