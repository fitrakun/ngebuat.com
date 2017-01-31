<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <link rel="stylesheet" href="{{asset('css/media.css')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <meta name="description" content="Login Page">
        <title> Add Product - Ngebuat.com</title>
</head>
<body>
<div class="container-fluid indexbody">
                @if(Auth::check())
                   <nav class="navigation row">
                    <div class="col-md-2 col-xs-2 space"></div>
                    <div class="col-md-2 col-xs-3 nopadding">
                        <form action="{{ route('search') }}" method="POST" enctype="multipart/form-data">
                            <input type="text" name="Name" class="form-control input-sm searchtutorial" placeholder="Ayo cari tutorialnya" />{{ $errors->first('Name') }}<input type="hidden" name="_token" value="{{ Session::token() }}">
                    </div>
                <ul class="topnav list-group" id="topNav">
                    <li class="col-md-2 col-xs-5 nopadding"><div class="nopadding"><a href="#"><img class="img-responsive searchbutton btn-navbar" src="{{asset('img/BAR-04.png')}}"></a></div></li>
                        </form>
                    <li class="col-xs-12"><div class="backblack nopadding"><a href="#"><input type="image" alt="Submit" name="submit" border="0" class="img-responsive bantuanbutton btn-navbar" src="{{asset('img/BAR-05.png')}}"><p class="navhidden">Bantuan</p></a></div></li>
                    <li class="col-xs-12"><div class="backblack nopadding"><a href="#"><img class="img-responsive bagikanbutton btn-navbar" src="{{asset('img/BAR-06.png')}}"><p class="navhidden">Bagikan</p></a></div></li>
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
                    <div class="col-md-2 col-xs-2 space"></div>
                    <div class="col-md-2 col-xs-3 nopadding">
                        <form action="{{ route('search') }}" method="POST" enctype="multipart/form-data">
                            <input type="text" name="Name" class="form-control input-sm searchtutorial" placeholder="Ayo cari tutorialnya" />{{ $errors->first('Name') }}<input type="hidden" name="_token" value="{{ Session::token() }}">
                    </div>
                <ul class="topnav list-group" id="topNav">
                    <li class="col-md-2 col-xs-5 nopadding"><div class="nopadding"><a href="#"><img class="img-responsive searchbutton btn-navbar" src="{{asset('img/BAR-04.png')}}"></a></div></li>
                        </form>
                    <li class="col-xs-12"><div class="backblack nopadding"><a href="#"><input type="image" alt="Submit" name="submit" border="0" class="img-responsive bantuanbutton btn-navbar" src="{{asset('img/BAR-05.png')}}"><p class="navhidden">Bantuan</p></a></div></li>
                    <li class="col-xs-12"><div class="backblack nopadding"><a href="#"><img class="img-responsive bagikanbutton btn-navbar" src="{{asset('img/BAR-06.png')}}"><p class="navhidden">Bagikan</p></a></div></li>
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
	<script>
		var countAlat = 1;
		var countBahan = 1;
		var countStep = 3;
	</script>
	<form action="{{ route('addProduct') }}" method="POST" enctype="multipart/form-data">
		Nama : <input type="text" name="Name"> {{ $errors->first('Name') }}
		<br><br>
		Label : <input type="text" name="Label"> {{ $errors->first('Label') }}
		<br><br>
		Tingkat Kesulitan : <input type="text" name="Level"> {{ $errors->first('Level') }}
		<br><br>
		Perkiraan Harga : <input type="text" name="Price"> {{ $errors->first('Price') }}
		<br><br>
		Kategori : <input type="text" name="Category"> {{ $errors->first('Category') }}
		<br><br>
		Penjelasan Karya : <input type="text" name="Desc"> {{ $errors->first('Desc') }}
		<br><br>
		Gambar : <input type="file" name="Picture"> {{ $errors->first('Picture') }} 
		<br><br>
		<div id='alat'>
			Alat : <br>
			<input type="text" name="alat1"><br><br> {{ $errors->first('alat1') }} 
		</div>
		<button type="button" onClick="addColumnAlat();">add kolom</button>
		<br><br>
		<div id='bahan'>
			Bahan : <br>
			<input type="text" name="bahan1"><br><br> {{ $errors->first('bahan1') }} 
			
		</div>
		<button type="button" onClick="addColumnBahan();">add kolom</button>
		<br><br>
		Langkah : <br><br>
		<div id='langkah'>
			Judul : <input type="text" name="judulstep1"><br><br> {{ $errors->first('judulstep1') }} 
			Deskripsi : <input type="text" name="descstep1"><br><br> {{ $errors->first('descstep1') }} 
			Gambar 1: <input type="file" name="step1-1"> {{ $errors->first('step1-1') }} <br><br>
			Judul Gambar 1: <input type="text" name="judulstep1-1"> {{ $errors->first('judulstep2-1') }} <br><br>
			Gambar 2: <input type="file" name="step1-2"> {{ $errors->first('step1-2') }} <br><br>
			Judul Gambar 2: <input type="text" name="judulstep1-2"> {{ $errors->first('judulstep1-2') }} <br><br>
			Gambar 3: <input type="file" name="step1-3"> {{ $errors->first('step1-3') }} <br><br>
			Judul Gambar 3: <input type="text" name="judulstep1-3"> {{ $errors->first('judulstep1-3') }} <br><br>
		</div>
		<br>
		<button type="button" onClick="addColumnStep();">add kolom</button>
		<br><br>
		<input type="hidden" id="countAlat" name="countAlat" value='1'>
		<input type="hidden" id="countBahan" name="countBahan" value='1'>
		<input type="hidden" id="countStep" name="countStep" value='1'>
		<input type="hidden" name="_token" value="{{ Session::token() }}">
		<input type="submit">
	</form>	
