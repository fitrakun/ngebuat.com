<html>
<head>
    <title></title>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
    <meta property="og:url"           content="http://www.ngebuat.com/daeun/showProduct/{{$product->id}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{$product->nama}}" />
    <meta property="og:description"   content="See my new product" />
    <meta property="og:image"         content="www.ngebuat.com/daeun/{{$product->picture}}}" />
</head>
<body>
    <script>
    function like(){
        var token = "{{ csrf_token() }}";
        var url = '/like';
        $.post(url, {id: "{{$product->id}}", _token: token}, function(data){
            if(data["status"]!="failed"){
                if(data["button"]=="liked"){
                    data["button"]="dislike";
                }
                $("#like").html(data["button"]);
                $("#jml_like").html(data["value"]);
               console.log(data);
           }
           else{
                window.location = "/login";
           }
        });
    }
    </script>
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <div class="fb-share-button" data-href="http://www.ngebuat.com/daeun/showProduct/&#123;&#123;$product-&gt;id&#125;&#125;" data-layout="button" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.ngebuat.com%2Fdaeun%2FshowProduct%2F%257B%257B%24product-%3Eid%257D%257D&amp;src=sdkpreparse">Share</a></div>
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
    <b>LABEL</b> : <br><br>
    @foreach ($labels as $label)
        {{ $label}}
        <br>
    @endforeach
    <br><br>
    <b>Alat</b> : <br><br>
    @foreach ($tools as $tool)
        {{ $tool->nama}}
        <br>
    @endforeach
    <br><br>
    <b>Bahan</b> : <br><br>
    @foreach ($materials as $material)
        {{ $material->nama}}
        <br>
    @endforeach
    <br><br>
    <b>Langkah</b> : <br><br>
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
    <b>KOMENTAR</b> <br><br>
    @foreach ($comments as $comment)
        {{$comment->username}} <br>
        <?php
            $subDate = $productCtrl->substractDate($comment->created_at);
        ?>
        {{ $subDate }}<br><br>
        {{$comment->body}} <br>
        @if($comment->picture!=NULL)
            <img src="../{{ $comment->picture}}" height=200 width=200>
        @endif
        <br>
        -----------------------------------
        <br><br>
    @endforeach
    <br><br>
    <form action="{{ route('addComment') }}" method="POST" enctype="multipart/form-data">
        <input size=100 type="text" name="BodyCmt"><br><br>
        <input type="file" name="PictureCmt"><br><br>
        <input type="hidden" name="_token" value="{{ Session::token() }}">
        <input type="submit">
    </form>
</body>
</html>
