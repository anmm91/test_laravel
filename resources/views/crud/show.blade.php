<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- for IE compatability -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- first mobile meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>bootstrap course</title>
    <!-- Latest compiled and minified CSS -->
    <!-- cdn=>refer to content delivery network -->
    <!-- cdn is put this files in servers around world , and when user use this site return with nearest server -->

    <!-- integrity attribute=> define amechanisme for user agent(browser) to make ensure that fetched that resources without manipulate

    and reject the loaded of resources if manipulate it -->

    <!-- crossorigin => is represent when request is loaded using 'CORS' -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body>
<br> <br> <br> <br>

<div class="container">
    {{--    <form class="form-horizontal" method="post" action="/player/update">--}}
    <table class="table table-hover table-sm table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">title</th>
            <th scope="col">desc</th>


        </tr>
        </thead>
        <tbody>

            <tr>
                <th scope="row">{{$model->id}}</th>
                <td>{{$model->name}}</td>
                <td>{{$model->title}}</td>
                <td>{{$model->description}}</td>

            </tr>

        </tbody>
    </table>
</div>

<a class="btn btn-primary" href="{{route('player.index')}}">home</a>



{{--<a class="btn btn-primary"  href="{{route('player.create')}}">create user</a>--}}
{{--<a class="btn btn-primary"  href="{{action('PlayerController@create')}}">create user</a>--}}


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>
