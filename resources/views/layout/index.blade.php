<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Track-In')</title>
        <link rel="icon" href="{{ asset('images/logoTrackIn.png') }}" type="image/png" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Stack+Sans+Text:wght@200..700&display=swap"
            rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://code.iconify.design/iconify-icon/2.0.0/iconify-icon.min.js"></script>
    </head>

    <body style="visibility:invisible;">
        <x-toast></x-toast>
        <x-delete-modal></x-delete-modal>
        <main data-navbar-state='closed'
            class="transition-[grid-template-columns] duration-200 layout bg-background grid grid-cols-[3.5rem_1fr] min-h-dvh data-[navbar-state=open]:grid-cols-[15rem_1fr] md:grid-cols-1! group">
            @include('layout.navbar')
            <section class="bg-background p-2 pl-0 h-dvh md:p-0">
                <div class="bg-white h-full w-full rounded-xl md:rounded-none overflow-auto">
                    @yield('content')
                </div>
            </section>

        </main>
    </body>

</html>
