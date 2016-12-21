<html>
<head>
	<title></title>
</head>
<body>
	Search box :<br><br>
	<form action="{{ route('search') }}" method="POST" enctype="multipart/form-data">
		Kategori : <input type="text" name="Category"> {{ $errors->first('Category') }}
		<br><br>
		Nama : <input type="text" name="Name"> {{ $errors->first('Name') }}
		<br><br>
		<input type="hidden" name="_token" value="{{ Session::token() }}">
		<input type="submit">
	</form>
	<br><br>
	<br><br>
	@if($search_result!=NULL)
		search result : <br><br>
		@if($search_result!=NULL)
			@foreach ($search_result as $product)
		        Nama : {{ $product->nama_produk }}
				<br><br>
				<a href="../../showProduct/{{$product->product_id}}">link</a>
				<br><br>
		    @endforeach
		@endif
	@endif
	<br><br>
	baru : <br><br>
	@foreach ($product_new as $product)
        Nama : {{ $product->nama }}
		<br><br>
		<a href="../../showProduct/{{$product->id}}">link</a>
		<br><br>
    @endforeach
	<br><br>
	popular : <br><br>
	@foreach ($product_popular as $product)
        Nama : {{ $product->nama }}
		<br><br>
		<a href="../../showProduct/{{$product->id}}">link</a>
		<br><br>
    @endforeach
</body>
</html>
