<html>
<head>
	<title></title>
</head>
<body>
	Nama : {{ $product->nama }}
	<br><br>
	Kesulitan : {{ $product->kesulitan }}
	<br><br>
	Harga : {{ $product->harga }}
	<br><br>
	Kategori : {{ $product->kategori }}
	<br><br>
	Penjelasan : {{ $product->penjelasan }}
	<br><br>
    Likes : {{ $product->likes }}
    <br><br>
    Views : {{ $product->views }}
    <br><br>
	Alat : <br><br>
	@foreach ($tools as $tool)
        {{ $tool->nama}}
        <br>
    @endforeach
    <br><br>
    Bahan : <br><br>
    @foreach ($materials as $material)
        {{ $material->nama}}
        <br>
    @endforeach
    <br><br>
    Langkah : <br><br>
    @foreach ($steps as $step)
        Judul : {{ $step->judul}}
        <br><br>
        Penjelasan : {{ $step->penjelasan}}
        <br><br>
        Gambar : <img src="../{{ $step->picture}}" height=200 width=200>
        <br><br>
    @endforeach
    <br><br>
</body>
</html>