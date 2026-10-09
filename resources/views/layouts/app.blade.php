<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">

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
    @if (!Request::is('login') && !Request::is('register'))
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

    <main class="layout__fluid">
        @yield('content')
    </main>

    <footer class="layout__footer">
        <div class="footer__inner">
            <a href="{{ route('contact') }}" class="footer__contact-button">お問い合わせ</a>

            <div class="footer__nav">
                <a href="{{ route('products.index') }}" class="footer__link">Home</a>
                <a href="{{ route('mypage.index') }}" class="footer__link">マイページ</a>
            </div>

            <p class="footer__copy">&copy; 2024 Company, Inc</p>
    </footer>

</body>
</html>
