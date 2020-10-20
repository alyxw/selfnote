<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <style>.container {
            padding: 4em;
        }

        html, body {
            background-color: #343a40;
            color: #fff;
            height: 85vh;
            margin: 0;
        }

        .heightcontainer {
            height: 60vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .subtitle {
            font-size: 42px;
        }

        .links > a {
            color: #fff;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
</div>
</nav>

<div class="container">

    <div class="flex-center position-ref heightcontainer">
        <div class="content">
            <div class="title m-b-md">
                {{ config('app.name', 'Laravel') }}
            </div>
            <div class="links">
                <a href="/login">log in</a>
            </div>

        </div>
    </div>

</div>

<script src="/js/jquery-3.4.1.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>
