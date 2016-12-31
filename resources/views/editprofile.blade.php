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
        <title> Edit Profile - Ngebuat.com</title>
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
                    <div class="row addproduct">
                    <div class="col-md-3">
                        <form action="{{ route('edit') }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <img id='img-upload' src="{{ $picture }}"/>
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <div class="btn btn-file">
                                        <img class="pilihfoto" src="img/GANTIPOTO.png"><input type="file" name="ProfPic" id="imgInp">
                                    </div>
                                    <input type="text" class="form-control" placeholder="Tidak ada foto" readonly>
                                </div>
                            </div>
                            <div class="input-group">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 formaddproduct">
                        <form class="form-horizontal formproduct">
                            <div class="form-group">
                                <label class="textleft control-label col-sm-3" for="namatampilan">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" name="Name" class="form-control inputform" id="namatampilan" name="namatampilan" placeholder="Nama" value="{{$nama}}"><div class="error"> {{ $errors->first('Name') }}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="textleft control-label col-sm-3" for="tanggallahir">Tanggal Lahir</label>
<!--                                <div class="col-sm-9" id="tanggallahir">-->
                                    <div class="col-sm-3">
                                        <select id="date" class="form-control inputform" name="Date" value="{{$date}}">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <select class="form-control inputform" id="month" name="Month" value="{{$month}}">
                                            <option value="1">Januari</option>
                                            <option value="2">Februari</option>
                                            <option value="3">Maret</option>
                                            <option value="4">April</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Juni</option>
                                            <option value="7">Juli</option>
                                            <option value="8">Agustus</option>
                                            <option value="9">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" id="year" name="Year" class="form-control inputform" placeholder="Tahun" value="{{$year}}">
                                        
                                    </div>
                                   <div class="error"> {{ $errors->first('Birthdate') }}</div>
                            </div>
                            <div class="form-group">
                                <label class="textleft control-label col-sm-3" for="jeniskelamin">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <input type="radio" class="" name="Sex" id="radio1" value="Laki-laki" <?php echo ($gender=='Laki-laki')?'checked':'' ?> ><label for="radio1" class="radiolabel">&emsp;&ensp;Laki-laki</label>
                                    <input type="radio" class="" name="Sex" id="radio2" value="Perempuan" <?php echo ($gender=='Perempuan')?'checked':'' ?>><label for="radio2" class="radiolabel">&emsp;&ensp;Perempuan</label>
                                     <div class="error"> {{ $errors->first('Sex') }}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="textleft control-label col-sm-3" for="telepon">Telepon</label>
                                <div class="col-sm-9">
                                    <input type="text" name="Phone" class="form-control inputform" id="telepon" placeholder="Telepon"  value="{{$phone}}"> <div class="error">{{ $errors->first('Phone') }}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="textleft control-label col-sm-3" for="website">Website</label>
                                <div class="col-sm-9">
                                    <input type="text" name="Website" class="form-control inputform" id="website" placeholder="Website" value="{{$website}}"> <div class="error">{{ $errors->first('Website') }}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="textleft control-label col-sm-3" for="city">Kota</label>
                                <div class="col-sm-9">
                                    <input type="text" name="City" class="form-control inputform" id="city" placeholder="Kota" value="{{$kota}}"> <div class="error"> {{ $errors->first('City') }}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="textleft control-label col-sm-3" for="postalcode">Kode Pos</label>
                                <div class="col-sm-9">
                                    <input type="text" name="Postal" value="{{$kodepos}}" class="form-control inputform" id="postalcode" placeholder="Kode Pos"><div class="error">{{ $errors->first('Postal') }}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="textleft control-label col-sm-3" for="province">Provinsi</label>
                                <div class="col-sm-9">
                                    <input type="text" name="Province" class="form-control inputform" id="province" placeholder="Provinsi" value="{{$provinsi}}"><div class="error">{{ $errors->first('Province') }}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="textleft control-label col-sm-3" for="country">Negara</label>
                                <div class="col-sm-9">
                                    <input type="text" name="Country" class="form-control inputform" id="country" placeholder="Negara" value="{{$negara}}"><div class="error">{{ $errors->first('Country') }}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label class="textleft control-label col-sm-3" for="bio">Siapa Kamu?<br><p class="biotext">Bio.</p></label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="Bio" rows="5" id="penjelasankarya" placeholder="Ceritakan tentang dirimu di sini" value="{{$biodata}}"></textarea><div class="error">{{ $errors->first('Bio') }}</div>
                                    </div>
                            </div>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                         
                            <div class="form-group">
                                <div class="col-sm-4 reset">
                                    <button class="btn resetbtn" type="reset">Reset &ensp;&rsaquo;</button>
                                </div>
                                <div class="pull-right col-sm-4">
                                    <input class="" type="image" name="submit" src="img/BARPERBARUI.png" border="0" alt="Submit">
                                </div>
                            </div>
                        </form>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready( function() {
                    $(document).on('change', '.btn-file :file', function() {
                    var input = $(this),
                        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                    input.trigger('fileselect', [label]);
                    });

                    $('.btn-file :file').on('fileselect', function(event, label) {

                        var input = $(this).parents('.input-group').find(':text'),
                            log = label;

                        if( input.length ) {
                            input.val(log);
                        } else {
                            if( log ) alert(log);
                        }

                    });
                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function (e) {
                                $('#img-upload').attr('src', e.target.result);
                            }

                            reader.readAsDataURL(input.files[0]);
                        }
                    }

                    $("#imgInp").change(function(){
                        readURL(this);
                    });
                });
            </script>
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

<!-- <html>
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
        <title> Edit Profile - Ngebuat.com</title>
</head>
<body>
	<form action="{{ route('edit') }}" method="POST" enctype="multipart/form-data">
		Nama : <input type="text" name="Name" value="{{$nama}}"> {{ $errors->first('Name') }}
		<br><br>
		Gender : <input type="text" name="Sex" value="{{$gender}}"> {{ $errors->first('Sex') }}
		<br><br>
		telp : <input type="text" name="Phone" value="{{$phone}}"> {{ $errors->first('Phone') }}
		<br><br>
		website : <input type="text" name="Website" value="{{$website}}"> {{ $errors->first('Website') }}
		<br><br>
		kota : <input type="text" name="City" value="{{$kota}}"> {{ $errors->first('City') }}
		<br><br>
		kodepos : <input type="text" name="Postal" value="{{$kodepos}}"> {{ $errors->first('Postal') }}
		<br><br>
		provinsi : <input type="text" name="Province" value="{{$provinsi}}"> {{ $errors->first('Province') }}
		<br><br>
		negara : <input type="text" name="Country" value="{{$negara}}"> {{ $errors->first('Country') }}
		<br><br>
		biodata : <input type="text" name="Bio" value="{{$biodata}}"> {{ $errors->first('Bio') }}
		<br><br>
		tanggal lahir : <input type="text" name="Date" value="{{$date}}">
		bulan lahir : <input type="text" name="Month" value="{{$month}}">
		tahun lahir : <input type="text" name="Year" value="{{$year}}">
		{{ $errors->first('Birthdate') }}
		<br><br>
		<img src="{{ $picture }}" width=100 height=100>
		<br><br>
		Profile Picture : <input type="file" name="ProfPic">
		<br><br>
		<input type="hidden" name="_token" value="{{ Session::token() }}">
		<input type="submit">
	</form>
</body>
</html>
 -->