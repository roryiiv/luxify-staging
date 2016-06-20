<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
                <p>
                    {{func::shout('Finally, a corrected method !!!')}}
                </p>
            </div>
            <div class="content">
                <ul>
                    <li>
                        <a href="/listings">Listings</a>
                    </li>
                    <li>
                        <a href="/categories">Categories</a>
                    </li>
                    <li>
                        <a href="/login">Login</a>
                    </li>
                </ul>
            </div>
            <div style="width:100%">
                @include('inc.search')
            </div>
        </div>
    </body>
</html>
