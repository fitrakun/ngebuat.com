<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <link rel="stylesheet" href="{{asset('css/media.css')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <meta name="description" content="SignUp Page">
        <title> Privacy - Ngebuat.com</title>
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
            <div class="container whitebackground">
                 <div class="col-sm-12">
                 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce aliquam accumsan mauris at porta. Aenean auctor metus commodo diam efficitur fermentum. Cras egestas eros a urna consequat, eget tempus nisi feugiat. Nulla gravida, diam in sodales efficitur, magna purus ultricies ex, ac tempus tortor est ac eros. Fusce sed placerat ipsum. Aliquam euismod varius erat, sed vulputate sem dignissim a. Aliquam at tortor sit amet leo commodo bibendum at in odio. Phasellus ut sodales dui, a cursus odio. Cras luctus, sapien at vehicula elementum, orci leo dapibus justo, vitae tincidunt purus ipsum mattis ex. Donec sed arcu sit amet leo egestas finibus. Vivamus ut justo tortor. Etiam ante nunc, tristique non magna at, posuere varius sem. Duis pretium tellus eget condimentum egestas. Integer aliquam lectus justo, a lacinia mi hendrerit ac. Aliquam mollis, dui sed faucibus eleifend, metus ex vestibulum magna, eu porttitor neque dolor a nulla. Quisque ut interdum odio, non scelerisque lorem.
                  </div>
            </div>
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
                        <div class="col-xs-12 col-sm-2">
                            <img class="qrcodeline" src="{{asset('img/qrcodeline.jpg')}}">
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