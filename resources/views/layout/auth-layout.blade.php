<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Track-In')</title>
        <link rel="icon" href="{{ asset('image/logoTrackIn.png') }}" type="image/png" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Stack+Sans+Text:wght@200..700&display=swap"
            rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://code.iconify.design/iconify-icon/2.0.0/iconify-icon.min.js"></script>
    </head>

    <body
        class="bg-white min-h-screen max-h-screen grid grid-cols-2 lg:grid-cols-1 w-full px-8 py-10 md:pb-4 rounded-xl gap-4 sm:px-6 sm:py-4">
        @yield('content')
    </body>

</html>
