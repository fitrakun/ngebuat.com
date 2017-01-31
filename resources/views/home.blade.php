<html>
<head>
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <link rel="stylesheet" href="{{asset('css/media.css')}}">
        <link rel="stylesheet" href="{{asset('css/indexmain.css')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <meta name="description" content="Login Page">
        <meta property="og:url"           content="http://www.ngebuat.com" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="Ngebuat.com" />
        <meta property="og:image"         content="http://www.ngebuat.com/daeun/img/LOGO-04.png" />
        <title> Home - Ngebuat.com</title>
</head>
<body>
    <!-- Buat admin page requirements ke 5
    @foreach($slides as $slide)
        {{$slide->link}}<br><br>
        <img src="../../{{ $slide->picture}}" height=200 width=200><br><br>
        ___________________________________________________________________ <br><br>
    @endforeach
     -->
        <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

        @if(Auth::check())
        @else
	<script>
            $(document).ready(function(){
                $("#signupModal").modal('show');
                function close(){
                    $("#signupModal").modal('hide');
                }
            });
        </script>
        <div class="modal fade" id="signupModal" role="dialog">
            <img class="background-modal" src="{{asset('img/web-11-60.png')}}">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onClick="close()">&times;</button>
                </div>
                <div class="modal-content">
                    <div class="col-md-12 center-block">
                    <input type="text" name="emailmodal" placeholder="Masukan email" class="emailmodal">
                    </div>
                    <div class="col-md-12 center-block">
                    <input type="submit" class="btn btn-masuk-sekarang" value="Masuk Sekarang!">
                    </div>
                    <div class="masuk-sekarang">Sudah menjadi anggota? &emsp;<a href="login" class="kuning">Masuk</a></div>
                </div>
            </div>
        </div>
        @endif
	<div class="container-fluid indexbody">
            @if(Auth::check())
<nav class="navigation row">
                    <div class="navbar-header">
                          <a class="navbar-brand" href="http://ngebuat.com/daeun/home"><img class="logo" src="img/LOGO-01.png"></a>
                   </div>
                    <div class="col-md-2 col-xs-3 nopadding">
                        <form action="{{ route('search') }}" method="POST" enctype="multipart/form-data">
                        	<input type="text" name="Name" class="form-control input-sm searchtutorial" placeholder="Ayo cari tutorialnya" />{{ $errors->first('Name') }}<input type="hidden" name="_token" value="{{ Session::token() }}">
                    </div>
              	<ul class="topnav list-group" id="topNav">
                    <li class="col-md-2 col-xs-5 nopadding"><div class="nopadding"><a href="#"><img class="img-responsive searchbutton btn-navbar" src="{{asset('img/BAR-04.png')}}"></a></div></li>
						</form>
                    <li class="col-xs-12"><div class="backblack nopadding"><a href="../../help"><input type="image" alt="Submit" name="submit" border="0" class="img-responsive bantuanbutton btn-navbar" src="{{asset('img/BAR-05.png')}}"><p class="navhidden">Bantuan</p></a></div></li>
                    <li class="col-xs-12"><div class="backblack nopadding fb-share-button" data-href="https://www.ngebuat.com/" data-layout="button_count" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.ngebuat.com&amp;src=sdkpreparse"><img class="img-responsive bagikanbutton btn-navbar" src="{{asset('img/BAR-06.png')}}"><p class="navhidden">Bagikan</p></a></div></li>
                    <div class="col-md-4 profile">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle col-md-12 buttonprofile" type="button" id="menu1" data-toggle="dropdown">
