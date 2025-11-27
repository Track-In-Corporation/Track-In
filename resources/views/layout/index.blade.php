<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Stack+Sans+Text:wght@200..700&display=swap" rel="stylesheet">
        @vite(["resources/css/app.css", "resources/js/app.js"])
        <script defer src="https://code.iconify.design/iconify-icon/2.0.0/iconify-icon.min.js"></script>
    </head>

    <body>
        <main class="bg-background grid grid-cols-[15rem_1fr] min-h-dvh">
            @include("layout.navbar")
            <section class="bg-background p-2">
                <div class="bg-white h-full w-full rounded-xl">
                    @yield("content")
                </div>
            </section>
        </main>
    </body>

</html>
