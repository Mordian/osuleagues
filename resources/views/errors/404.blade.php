<!DOCTYPE html>
<html>
    <head>
        <title>osuleagues | 404</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet" type="text/css">

        <style>
            body {
            	background: #180052;
                color: #fafafa;
                font-family: 'Lato';
                margin: 25px 0 0 50px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <h1>Something happened</h1>
                <h2>Something happened</h2>
                <br>
                <p>Actually, error 404 happened.</p>
                @if ($exception->getMessage())
                    <p>For reference, the elders of the internet said this: {{ $exception->getMessage() }}</p>
                @endif
            </div>
        </div>
    </body>
</html>
