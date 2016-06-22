<html>
    <head>
        <title>@yield('title')</title>
        @yield('meta')
    </head>
    <body>
        <div class="container">
            @include('inc.frontheader')
            @include('inc.search')
            @yield('content')
        </div>
        @yield('scripts')
    </body>
</html>
