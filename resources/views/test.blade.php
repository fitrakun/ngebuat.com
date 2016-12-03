<html>
<head>
	<title></title>
</head>
<body>
<!--
	<form action="{{ route('pictura') }}" method="POST" enctype="multipart/form-data">
		Profile Picture : <input type="file" name="img">
		<br><br>
		<input type="hidden" name="_token" value="{{ Session::token() }}">
		<input type="submit">
	</form>
	-->
	 @foreach ($flights as $snippet)
            {{ $snippet->password}}
    @endforeach
    <br>
    {{ $flights->count()}}

</body>
</html>
