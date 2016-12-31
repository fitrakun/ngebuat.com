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
        <meta name="description" content="Login Page">
        <title> My Profile - Ngebuat.com</title>
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
<img class="profile-thumbnail nopadding col-md-3" src="../{{Auth::user()->picture}}"><div class="col-md-8"><span class="nopadding profilename">{{Auth::user()->username}}</span><span class="caret"></span></div><div class="col-md-1"></div>
                            </button>
                            <ul class="dropdown-menu dropdownprofile" role="menu" aria-labelledby="menu1">
                              <li role="presentation"><a role="menuitem" href="http://ngebuat.com/daeun/profile/{{Auth::user()->username}}">
                                  <div class="row">
                                    <img class="col-md-4" src="../{{Auth::user()->picture}}">
                                    <span class="col-md-2">Profilku</span>
                                  </div>
                                  </a></li>
                              <li role="presentation"><a role="menuitem" href="#">
                                <div class="row">
                                    <img class="col-md-4" src="../img/Tulis%20Karya.png">
                                  <span class="col-md-2">Tulis Karya</span>
                                </div>
                                    </a></li>
                              <li role="presentation"><a role="menuitem" href="#"><img class="keluaritem" src="../img/Bar%20Keluar.png"></a></li>
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
                <div class="namaprofile col-md-12">
                    @if(empty($user->nama))
                        <div class="username">{{$user->username}}</div>
                    @else
                    <div class="username">{{$user->nama}}</div>
                    @endif
                </div>
                <div class="profiledetails">
                    <div class="row">
                        <div class="col-md-5 center-block">
                            <img class="fotoprofile" src="../{{Auth::user()->picture}}">
                        </div>
                        <div class="col-md-7">
                            <div class="detailprofil">
                                <div class="row kontenprofil">
                                    <div class="col-md-4 labelprofil">Tanggal Lahir</div>
                                    <div class="col-md-8">{{$user->tanggal_lahir}}</div>
                                </div>
                                <div class="row kontenprofil">
                                    <div class="col-md-4 labelprofil">Bio</div>
                                    <div class="col-md-8">{{$user->biodata}}</div>
                                </div>
                                <div class="row">
                                    @if($user->gender=="L")
                                    <img class="genderprofil" src="../img/COWOK.png">
                                    @elseif ($user->gender=="P")
                                    <img class="genderprofil" src="../img/CEWEK.png">
                                    @endif
                                </div>
<!--                                <img class="genderprofil" src="img/COWOK.png">-->
                                <div class="row lsright">
                                    <a href="#" onclick="toggler('selengkapnya')"><img class="lsprofile" src="../img/BAR-8-LS.png"></a>
                                </div>
                                <script>
                                    function toggler(divId){
                                        $("#" + divId).toggle();
                                        $('.lsright').hide();
                                    }
                                </script>
                                <div id="selengkapnya">
                                    <div class="row kontenprofil">
                                        <div class="col-md-4 labelprofil">Telepon</div>
                                        <div class="col-md-8">{{$user->telp}}</div>
                                    </div>
                                    <div class="row kontenprofil">
                                        <div class="col-md-4 labelprofil">Website</div>
                                        <div class="col-md-8"><a href="#">{{$user->website}}</a></div>
                                    </div>
                                    <div class="row kontenprofil">
                                        <div class="col-md-4 labelprofil">Kota</div>
                                        <div class="col-md-8">{{$user->kota}}</div>
                                    </div>
                                    <div class="row kontenprofil">
                                        <div class="col-md-4 labelprofil">Kode Pos</div>
                                        <div class="col-md-8">{{$user->kodepos}}</div>
                                    </div>
                                    <div class="row kontenprofil">
                                        <div class="col-md-4 labelprofil">Provinsi</div>
                                        <div class="col-md-8">{{$user->provinsi}}</div>
                                    </div>
                                    <div class="row kontenprofil">
                                        <div class="col-md-4 labelprofil">Negara</div>
                                        <div class="col-md-8">{{$user->negara}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row penghargaandetail">
                                <div class="col-md-2 picon">
                                    <img class="penghargaanicon" src="../img/BAR-7-TERBAIK.png">
                                </div>
                                <div class="col-md-4 penghargaan">
                                    <div class="text-center">Penghargaan</div>
                                    <div class="text-center penghargaannumber">{{$ach}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bariskarya">
                        <div class="col-md-12">
                            <img class="bariskaryabar" src="../img/BAR-6-BARISKARYA.png">
                        </div>
                        <div class="row itembk">
                                @foreach($products as $product)
                                @if($product->penghargaan==0)
                                <div class="col-md-2">
                                @else
                                <div class="col-md-2 terbaikpin">
                                @endif
                                <a href="../showProduct/{{$product->id}}"><img class="item-bariskarya" src="../{{ $product->picture}}"></a>
                                @if($product->penghargaan==0)
                                @else
                                <div class="col-md-5 imgpin">
                                    <img class="pin" src="../img/BAR-7-TERBAIK.png">
                                </div>
                                @endif
                                <div class="judul-dekor">{{ $product->nama }}</div>
                                <div class="karya-dekor">karya {{ $product->username_pembuat }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <footer class="footer-index">
            <div class="container">
                <div class="konten">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <img class="col-md-4 col-sm-4 col-xs-4" src="../img/1.png">
                                
                                <div class="col-sm-8">
                                    <span class="col-sm-9 nopadding">Ayo daftarkan dirimu dan dapatkan info-info terbaru dan terbaik di email kamu.</span>
                                    <div class="col-xs-12 row">
                                        <form action="{{ route('subs') }}" method="POST">
                                        <div class="col-xs-8 col-sm-8">
                                        <input type="text" class="col-sm-1 form-control input-sm emailsignup" name="Email" placeholder="Masukan email" />{{ $errors->first('Email') }}
                                        </div>
                                        <div class="col-xs-4 col-sm-4 nopadding"><input type="image" name="submit" alt="Submit" class="img-responsive emailsignupbutton" src="../img/BAR-08.png"></div>
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

<!-- <!DOCTYPE html>
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
</html> -->