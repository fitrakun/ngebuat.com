<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <link rel="stylesheet" href="{{asset('css/media.css')}}">
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <meta name="description" content="Home Page">
        <title> SignUp - Ngebuat.com</title>
    </head>
<body>
	<div class="container-fluid indexbody">
            <nav class="navigation row">
                    <div class="col-md-2 col-xs-2 space"></div>
                    <div class="col-md-2 col-xs-3 nopadding">
                        <input type="text" class="form-control input-sm searchtutorial" placeholder="Ayo cari tutorialnya" />
                    </div>
                    <div class="col-md-1 nopadding"><a href="#"><img class="img-responsive searchbutton btn-navbar" src="{{asset('img/BAR-04.png')}}"></a></div>
                    <div class="col-md-1 nopadding"><a href="#"><img class="img-responsive bantuanbutton btn-navbar" src="{{asset('img/BAR-05.png')}}"></a></div>
                    <div class="col-md-1 nopadding"><a href="#"><img class="img-responsive bagikanbutton btn-navbar" src="{{asset('img/BAR-06.png')}}"></a></div>
                    <div class="col-md-1 nopadding"><a href="daftar.html"><img class="img-responsive daftarbutton btn-navbar" src="{{asset('img/BAR-07.png')}}"></a></div>
                    <div class="col-md-1 nopadding"><a href="#"><img class="img-responsive masukbutton btn-navbar" src="{{asset('img/BAR-08.png')}}"></a></div>
            </nav>
            <div class="containerdaftar center-block">
                <img class="img-responsive signupform" src="img/Ceritakami-01.png">
                <!-- <a href="#"><img class="im-responsive fbbutton" src="img/Gabung-02.png"></a>
                <a href="#"><img class="im-responsive twitterbutton" src="img/Gabung-03.png"></a> -->
                <div class="inputsignup whitebackground">
                    <form action="{{ route('signup')}}" method="POST" class="col-md-6">
                        <input class="signupinput" type="email" class="form-control" id="email" name="Email" placeholder="Masukkan email">
                        <div class="error">{{ $errors->first('Email') }}</div>
                        <input class="signupinput" type="text" class="form-control" id="nama" name="Username" placeholder="Nama">
                        <div class="error"> {{ $errors->first('Username') }}</div>
                        <input class="signupinput" type="password" class="form-control" id="password" name="Password" placeholder="Password">
                        <div class="error"> {{ $errors->first('Password') }}</div>
                        <input class="signupinput" type="password" name="Password_confirmation" placeholder="Confirm Password">
                        <input class="submitpicture1" type="image" name="submit" src="{{asset('img/Gabung-04.png')}}"" border="0" alt="Submit">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                </div>
                <div class="masuk">Sudah menjadi anggota?<a class="masukcolor" href="#"> Masuk</a></div>
            </div>
	<!-- <form action="{{ route('signup') }}" method="POST">
		Nama tampilan : <input type="text" name="Username"> {{ $errors->first('Username') }}
		<br><br>
		email : <input type="text" name="Email">{{ $errors->first('Email') }}
		<br><br>
		password : <input type="password" name="Password"> {{ $errors->first('Password') }}
		<br><br>
		confirm password : <input type="password" name="Password_confirmation">
		<br><br>
		<input type="hidden" name="_token" value="{{ Session::token() }}">
		<input type="submit">
	</form> -->
	</div>
</body>
</html>
