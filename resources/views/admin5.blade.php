<html>
<head>
</head>
<body>
	slide list :
	<br><br>
	@foreach($slides as $slide)
		{{$slide->link}}<br><br>
		<img src="../../{{ $slide->picture}}" height=200 width=200><br><br>
		----------------------------------------------------------------<br><br>
	@endforeach
	<br><br>
	Add slide :
	<br><br>
	<form action="{{ route('addSlide') }}" method="POST" enctype="multipart/form-data">
		picture :  <input type="file" name="picture"> {{ $errors->first('picture') }} <br><br>
		<br><br>
		link : <input type="text" name="link">{{ $errors->first('link') }}
		<br><br>
		<input type="hidden" name="_token" value="{{ Session::token() }}">
		<input type="submit">
	</form> 
</body>
</html>

