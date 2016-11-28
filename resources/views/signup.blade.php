<html>
<head>
	<title></title>
</head>
<body>
	<form action="{{ route('signup') }}" method="POST">
		Nama tampilan : <input type="text" name="Username"> {{ $errors->first('Username') }}
		<br><br>
		email : <input type="text" name="Email">{{ $errors->first('Email') }}
		<br><br>
		password : <input type="password" name="Password"> {{ $errors->first('Password') }}
		<br><br>
		confirm password : <input type="password" name="Password_confirmation">
		<br><br>
		<input type="hidden" name="_token" value="{{ Session::token() }}">
		<input type="submit">
	</form>
</body>
</html>
