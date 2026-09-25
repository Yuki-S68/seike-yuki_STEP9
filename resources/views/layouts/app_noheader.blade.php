<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset"UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    {{-- 共通CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- マイページ専用 --}}
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
</head>
<body>

    <main class="py-4">
        @yield('content')
    </main>

</body>
</html>