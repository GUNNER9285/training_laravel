<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>

    {!! Charts::style() !!}

</head>
<body>

    <div class="app">
        <center>
            {!! $chart->html() !!}
        </center>
    </div>

    {!! Charts::scripts() !!}
    {!! $chart->script() !!}

</body>
</html>