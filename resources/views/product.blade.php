<html>
<head>
    <title></title>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
</head>
<body>
    <script>
    function like(){
        var token = "{{ csrf_token() }}";
        var url = '/like';
        $.post(url, {id: "{{$product->id}}", _token: token}, function(data){
            if(data["button"]=="liked"){
                data["button"]="dislike";
            }
            $("#like").html(data["button"]);
            $("#jml_like").html(data["value"]);
           console.log(data);
        });
    }
    </script>
    @if($like==NULL)
    @else
        @if($like=="liked")
            <?php
                $like="dislike"
            ?>
        @endif
        <button onclick="like()"><span id="like">{{$like}}</span></button><br><br>
    @endif
    TENTANG CREATOR<br><br>
    {{ $pembuat_produk->username }} <br><br>
    {{ $pembuat_produk->biodata }} <br><br>
    -------------------------------------------------------------
    <br><br>
    KARYA LAINNYA<br><br>
    @foreach ($product_other as $pOther)
        Nama : {{ $pOther->nama }}
        <br><br>
        Pembuat : {{ $pOther->username_pembuat }}
        <br><br>
        @if($pOther->penghargaan==0)
            Tidak ada Penghargaan <br><br>
        @else
            Ada penghargaan <br><br>
        @endif
        <img src="../../{{ $pOther->picture}}" height=200 width=200><br><br>
        <a href="../../showProduct/{{$pOther->id}}">link</a>
        <br><br>
    @endforeach
    -------------------------------------------------------------
    <br><br>
    KARYA SERUPA<br><br>
    @foreach ($product_related as $pRelated)
        Nama : {{ $pRelated->nama_produk }}
        <br><br>
        Pembuat : {{ $pRelated->username_pembuat_produk }}
        <br><br>
        @if($pRelated->penghargaan_produk==0)
            Tidak ada Penghargaan <br><br>
        @else
            Ada penghargaan <br><br>
        @endif
        <img src="../../{{ $pRelated->picture_produk}}" height=200 width=200><br><br>
        <a href="../../showProduct/{{$pRelated->product_id}}">link</a>
        <br><br>
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
    Likes : <span id="jml_like">{{ $product->likes }}</span>
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
