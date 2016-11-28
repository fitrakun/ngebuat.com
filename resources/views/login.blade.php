<html>
<head>
	<title></title>
</head>
<body>
	{{ $error }}
	<form action="{{ route('signin') }}" method="POST">
		Nama tampilan : <input type="text" name="Username"> {{ $errors->first('Username') }}
		<br><br>
		password : <input type="password" name="Password"> {{ $errors->first('Password') }}
		<br><br>
		<input type="hidden" name="_token" value="{{ Session::token() }}">
		<input type="submit">
	</form>
</body>
</html>
