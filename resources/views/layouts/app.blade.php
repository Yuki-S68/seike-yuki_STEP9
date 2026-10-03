<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
</head>

<body class="layout">

    @if (!Request::is('mypage'))
        <header class="layout__header">
            <div class="layout__header-container">
                <div class="layout__header-left">
                    <h3 class="layout__title">ECサイト</h3>
                    <div class="layout__user">
                        ログインユーザー：{{ auth()->user()->name ?? 'ゲスト' }}
                    </div>
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="layout__logout-form">
                    @csrf
                    <button type="submit" class="layout__logout-button">ログアウト</button>
                </form>
            </div>
        </header>
    @endif

    <main class="layout__main">
        @yield('content')
    </main>

    <footer class="layout__footer">
        <p class="layout__footer-text">&copy; 2026 ECサイト</p>
    </footer>

</body>
</html>
