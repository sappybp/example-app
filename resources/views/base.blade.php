<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://use.fontawesome.com/releases/v6.2.0/css/all.css" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/bootstrap.js'])
    @vite('resources/css/app.css') {{-- ViteによるCSSの読み込み --}}
</head>
<body class="body">
    <nav class="navbar navbar-xpand-lg bg-dark">
        <div class="container">
            <a href="{{ route('images.index') }}" class="navbar-brand text-white">バーチャル図書館</a>
            <a href="{{ route('images.create') }}" class="text-white m-2">本情報作成</a>
            <a href="{{ route('images.random') }}" class="text-white m-2">本に出会う</a>
            <a href="{{ route('images.favorite') }}" class="text-white m-2">お気に入り本棚</a>
            <div class="ml-auto">
                <ul class="navbar-nav">
                    @if (Auth::check())
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" class="logout-form" method="POST">
                                @csrf
                                <button type="submit" class="text-white">ログアウト</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link text-white">ログイン</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link text-white">新規登録</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mx-auto px-4 py-4 fade_in">
        @yield('content')
    </div>
    @yield('script')
</body>
</html>