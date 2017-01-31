<html>
<head>
</head>
<body>
	<br><br>
	<form action="{{ route('changeBackground') }}" method="POST" enctype="multipart/form-data">
		picture :  <input type="file" name="picture"> {{ $errors->first('picture') }} <br><br>
		<br><br>
		<input type="hidden" name="_token" value="{{ Session::token() }}">
		<input type="submit">
	</form> 
</body>
</html>

