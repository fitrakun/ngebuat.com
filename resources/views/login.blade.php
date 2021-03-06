<html>
<head>
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <link rel="stylesheet" href="{{asset('css/media.css')}}">
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <meta name="description" content="Login Page">
        <title> Login- Ngebuat.com</title></head>
<body>
	<div class="container-fluid indexbody">
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
            <div class="containerdaftar center-block">
            	<div class="col-md-12 col-xs-12">
                    <img class="img-responsive signupform" src="{{asset('img/Ceritakami-02.png')}}">
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3 abs inputsignup">
                <div class="row">
                	{{ $error }}
                    <form action="{{ route('signin')}}" method="POST">
                        
                        <input class="signupinput" type="text" class="form-control" id="nama" name="Username" placeholder="Username">
                        <div class="error"> {{ $errors->first('Username') }}</div>
                        <input class="signupinput" type="password" class="form-control" id="password" name="Password" placeholder="Password">
                        <div class="error"> {{ $errors->first('Password') }}</div>
                        <input class="submitpicture1" type="image" name="submit" src="{{asset('img/Gabung-04.png')}}"" border="0" alt="Submit">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                    </div>
                </div>
                <div class="col-xs-5 masuk abs">Belum menjadi anggota?<a class="kuning" href="login"> Daftar</a></div>
            </div>
	<!-- {{ $error }}
	<form action="{{ route('signin') }}" method="POST">
		Nama tampilan : <input type="text" name="Username"> {{ $errors->first('Username') }}
		<br><br>
		password : <input type="password" name="Password"> {{ $errors->first('Password') }}
		<br><br>
		<input type="hidden" name="_token" value="{{ Session::token() }}">
		<input type="submit">
	</form> -->
</body>
</html>
