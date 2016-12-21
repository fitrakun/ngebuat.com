<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="{{asset('js/addinput.js')}}" language="Javascript" type="text/javascript"></script>
        <meta name="description" content="addProduct Page">
        <title> Tambah Karya - Ngebuat.com</title>
    </head>
<body>
	<script>
		var countAlat = 1;
		var countBahan = 1;
		var countStep = 1;
	</script>
	<div class="container-fluid indexbody">
            <nav class="navigation row">
                    <div class="col-md-2 space"></div>
                    <div class="col-md-2 nopadding">
                        <input type="text" class="form-control input-sm searchtutorial" placeholder="Ayo cari tutorialnya" />
                    </div>
                    <div class="col-md-1 nopadding"><a href="#"><img class="img-responsive searchbutton btn-navbar" src="img/BAR-04.png"></a></div>
                    <div class="col-md-1 nopadding"><a href="#"><img class="img-responsive bantuanbutton btn-navbar" src="img/BAR-05.png"></a></div>
                    <div class="col-md-1 nopadding"><a href="#"><img class="img-responsive bagikanbutton btn-navbar" src="img/BAR-06.png"></a></div>
                    <div class="col-md-2 profile">
                        <div class="dropdown row">
                            <button class="btn dropdown-toggle col-md-7 buttonprofile" type="button" id="menu1" data-toggle="dropdown"><img class="profile-thumbnail col-md-3 nopadding img-responsive" src="img/Display%20Picture.png"><span class="nopadding profilename col-md-8">Melmaria</span><span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdownprofile" role="menu" aria-labelledby="menu1">
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">
                                  <div class="row">
                                    <img class="col-md-4" src="img/Display%20Picture.png">
                                    <span class="col-md-2">Profilku</span>
                                  </div>
                                  </a></li>
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">
                                <div class="row">
                                    <img class="col-md-4" src="img/Tulis%20Karya.png">
                                  <span class="col-md-2">Tulis Karya</span>
                                </div>
                                    </a></li>
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><img class="keluaritem" src="img/Bar%20Keluar.png"></a></li>
                            </ul>
                        </div>
                    </div>
            </nav>
    <div class="container whitebackground">
                <div class="row addproduct">
                    <div class="col-md-3">
                        <div class="form-group">
                            <img id='img-upload' src="img/DISPLAY%20PICTURE_2.png"/>
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <div class="btn btn-file">
                                        <img class="pilihfoto" src="img/pilihfoto.png"><input type="file" id="imgInp" name="Picture">
                                    </div>
                                    <input type="text" class="form-control" placeholder="Tidak ada foto" readonly>
                                    {{$errors->first('Picture') }} 
                                </div>
                            </div>
                            <div class="input-group">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 formaddproduct">
                        <form action="{{ route('addProduct') }}" method="POST" enctype="multipart/form-data" class="form-horizontal formproduct">
                            <div class="form-group">
                                <label class="textleft control-label col-sm-3" for="judulkarya">Judul Karya</label>
                                <div class="col-sm-9">
                                    <input name="Name" type="text" class="form-control inputform" id="judulkarya" placeholder="Masukan Judul">{{ $errors->first('Name') }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="textleft control-label col-sm-3" for="labelkarya">Label</label>
                                <div class="col-sm-9">
                                    <input name="Label" type="text" class="form-control inputform" id="labelkarya" placeholder="Masukan Label">{{ $errors->first('Label') }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="textleft control-label col-sm-3" for="tingkatkesulitan">Tingkat Kesulitan</label>
                                <div class="col-sm-3">
                                        <div id="ratingsForm">
                                            <div class="stars">
                                                <input type="radio" name="star" class="star-1" id="star-1" value=1 />
                                                <label class="star-1" for="star-1">1</label>
                                                <input type="radio" name="star" class="star-2" id="star-2" value=2 />
                                                <label class="star-2" for="star-2">2</label>
                                                <input type="radio" name="star" class="star-3" id="star-3" value=3/>
                                                <label class="star-3" for="star-3">3</label>
                                                <input type="radio" name="star" class="star-4" id="star-4" value=4/>
                                                <label class="star-4" for="star-4">4</label>
                                                <input type="radio" name="star" class="star-5" id="star-5" value=5/>
                                                <label class="star-5" for="star-5">5</label>
                                                <span></span>
                                            </div>
                                        </div>
                                </div>
                                <input type="hidden" id="level" name="Level" value="0">{{ $errors->first('Level') }}
                                <label class="textleft control-label col-md-3 harga1" for="perkiraanharga">Perkiraan Harga</label>
                                <div class="col-md-3 harga2">
                                    <input type="text" class="form-control inputform" id="perkiraanharga" name="Price" placeholder="Harga">{{ $errors->first('Price') }}
                                </div>    
                            </div>
                            <div class="form-group">
                                <label class="textleft control-label col-sm-3" for="kategori">Kategori</label>
                                    <input type="radio" class="dekorasi-1 kategoriradiobutton" name="Category" id="radio1" value="Dekorasi" checked><label for="radio1" class="radiolabel">&emsp;&nbsp;Dekorasi</label>
                                    <input type="radio" class="dekorasi-1 kategoriradiobutton" name="Category" id="radio2" value="Dekorasi"><label for="radio2" class="radiolabel">&emsp;&nbsp;Teknologi</label>
                                    <input type="radio" class="dekorasi-1 kategoriradiobutton" name="Category" id="radio3" value="Dekorasi"><label for="radio3" class="radiolabel">&emsp;&nbsp;Makanan</label>
                                    <input type="radio" class="dekorasi-1 kategoriradiobutton" name="Category" id="radio4" value="Dekorasi"><label for="radio4" class="radiolabel">&emsp;&nbsp;Kerajinan</label>
                                    {{ $errors->first('Category') }}
                            </div>
                            <div class="form-group">
                                    <label class="textleft control-label col-sm-3" for="penjelasankarya">Penjelasan Karya</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="5" id="penjelasankarya" placeholder="Penjelasan" name="Desc"></textarea>
                                        {{ $errors->first('Desc') }}
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="textleft control-label col-sm-3" for="alat">Alat</label>
                                <div id="dynamicInput">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <input type="text" placeholder="Alat" class="form-control inputform" id="alat1" name="alat1">
                                            {{ $errors->first('alat1') }} 
                                        </div> 
                                    </div>
                                </div>
                                <input type="button" class="pull-right col-sm-2 btn tambahalat" onclick="addInput('dynamicInput');">
                                <div class="col-sm-2"></div>
                            </div>
                            <div class="form-group">
                                <label class="textleft control-label col-sm-3" for="bahan">Bahan</label>
                                <div id="dynamicInput2">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <input type="text" placeholder="Bahan" class="form-control inputform" id="bahan1" name="bahan1">
                                            {{ $errors->first('bahan1') }}
                                        </div> 
                                    </div>
                                </div>
                                <input type="button" class="pull-right col-sm-2 btn tambahbahan" onclick="addInput2('dynamicInput2');">
                                <div class="col-sm-5"></div>
                            </div>
                            <hr>
                            <div id="dynamicInput3">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="textleft control-label col-sm-3" for="langkah1">Langkah</label>
                                        <div class="col-sm-9">
                                            <input type="text" placeholder="Judul Langkah" class="form-control inputform" id="langkah1" name="judulstep1">
                                            {{ $errors->first('judulstep1') }} 
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                        </div>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="5" id="penjelasanlangkah" placeholder="Penjelasan Langkah" name="descstep1"></textarea>
                                            {{ $errors->first('descstep1') }} 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="textleft control-label col-sm-3" for="gambar">Gambar</label>
                                        <div id="dynamicInputgambar1-1">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <img id='img-upload1-1' class="img-upload2" src="img/DISPLAY%20PICTURE_2.png"/>
                                                        <div class="input-group input-group1-1">
                                                            <div class="input-group-btn">
                                                                <div class="btn-file2 btn btn-file1-1">
                                                                    <img class="pilihfoto" src="img/pilih%20gambar.png"><input type="file" id="imgInp1-1" onClick="getId(this.id)" name="step1">{{ $errors->first('step1') }}
                                                                </div>
                                                                <input type="text" class="hidden form-control" placeholder="" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="input-group">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 inputjudulgambar">
                                                    <input type="text" placeholder="Judul Gambar" class="form-control inputform" id="langkah">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="button" class="pull-right col-sm-2 btn tambahgambar" onclick="addInputGambar('dynamicInputgambar1-1');">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="button" class="pull-right col-sm-2 btn tambahlangkah" onclick="addInputLangkah('dynamicInput3');">
                                <hr class="tambahlangkahhr">
                            </div>
                            <input type="hidden" id="countAlat" name="countAlat" value='1'>
							<input type="hidden" id="countBahan" name="countBahan" value='1'>
							<input type="hidden" id="countStep" name="countStep" value='1'>
							<input type="hidden" id="countGambarperLangkah" name="countGambarperLangkah" value="1-1">
							<input type="hidden" name="_token" value="{{ Session::token() }}">
							<input type="submit">
                        </form>
                    </div>
                </div>
            </div>
            <script>
                var counterlangkah=1;
                var countergambar = [];
                countergambar[counterlangkah]=1;
                function addInputLangkah(divName){
                    var newdiv = document.createElement('div');
                    newdiv.className= 'row';
                    counterlangkah++;
                    countergambar[counterlangkah]=1;
                    var addig = 'addInputGambar("dynamicInputGambar'+counterlangkah+'-'+countergambar[counterlangkah]+'");';
                    newdiv.innerHTML = "<hr><div class='form-group'><label class='textleft control-label col-sm-3' for='langkah"+ counterlangkah+"'>Langkah</label><div class='col-sm-9'><input type='text' placeholder='Judul Langkah' class='form-control inputform' id='langkah"+counterlangkah+"'></div></div><div class='form-group'><div class='col-sm-3'></div><div class='col-sm-9'><textarea class='form-control' rows='5' id='penjelasanlangkah' placeholder='Penjelasan Langkah'></textarea></div></div><div class='form-group'><label class='textleft control-label col-sm-3' for='gambar'>Gambar</label><div id='dynamicInputGambar"+counterlangkah+"-"+countergambar[counterlangkah]+"'><div class='row'><div class='col-sm-2'><div class='form-group'><img id='img-upload"+counterlangkah+"-"+countergambar[counterlangkah]+"' class='img-upload2' src='img/DISPLAY%20PICTURE_2.png'/><div class='input-group input-group"+counterlangkah+"-"+countergambar[counterlangkah]+"'><div class='input-group-btn'><div class='btn-file2 btn btn-file"+counterlangkah+"-"+countergambar[counterlangkah]+"'><img class='pilihfoto' src='img/pilih%20gambar.png'><input type='file' id='imgInp"+counterlangkah+"-"+countergambar[counterlangkah]+"' onClick='getId(this.id)'></div><input type='text' class='hidden form-control' placeholder='' readonly></div></div><div class='input-group'></div></div></div><div class='col-sm-6 inputjudulgambar'><input type='text' placeholder='Judul Gambar' class='form-control inputform' id='langkah'></div></div></div></div><div class='form-group'><input type='button' class='pull-right col-sm-2 btn tambahgambar' onclick='"+addig+"'></div>";
                    document.getElementById(divName).appendChild(newdiv);
                    document.getElementById('countStep').setAttribute('value', countStep);
                }
                function addInputGambar(divName){
                    var newdiv = document.createElement('div');
                    var str = divName.substr(divName.indexOf('r')+1);
                    var cl = str.substr(0,str.indexOf('-'));
                    var currentlangkah=parseInt(cl);
                    newdiv.className= 'row tambahangambar';
                    countergambar[currentlangkah]++;
                    newdiv.innerHTML = "<div class='col-sm-3'></div> <div class='col-sm-2'><div class='form-group'><img class='img-upload2' id='img-upload"+currentlangkah + "-" + countergambar[currentlangkah]+ "' src='img/DISPLAY%20PICTURE_2.png'/><div class='input-group2 input-group" + currentlangkah + "-" + countergambar[currentlangkah] + "'><div class='input-group-btn'><div class='btn-file2 btn btn-file"+currentlangkah+"-"+countergambar[currentlangkah]+"'><img class='pilihfoto' src='img/pilih%20gambar.png'><input type='file' id='imgInp"+currentlangkah+"-"+countergambar[currentlangkah]+"'onClick='getId(this.id)'></div><input type='text' class='hidden form-control' readonly></div></div><div class='input-group'></div></div></div><div class='col-sm-6 inputjudulgambar'><input type='text' placeholder='Judul Gambar' class='form-control inputform' id='langkah'></div>";
                    document.getElementById(divName).appendChild(newdiv);
                    document.getElementById('countGambarperLangkah').setAttribute('value', currentlangkah+"-"+countergambar[currentlangkah]);
                }
                var divbtn;
                var imginp;
                var counterlangkahused;
                var countergambarused;
                function getId(clicked_id){
//                    alert(clicked_id);
                    var str = clicked_id.substr(clicked_id.indexOf('p')+1);
                    counterlangkahused = str.substr(0,str.indexOf('-'));
                    countergambarused = str.substr(str.indexOf('-')+1);
//                    alert (counterlangkahused + " "+countergambarused);
                    divbtn = '.btn-file' + counterlangkahused + '-' + countergambarused+' :file';
//                    alert(divbtn);
                    imginp = '#imgInp'+counterlangkahused+'-'+countergambarused;
                    $(document).ready( function() {
                    $(document).on('change', divbtn, function() {
                        var input = $(this),
                            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                        input.trigger('fileselect', [label]);
                    });
                    $(document).on('fileselect', divbtn, function(event, label) {
                        var inputgroup='.input-group'+counterlangkahused+'-'+countergambarused;
                        var input = $(this).parents(inputgroup).find(':text'),
                            log = label;   
                        if( input.length ) {
                            input.val(log);
                        } else {
                            if( log ) alert(log);
                        }
                        
                    });
                   
                    function readURL2(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function (e) {
                                var imgupload='#img-upload'+counterlangkahused+'-'+countergambarused;
                                $(imgupload).attr('src', e.target.result);
                            }
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                    $(imginp).change(function(){
                        readURL2(this);
                    });
                });
                }
            </script>
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
                                <img class="maskot-oke col-sm-4" src="img/1.png">
                                <div class="col-sm-8">
                                    <span class="col-sm-9 nopadding">Ayo daftarkan dirimu dan dapatkan info-info terbaru dan terbaik di email kamu.</span>
                                    <div class="row">
                                        <input type="text" class="col-sm-1 form-control input-sm emailsignup" placeholder="Masukan email" />
                                        <div class="col-sm-4 nopadding"><a href="#"><img class="img-responsive emailsignupbutton" src="img/BAR-08.png"></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <h4>Mobile</h4>
                            <div class="fontfooter">
                                <a href="#" class="afooter">Unduh Aplikasinya !</a>
                                <br> <br>
                                <a href="#" class="afooter">Android   &emsp; &ensp; &gt;</a>
                                <br>
                                <a href="#" class="afooter">iOS     &emsp;&emsp;&ensp;&nbsp;&emsp;    &gt;</a>
                                <br>
                                <a href="#" class="afooter">Windows &emsp; &gt;</a>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <h4>Tentang Kami</h4>
                            <div class="fontfooter">
                                <a href="#" class="afooter">Siapa kami ?</a>
                                <br> <br>
                                <a href="#" class="afooter">Kontak &emsp;&emsp;&nbsp;&gt;</a>
                                <br>
                                <a href="#" class="afooter">Pekerjaan &emsp;&gt;</a>
                                <br>
                                <a href="#" class="afooter">Bantuan &emsp;&ensp;&gt;</a>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <h4>Temukan Kami</h4>
                            <div class="fontfooter">
                                <br> <br>
                                <a href="#" class="afooter">Facebook &emsp;&ensp;&gt;</a>
                                <br>
                                <a href="#" class="afooter">Instagram &emsp;&gt;</a>
                                <br>
                                <a href="#" class="afooter">Youtube &emsp;&emsp;&gt;</a>
                                <br>
                                <a href="#" class="afooter">Twitter &emsp;&emsp;&ensp;&gt;</a>
                                <br>
                                <a href="#" class="afooter">Pinterest &emsp;&ensp;&gt;</a>
                                <br>
                                <a href="#" class="afooter">Google&#43;&emsp;&emsp;&nbsp;&gt;</a>
                            </div>
                        </div>
                    </div>
                    <div class="syarat">
                        <a href="#" class="afooter">Syarat dan Ketentuan</a> | <a href="#" class="afooter">Kebijakan Privasi</a>
                    </div>
                    <div class="copyright">
                        <span class="tahun">2016</span>
                        <span class="ngebuatcom">Ngebuat.com</span>
                    </div>
                </div>
            </div>
        </footer>
        <script type="text/javascript">
                                            $(document).ready(function() {
                                                var count = 0;
                                                $('input[type=radio][name="star"]').click(function(){
                                                    if($('input[type=radio][name="star"].star-1').is(':checked'))
                                                    {
                                                        count=1;
                                                    }
                                                    if($('input[type=radio][name="star"].star-2').is(':checked'))
                                                    {
                                                        count=2;
                                                    }
                                                    if($('input[type=radio][name="star"].star-2').is(':checked'))
                                                    {
                                                        count=2;
                                                    }
                                                    if($('input[type=radio][name="star"].star-3').is(':checked'))
                                                    {
                                                        count=3;
                                                    }
                                                    if($('input[type=radio][name="star"].star-4').is(':checked'))
                                                    {
                                                        count=4;
                                                    }
                                                    if($('input[type=radio][name="star"].star-5').is(':checked'))
                                                    {
                                                        count=5;
                                                    }
                                                    document.getElementById('level').setAttribute('value', count);
                                                });
                                            });
        </script>
<!-- 	<form action="{{ route('addProduct') }}" method="POST" enctype="multipart/form-data">
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
			Gambar : <input type="file" name="step1"> {{ $errors->first('step1') }} <br><br>
		</div>
		<br>
		<button type="button" onClick="addColumnStep();">add kolom</button>
		<br><br>
		<input type="hidden" id="countAlat" name="countAlat" value='1'>
		<input type="hidden" id="countBahan" name="countBahan" value='1'>
		<input type="hidden" id="countStep" name="countStep" value='1'>
		<input type="hidden" name="_token" value="{{ Session::token() }}">
		<input type="submit">
	</form>	 -->
	</div>
</body>
</html>

<!-- <script type="text/javascript">
	function addColumnAlat(){
		++countAlat;
		var newcontent = "<input type=\"text\" name=\"alat" + countAlat + "\"><br><br> {{ $errors->first('alat" + countAlat + "') }}";
		document.getElementById('alat').innerHTML += newcontent;
		
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
</script> -->