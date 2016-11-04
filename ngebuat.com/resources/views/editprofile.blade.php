<html>
<head>
	<title></title>
</head>
<body>
	<form action="{{ route('edit') }}" method="POST">
		Nama tampilan : <input type="text" name="Username" value={{$username}}> {{ $errors->first('Username') }}
		<br><br>
		email : <input type="text" name="Email" value={{$email}}>{{ $errors->first('Email') }}
		<br><br>
		Nama : <input type="text" name="Name" value={{$nama}}> {{ $errors->first('Name') }}
		<br><br>
		Gender : <input type="text" name="Sex" value={{$gender}}> {{ $errors->first('Sex') }}
		<br><br>
		telp : <input type="text" name="Phone" value={{$phone}}> {{ $errors->first('Phone') }}
		<br><br>
		website : <input type="text" name="Website" value={{$website}}> {{ $errors->first('Website') }}
		<br><br>
		alamat : <input type="text" name="Address" value={{$alamat}}> {{ $errors->first('Address') }}
		<br><br>
		kota : <input type="text" name="City" value={{$kota}}> {{ $errors->first('City') }}
		<br><br>
		kodepos : <input type="text" name="Postal" value={{$kodepos}}> {{ $errors->first('Postal') }}
		<br><br>
		provinsi : <input type="text" name="Province" value={{$provinsi}}> {{ $errors->first('Province') }}
		<br><br>
		negara : <input type="text" name="Country" value={{$negara}}> {{ $errors->first('Country') }}
		<br><br>
		biodata : <input type="text" name="Bio" value={{$biodata}}> {{ $errors->first('Bio') }}
		<br><br>
		<input type="hidden" name="_token" value="{{ Session::token() }}">
		<input type="submit">
	</form>
</body>
</html>
