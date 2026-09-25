<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">

</head>
<body>
    @if (!Request::is('mypage'))
        <header class="site-header">
            <div class="header-container">
                <div class="header-left">
                    <h3>ECサイト</h3>
                    <div>
                        ログインユーザー：{{ auth()->user()->name ?? 'ゲスト' }}
                    </div>
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">ログアウト</button>
                </form>
            </div>
        </header>
    @endif

    <main class="main-content">
        @yield('content')
    </main>

    <footer class="sute-fotter">
        <p>&copy; 2026 ECサイト</p>
    </footer>

</body>
</html>
