<html>
<head>
    <title>manual login</title>
</head>
<body>
@if(auth()->viaRemember())
    gggggggggg
    @else
    ffffff
  @endif
{!! Form::open(['url'=>'manual/login']) !!}
email :{!! Form::text('email') !!} <br>
password :{!! Form::text('password') !!}<br>
<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
{!! Form::submit('login') !!}
{!! Form::close() !!}
</body>
</html>
