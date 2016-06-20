<html>
    <head>
        <title>@yield('title')</title>
        @yield('meta')
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        @yield('scripts')
    </body>
</html>
