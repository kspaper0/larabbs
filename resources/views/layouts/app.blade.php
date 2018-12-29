<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- 此标签是为了方便前端的 JS 脚本获取 CSRF 令牌 -->

    <title>@yield('title', 'LaraBBS') - Laravel BBS</title>
    <meta name="description" content="@yield('description', 'LaraBBS')" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')

    <!-- 此处是为了使用当前请求的协议 (HTTP or HTTPS) 为资源生成一个URL -->

</head>


<body>
    <div id="app" class="{{ route_class() }}-page">
    <!-- 此方法是自定义的辅助方法， 需要在 helpers.php 文件中添加 -->

        @include('layouts._header')

        <div class="container">
            @include('layouts._message')
            @yield('content')

        </div>

        @include('layouts._footer')
    </div>

    @if (app()->isLocal())
        @include('sudosu::user-selector')
    @endif

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>