</div>
<footer class="footer-index">
                <div class="container">
                    <div class="konten">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <img class="col-md-4 col-sm-4 col-xs-4" src="img/1.png">
                                    
                                    <div class="col-sm-8">
                                        <span class="col-sm-9 nopadding">Ayo daftarkan dirimu dan dapatkan info-info terbaru dan terbaik di email kamu.</span>
                                        <div class="col-xs-12 row">
                                            <form action="{{ route('subs') }}" method="POST">
                                            <div class="col-xs-8 col-sm-8">
                                            <input type="text" class="col-sm-1 form-control input-sm emailsignup" name="Email" placeholder="Masukan email" />{{ $errors->first('Email') }}
                                            </div>
                                            <div class="col-xs-4 col-sm-4 nopadding"><input type="image" name="submit" alt="Submit" class="img-responsive emailsignupbutton" src="img/BAR-08.png"></div>
                                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <h4>Tentang Kami</h4>
                                <div class="fontfooter">
                                    <a href="aboutus" class="afooter">Siapa kami ?</a>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <h4>Temukan Kami</h4>
                                <div class="fontfooter">
                                    <br> <br>
                                    <a href="https://www.facebook.com/ngebuatcom-537569316421740/?fref=ts" class="afooter">Facebook &emsp;&ensp;&gt;</a>
                                    <br>
                                    <a href="https://www.instagram.com/ngebuat/" class="afooter">Instagram &emsp;&gt;</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 syarat">
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

<script type="text/javascript">
	function addColumnAlat(){
		++countAlat;
		/*var newcontent = "<input type=\"text\" name=\"alat" + countAlat + "\"><br><br> {{ $errors->first('alat" + countAlat + "') }}";
		document.getElementById('alat').innerHTML += newcontent;*/
		var div = document.createElement("div");	
                div.className="row";
                div.id = "alat" + countAlat;
		var input = document.createElement("input");
		input.type = "text";
		input.name = "alat" + countAlat;
                //document.getElementById('alat'+countAlat).appendChild(input);
                div.innerHTML = "<div class='col-sm-3'></div> <div class='col-sm-5 addalatleft'> <input type='text' placeholder='Alat"+countAlat+"' class='form-control inputform' name='alat" + countAlat+"' id='alat" + countAlat + "'> </div>";
                document.getElementById('alat').appendChild(div);		
//document.getElementById('alat').appendChild(input); // put it into the DOM

		document.getElementById('countAlat').setAttribute('value', countAlat);
		return true;
	}

	function addColumnBahan(){
		++countBahan;
		var newcontent = "<input type=\"text\" name=\"bahan" + countBahan + "\"><br><br> {{ $errors->first('bahan" + countBahan + "') }}";
		document.getElementById('bahan').innerHTML += newcontent;
		
		document.getElementById('countBahan').setAttribute('value', countBahan);
		return true;
	}

	function addColumnStep(){
		++countStep;
		var newcontent = "Judul : <input type=\"text\" name=\"judulstep" + countStep + "\"><br><br> {{ $errors->first('judulstep" + countStep + "') }} Deskripsi : <input type=\"text\" name=\"descstep" + countStep + "\"><br><br> {{ $errors->first('descstep" + countStep + "') }} Gambar : <input type=\"file\" name=\"step" + countStep + "\"> {{ $errors->first('step" + countStep + "') }} <br><br>"
		document.getElementById('langkah').innerHTML += newcontent;
		
		document.getElementById('countStep').setAttribute('value', countStep);
		return true;
	}
</script>
