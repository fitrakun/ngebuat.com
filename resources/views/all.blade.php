<html>
<head>
</head>
<body>
	@foreach ($products as $product)
	    {{$product->nama}}<br><br>
	    <a href="showProduct/{{$product->id}}"><img src="{{$product->picture}}" alt="{{ $product->nama }}" ></a><br><br>
	    ----------------------------------------<br><br>
	@endforeach
</body>
</html>