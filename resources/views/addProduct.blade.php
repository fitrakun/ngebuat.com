<html>
<head>
	<title></title>
</head>
<body>
	<script>
		var countAlat = 1;
		var countBahan = 1;
		var countStep = 1;
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
	</form>	
</body>
</html>

<script type="text/javascript">
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
</script>