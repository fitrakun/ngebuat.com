<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	Nama = {{$user->nama}}<br>
	Kota = {{$user->kota}}<br>
	Tanggal lahir = {{$user->tanggal_lahir}}<br>
	Bio = {{$user->biodata}}<br>
	Gender = {{$user->gender}}<br>
	Penghargaan = {{$ach}}<br>
	<br><br>
	Baris karya <br>
	@foreach($products as $product)
		Nama : {{ $product->nama }}
        <br><br>
        Pembuat : {{ $product->username_pembuat }}
        <br><br>
        @if($product->penghargaan==0)
        	Tidak ada Penghargaan <br><br>
        @else
        	Ada penghargaan <br><br>
        @endif
        <img src="../../{{ $product->picture}}" height=200 width=200><br><br>
		<a href="../../showProduct/{{$product->id}}">link</a>
		<br><br>
	@endforeach
</body>
</html>