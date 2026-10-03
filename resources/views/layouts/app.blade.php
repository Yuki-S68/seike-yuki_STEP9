<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
</head>

<body class="layout">

    {{-- ログイン・登録ページ専用ヘッダー --}}
    @if (Request::is('login') || Request::is('register'))
        <header class="auth-header d-flex justify-content-between align-items-center p-3 bg-light">
            <span class="fw-bold">Laravel</span>
            <div>
                <a href="{{ route('login') }}" class="text-decoration-none me-3">Login</a>
                <a href="{{ route('register') }}" class="text-decoration-none">Register</a>
            </div>
        </header>
    @endif

    {{-- ECサイトヘッダー（商品ページ・マイページ用） --}}
    @if (!Request::is('login') && !Request::is('register') && !Request::is('mypage*'))
        <header class="layout__header">
            <div class="layout__header-container">
                <h3 class="layout__title">Cytech EC</h3>

                <nav class="layout__nav">
                    <a href="{{ route('products.index') }}" class="layout__nav-link">Home</a>
                    <a href="{{ route('mypage.index') }}" class="layout__nav-link">マイページ</a>
                    <span class="layout__user">ログインユーザー：{{ auth()->user()->name ?? 'ゲスト' }}</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="layout__logout-form">
                        @csrf
                        <button type="submit" class="layout__logout-button">ログアウト</button>
                    </form>
                </nav>
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
