<html>
<head>
	<title></title>
</head>
<body>
	<form action="{{ route('subs') }}" method="POST">
		Email : <input type="text" name="Email"> {{ $errors->first('Email') }}
		<br><br>
		<input type="hidden" name="_token" value="{{ Session::token() }}">
		<input type="submit">
	</form>
</body>
</html>