<img class="profile-thumbnail nopadding col-md-3" src="{{Auth::user()->picture}}"><div class="col-md-8"><span class="nopadding profilename">{{Auth::user()->username}}</span><span class="caret"></span></div><div class="col-md-1"></div>
                            </button>
                            <ul class="dropdown-menu dropdownprofile" role="menu" aria-labelledby="menu1">
                              <li role="presentation"><a role="menuitem" href="#">
                                  <div class="row">
                                    <img class="col-md-4" src="{{Auth::user()->picture}}">
                                    <span class="col-md-2">Profilku</span>
                                  </div>
                                  </a></li>
                              <li role="presentation"><a role="menuitem" href="#">
                                <div class="row">
                                    <img class="col-md-4" src="img/Tulis%20Karya.png">
                                  <span class="col-md-2">Tulis Karya</span>
                                </div>
                                    </a></li>
                              <li role="presentation"><a role="menuitem" href="#"><img class="keluaritem" src="img/Bar%20Keluar.png"></a></li>
                            </ul>
                        </div>
                    </div>
                        <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
                    </li>
                </ul>
                <script>
                    function myFunction() {
                        var x = document.getElementById("topNav");
                        if (x.className === "topnav") {
                            x.className += " responsive";
                        } else {
                            x.className = "topnav";
                        }
                    }
                </script>
            </nav>
            @else
            <nav class="navigation row">
                    <div class="navbar-header">
                          <a class="navbar-brand" href="http://ngebuat.com/daeun/home"><img class="logo" src="img/LOGO-01.png"></a>
                   </div>
                    <div class="col-md-2 col-xs-3 nopadding">
                        <form action="{{ route('search') }}" method="POST" enctype="multipart/form-data">
                        	<input type="text" name="Name" class="form-control input-sm searchtutorial" placeholder="Ayo cari tutorialnya" />{{ $errors->first('Name') }}<input type="hidden" name="_token" value="{{ Session::token() }}">
                    </div>
              	<ul class="topnav list-group" id="topNav">
                    <li class="col-md-2 col-xs-5 nopadding"><div class="nopadding"><a href="#"><img class="img-responsive searchbutton btn-navbar" src="{{asset('img/BAR-04.png')}}"></a></div></li>
						</form>
                    <li class="col-xs-12"><div class="backblack nopadding"><a href="#"><input type="image" alt="Submit" name="submit" border="0" class="img-responsive bantuanbutton btn-navbar" src="{{asset('img/BAR-05.png')}}"><p class="navhidden">Bantuan</p></a></div></li>
                    <li class="col-xs-12"><div class="backblack nopadding fb-share-button" data-href="https://www.ngebuat.com/" data-layout="button_count" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.ngebuat.com&amp;src=sdkpreparse"><img class="img-responsive bagikanbutton btn-navbar" src="{{asset('img/BAR-06.png')}}"><p class="navhidden">Bagikan</p></a></div></li>
                    <li  class="col-xs-12"><div class="backblack nopadding"><a href="signup"><img class="img-responsive daftarbutton btn-navbar" src="{{asset('img/BAR-07.png')}}"><p class="navhidden">Daftar</p></a></div></li>
                    <li  class="col-xs-12"><div class="backblack nopadding"><a href="login"><img class="img-responsive masukbutton btn-navbar" src="{{asset('img/BAR-08.png')}}"><p class="navhidden">Masuk</p></a></div></li>
                     <li class="icon col-xs-1 ">
                        <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
                    </li>
                </ul>
                <script>
                    function myFunction() {
                        var x = document.getElementById("topNav");
                        if (x.className === "topnav") {
                            x.className += " responsive";
                        } else {
                            x.className = "topnav";
                        }
                    }
                </script>
            </nav>
            @endif
            <div class="container whitebackground">
                <hr>
                  <div id="myCarousel" class="col-md-12 carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                      <li data-target="#myCarousel" data-slide-to="1"></li>
                      <li data-target="#myCarousel" data-slide-to="2"></li>
                      <li data-target="#myCarousel" data-slide-to="3"></li>
                    </ol>
                    <?php $isFirst = 1; ?>
                    <div class="carousel-inner" role="listbox">
                    @foreach ($product_popular as $product)
                    <!-- Wrapper for slides -->
                      @if($isFirst==1)
                          <div class="item active">
                      @else
                          <div class="item">
                      @endif  
                        <a href="showProduct/{{$product->id}}"><img class="img-responsive center-block" src="{{$product->picture}}" alt="{{ $product->nama }}" ></a>
                          <div class="carousel-caption">
                            <div class="row">
                                <img class="col-sm-3 img-responsive nopadding terbaik-caption" src="{{asset('img/terbaik.png')}}">
                                <div class="col-md-9 nopadding item-name"><img class="backabu" src="{{asset('img/backabu.png')}}"><span class="itemname">{{ $product->nama }}</span></div>
                            </div>
                          </div>
                      </div>
                    <?php $isFirst = 0; ?>
                    @endforeach

                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                <hr class="carouselhr">
                <div class="categorylist row">
                    <div class="col-sm-3">
                        <a href="category/dekorasi">
                            <h4 class="categorytext" style="text-align: center; margin-top: 0px !important;">Dekorasi</h4>
                            <div class="categoryimg dekorasiimg img-responsive center-block"> </div>
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="category/teknologi">
                            <h4 class="categorytext" style="text-align: center; margin-top: 0px !important;">Teknologi</h4>
                            <div class="categoryimg teknologiimg img-responsive center-block"> </div>
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="category/masakan">
                            <h4 class="categorytext" style="text-align: center; margin-top: 0px !important;">Masakan</h4>
                            <div class="categoryimg masakanimg img-responsive center-block"> </div>
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="category/kerajinan">
                            <h4 style="text-align: center; margin-top: 0px !important;">Kerajinan</h4>
                            <div class="categoryimg kerajinanimg img-responsive center-block"> </div>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="item-terbaik">
                    <div class="row">
                        <img class="col-sm-1 nopadding icon-terbaik" src="img/Logo-Terbaik.png">
                        <div class="col-sm-1 nopadding terbaiktext">Terbaik</div>
                    </div>
                    <div class="row1 row">
                        @foreach ($product_popular as $product)
                        <div class="terbaik-item col-sm-4 resultpadding">
                            <a href="../../showProduct/{{$product->id}}"><img class="img-responsive gambar-terbaik" src="{{ $product->picture}}"></a>
                            <div class="judul-terbaik">{{ $product->nama }}</div>
                            <div class="karya-terbaik">karya {{ $product->username_pembuat }}</div>
                        </div>
                        @endforeach
                    </div>
                    <div class="see-all-terbaik">
                        <a href="popular">
                        <img class="background-see-all-terbaik" src="img/Bar-Lihat%20Semua%20terbaik.png">
                        <span class="text-see-all-terbaik">Lihat semua Terbaik</span>
                        </a>
                    </div>
                </div>
                <hr class="terbaik">
                <div class="terbaru">
                    <div class="row">
                        <img class="col-sm-1 nopadding icon-terbaru" src="img/Logo%20Terbaru.png">
                        <span class="col-sm-1 terbarutext">Terbaru</span>
                    </div>
                    <div class="row1terbaru row">
                        @foreach ($product_new as $product)
                        <div class="col-sm-2 resultpadding">
                            <a href="../../showProduct/{{$product->id}}"><img class="img-responsive gambar-terbaru" src="{{ $product->picture}}"></a>
                            <div class="judul-terbaik">{{ $product->nama }}</div>
                            <div class="karya-terbaik">karya {{ $product->username_pembuat }}</div>
                        </div>
                        @endforeach
                    </div>
                    <div class="see-all-terbaru">
                        <a href="new">
                        <img class="background-see-all-terbaru" src="img/Bar-Lihat-Semua-terbaru.png">
                        <span class="text-see-all-terbaru">Lihat semua Terbaru</span>
                        </a>
                    </div>
                </div>
                <hr class="terbaik">
            </div>
        </div>
        <footer class="footer-index">
            <div class="container">
                <div class="konten">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <img class="col-xs-4 col-md-4 col-sm-4" src="img/1.png">
                                <div class="col-sm-8 ayodaftarkan">
                                    <span class="col-sm-9 nopadding">Ayo daftarkan dirimu dan dapatkan info-info terbaru dan terbaik di email kamu.</span>
                                    <div class="row"> 
                                        <div class="col-sm-8 kataayo">
                                        <input type="text" class="col-sm-1 form-control input-sm emailsignup" placeholder="Masukan email" /> </div>
                                        <div class="col-sm-4 kataayo2"><a href="#"><img class="img-responsive emailsignupbutton" src="img/BAR-08.png"></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <h4>Tentang Kami</h4>
                            <div class="fontfooter">
                                <a href="aboutus" class="afooter">Siapa kami ?</a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <h4>Temukan Kami</h4>
                            <div class="fontfooter">
                                <a href="http://line.me/ti/p/~@ysu1395x" class="afooter">Line &emsp;&emsp;&emsp;&emsp;&gt;</a>
                                <br>
                                <a href="https://www.facebook.com/ngebuatcom-537569316421740/?fref=ts" class="afooter">Facebook &emsp;&ensp;&gt;</a>
                                <br>
                                <a href="https://www.instagram.com/ngebuat/" class="afooter">Instagram &emsp;&gt;</a>
                            </div>
                        </div>
                    </div>
                    <div class="syarat">
                        <a href="terms" class="afooter">Syarat dan Ketentuan</a> | <a href="privacy" class="afooter">Kebijakan Privasi</a>
                    </div>
                    <div class="copyright">
                        <span class="tahun">2016</span>
                        <span class="ngebuatcom">Ngebuat.com</span>
                    </div>
                </div>
            </div>
        </footer>
</body>
</html>
<!-- <html>
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
				Pembuat : {{ $product->username_pembuat_produk }}
		        <br><br>
		        @if($product->penghargaan_produk==0)
		        	Tidak ada Penghargaan <br><br>
		        @else
		        	Ada penghargaan <br><br>
		        @endif
		        <img src="../../{{ $product->picture_produk}}" height=200 width=200><br><br>
				<a href="../../showProduct/{{$product->product_id}}">link</a>
				<br><br>
		    @endforeach
		@endif
	@endif
	<br><br>
	<b>baru</b> : <br><br>
	@foreach ($product_new as $product)
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
	<br><br>
	<b>popular</b> : <br><br>
	@foreach ($product_popular as $product)
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
 -->