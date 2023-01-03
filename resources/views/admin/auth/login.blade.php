<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <script src="{{asset('theme/jquery.validate.min.js')}}"></script>
  <script src="{{asset('theme/additional-methods.min.js')}}"></script>

<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div.nm {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    width: 413px;
    margin-top: 50px;
}


h1 {
    margin-top: 60px;
    text-align: center;
}
.error {
    color: red;
}

</style>
</head>
<body>

<h1>Login From</h1>

<div class="container nm">


    {{ Form::open([
        'url' => route('login.post'),
        'id' => 'login',
        'method' => 'post',
        'enctype' => 'multipart/form-data',
    ]) }}

    @csrf

    <div class="form-group">
        <label>Email:</label>
        <div>

            {!! Form::email('email', null, [
                'id' => 'email',
                'placeholder' => 'Enter email',
                'class' => 'form-control',
            ]) !!}

            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif

        </div>
    </div>

    <div class="form-group">
        <label>Password:</label>
        <div>
            <input type="password" id="password" name="password" class="form-control"
            placeholder="Enter password" />
        </div>
        @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
    </div>

    {!! Form::submit('submit', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}



</div>



</body>
</html>


