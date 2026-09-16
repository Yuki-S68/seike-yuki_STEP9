<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>

    <header class="p-3 mb-4">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <h3>ECサイト</h3>
                <div>
                    ログインユーザー：{{ auth()->user()->nam ?? 'ゲスト' }}
                </div>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn logout-btn">ログアウト</button>
            </form>
        </div>
    </header>

    <!-- メインコンテンツ -->
    <main class="container">
        @yield('content')
    </main>

    <!-- フッター -->
    <footer class="bg-light text-center p-3 mt-5">
        <p>&copy; 2026 ECサイト</p>
    </footer>

</body>
</html>
