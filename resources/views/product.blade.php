<html>
<head>
	<title></title>
</head>
<body>
    TENTANG CREATOR<br><br>
    {{ $pembuat_produk->username }} <br><br>
    {{ $pembuat_produk->biodata }} <br><br>
    -------------------------------------------------------------
    <br><br>
    KARYA LAINNYA<br><br>
    @foreach ($product_other as $pOther)
        {{ $pOther->nama}}
        <br>
    @endforeach
    -------------------------------------------------------------
    <br><br>
    KARYA SERUPA<br><br>
    @foreach ($product_related as $pRelated)
        {{ $pRelated->nama_produk}}
        <br>
    @endforeach
    -------------------------------------------------------------
    <br><br>
    @if($product->isVerified==0)
        UNVERIFIED <br><br>
    @else
        VERIFIED <br><br>
    @endif
    <img src="../{{ $product->picture}}" height=200 width=200>
    <br><br>
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
    LABEL : <br><br>
    @foreach ($labels as $label)
        {{ $label}}
        <br>
    @endforeach
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
        <?php
            $arr = $productCtrl->getStepPictures($step->id);
        ?>
        @foreach ($arr as $pict)
            @if($pict!=null)
                Gambar : <img src="../{{ $pict->picture}}" height=200 width=200>
                <br><br>
            @endif
        @endforeach
        --------------------------------------------------------------------
        <br><br>
    @endforeach
    <br><br>
</body>
</html>
