<!DOCTYPE html>
  <html>
  <head>

    <title>ESTE (Electonic School Test)</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1">

    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/login.css') }}">

  </head>

<body>
	
  <div class="image" id="logo">
     <center> <img src="{{ URL::asset('assets/image/welcome.png') }}"></center>
  </div>

	<div id="login">
          <fieldset>

              <form action="{{ url('/login') }}" method="POST">
                {!! csrf_field() !!}
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <input type="text" name="email" placeholder="Nomor Induk / Email">
                <input type="password" name="password" placeholder="Password">
                <button class="btn loginbtn" type="submit">MASUK</button>

              </form>
              <!-- <a href="home"> <input type="submit" name="submit"  value="Login"  href="index.html" > </a> -->
           </fieldset>
  </div>

</body>
</html>
