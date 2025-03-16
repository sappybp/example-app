<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/welcom.css'])
    </head>
    <body class="">
    <main>
        <div class="video-wrapper">
            <video autoplay loop muted playsinline>
                <source src="{{ asset('welcom.mp4') }}" type="video/mp4">
            </video>
            <div class="statement">
                <p class="catch-copy">
                    あなたに合った小説がこの先にきっとある。
                </p>
                <a class="url" href="{{ route('images.index') }}">本棚へ</a>
            </div>
        </div>        
    </main>
    </body>
</html>
