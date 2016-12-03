<html>
<head>
	<title></title>
</head>
<body>
	baru : <br><br>
	@foreach ($product_new as $product)
        Nama : {{ $product->nama }}
		<br><br>
		<a href="../showProduct/{{$product->id}}">link</a>
		<br><br>
    @endforeach
	<br><br>
	popular : <br><br>
	@foreach ($product_popular as $product)
        Nama : {{ $product->nama }}
		<br><br>
		<a href="../showProduct/{{$product->id}}">link</a>
		<br><br>
    @endforeach
</body>
</html>
