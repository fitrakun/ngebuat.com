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
		Nama : <input type="text" name="Name"> {{ $errors->first('Name') }}
		<br><br>
		Gender : <input type="text" name="Sex"> {{ $errors->first('Sex') }}
		<br><br>
		telp : <input type="text" name="Phone"> {{ $errors->first('Phone') }}
		<br><br>
		website : <input type="text" name="Website"> {{ $errors->first('Website') }}
		<br><br>
		alamat : <input type="text" name="Address"> {{ $errors->first('Address') }}
		<br><br>
		kota : <input type="text" name="City"> {{ $errors->first('City') }}
		<br><br>
		kodepos : <input type="text" name="Postal"> {{ $errors->first('Postal') }}
		<br><br>
		provinsi : <input type="text" name="Province"> {{ $errors->first('Province') }}
		<br><br>
		negara : <input type="text" name="Country"> {{ $errors->first('Country') }}
		<br><br>
		biodata : <input type="text" name="Bio"> {{ $errors->first('Bio') }}
		<br><br>
		<input type="hidden" name="_token" value="{{ Session::token() }}">
		<input type="submit">
	</form>
</body>
</html>
