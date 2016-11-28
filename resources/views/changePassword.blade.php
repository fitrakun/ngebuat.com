<html>
<head>
	<title></title>
</head>
<body>
	<form action="{{ route('changePassword') }}" method="POST">
		Password lama : <input type="password" name="oldPassword"> 
		<br><br>
		Password baru: <input type="password" name="newPassword"> {{ $errors->first('Password') }}
		<br><br>
		confirm password baru: <input type="password" name="newPassword_confirmation">
		<br><br>
		<input type="hidden" name="_token" value="{{ Session::token() }}">
		<input type="submit">
	</form>
</body>
</html>
