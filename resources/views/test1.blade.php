
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

</head>
<body>
{{--$errors=$validator->errors();--}}
{{--{{$errors->login->first('name')}}--}}
{{--{{$errors->login->first('email')}}--}}
{{--{{$errors->login->first('number')}}--}}
{{--@if($errors->any())--}}
{{--    <div class="alert alert-danger">--}}
{{--        <ul>--}}
{{--            @foreach ($errors->all() as $error)--}}
{{--                <li>{{ $error }}</li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--@endif--}}
{{$errors->first('name')}}
{{$errors->first('email')}}
{{$errors->first('number')}}
{{--<form method="post" action="{{route('messi')}}">--}}

{{--    @csrf--}}
{{--    name:<input type="text" name="name" value="{{old('name')}}"><br>--}}
{{--    email:<input type="text" name="email" value="{{old('name')}}"><br>--}}
{{--    number:<input type="number" name="number"value="{{old('name')}}"><br>--}}
{{--    <input type="submit" name="send" value="send">--}}

{{--</form>--}}
{{--{!! Form::open(['url'=>'validate']) !!}--}}
{{--{!! Form::open(['route'=>'messi']) !!}--}}
{!! Form::open(['action'=>'TestController@postValidated','enctype'=>'multipart/form-data','method'=>'PUT']) !!}
{{--{!! Form::text('name',null,['placeholder'=>'enter','class'=>'dd']) !!}--}}
{!! Form::file('name') !!}
{!! Form::radio('a','a',true) !!}
{!! Form::select('animal',[
    'Cats' => ['leopard' => 'Leopard'],
    'Dogs' => ['spaniel' => 'Spaniel']
],null,['placeholder' => 'Pick a size...']) !!}
{!! Form::date('date','s') !!}
{!! Form::number('date','s',['min'=>5,'max'=>10,'step'=>1]) !!}
{{--{!! Form::select('size', ['L' => 'Large', 'S' => 'Small'],'S') !!}--}}
{{--{!! Form::select('size', ['L' => 'Large', 'S' => 'Small'], null, ['placeholder' => 'Pick a size...']) !!}--}}
{!! Form::submit('send') !!}
{!! Form::close() !!}
</body>
</html>
