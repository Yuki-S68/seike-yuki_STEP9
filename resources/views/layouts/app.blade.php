<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

    <!-- ヘッダー -->
    <header class="bg-primary text-white p-3 mb-4">
        <div class="container">
            <h3>ECサイト</h3>
            <div>
                ログインユーザー：
                {{ auth()->user()->name }}
            </div>
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
