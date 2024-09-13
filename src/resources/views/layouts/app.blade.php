<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
    @livewireStyles
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-utilities">
                <div class="header__item">
                    <a class="header__logo" href="/">FashionablyLate</a>
                </div>
                <nav>
                    <ul class="header-nav">
                        @if (Auth::check())
                        <li class="header-nav__item">
                            <form action="/logout" method="post">
                                @csrf
                                <button class="header-nav__link">ログアウト</button>
                            </form>
                        </li>
                        @else
                        <li class="header-nav__item">
                            <a class="header-nav__link" href="/login">ログイン</a>
                            @csrf
                            <a class="header-nav__link" href="/register">新規登録</a>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        @yield('content')

    </main>
    @livewireScripts
</body>

</html>