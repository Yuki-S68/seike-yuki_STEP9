<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    {{-- 共通CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- マイページ専用 --}}
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">

    {{-- 商品ページ専用CSS --}}
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
</head>

<body class="layout">

    <main class="layout__main">
        @yield('content')
    </main>

</body>
</html>