<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <link rel="stylesheet" href="{{ asset("bootstrap5.3/css/bootstrap.min.css") }}">
        <link rel="stylesheet" href="../../css/index.css">
        @vite(["resources/css/app.css", "resources/js/app.js"])
    </head>

    <body>
        @include("layout.navbar")
        @yield("content")
        @include("layout.footer")
    </body>

</html>
