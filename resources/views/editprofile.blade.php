<html>
<head>
	<title></title>
</head>
<body>
	<form action="{{ route('edit') }}" method="POST" enctype="multipart/form-data">
		Nama : <input type="text" name="Name" value="{{$nama}}"> {{ $errors->first('Name') }}
		<br><br>
		Gender : <input type="text" name="Sex" value="{{$gender}}"> {{ $errors->first('Sex') }}
		<br><br>
		telp : <input type="text" name="Phone" value="{{$phone}}"> {{ $errors->first('Phone') }}
		<br><br>
		website : <input type="text" name="Website" value="{{$website}}"> {{ $errors->first('Website') }}
		<br><br>
		kota : <input type="text" name="City" value="{{$kota}}"> {{ $errors->first('City') }}
		<br><br>
		kodepos : <input type="text" name="Postal" value="{{$kodepos}}"> {{ $errors->first('Postal') }}
		<br><br>
		provinsi : <input type="text" name="Province" value="{{$provinsi}}"> {{ $errors->first('Province') }}
		<br><br>
		negara : <input type="text" name="Country" value="{{$negara}}"> {{ $errors->first('Country') }}
		<br><br>
		biodata : <input type="text" name="Bio" value="{{$biodata}}"> {{ $errors->first('Bio') }}
		<br><br>
		<img src="{{ $picture }}" width=100 height=100>
		<br><br>
		Profile Picture : <input type="file" name="ProfPic">
		<br><br>
		<input type="hidden" name="_token" value="{{ Session::token() }}">
		<input type="submit">
	</form>
</body>
</html>
