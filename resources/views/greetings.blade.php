<html>
<head>
	<title></title>
</head>
<body>
	Hello {{ $nama }}!
	<img src="{{ $img }}" width=100 height=100>
	<br><br><br>
	fitur yang uda = <br>
	signup 	--> /signup
	<br>
	confirmation --> /confirmation/"tokennya liat di database"
	<br>
	login --> /login
	<br>
	home --> /home
	<br>
	Tambahkan karya --> /addProduct
	<br><br>
	Attention<br>
	Add productnya uda bisa banyak foto per langkah cuma front-endnya belum bisa nambah otomatis <br>
	jadi harus dibikin static<br>
	buat sementara gw bikin 3 langkah dulu, langkah 1 ad 3 gambar, langkah 2 ada 2 gambar, langkah 3 ada 4 gambar<br>
	ini cuma buat testing doang kalo productnya uda bisa 1 langkah banyak foto<br>
	<br><br>
	**buat fitra<br>
	penamaan addProduct frontendnya --> <br>
	alat --> alat1 (alat pertama), alat2 (alat kedua), alat3 (alat ketiga) dst<br>
	bahan --> bahan1(bahan pertama), bahan2 (bahan kedua), bahan3 (bahan ketiga), dst <br>
	langkah --> judulstep1 (judul langkah pertama), judulstep2 (judul langkah kedua), judulstep3 (judul langkah ketiga)<br>
	langkah --> descstep1 (deskripsi langkah pertama), descstep2 (deskripsi langkah kedua), descstep3 (deskripsi langkah ketiga)<br>
	langkah --> step1-1 (foto pertama langkah pertama), step1-2 (foto kedua langkah pertama), step 3-5 (foto kelima langkah ketiga)<br>
	jadi step'i'-'j' dimana i itu nomor langkah dan j nomor fotonya<br><br>
	<br>
	edit profile --> /editProfile
	<br>
	change password	--> changePassword
	<br>
	logout --> /logout
	<br>
	search --> /home
	<br>
	filter by kategori --> home/"kategorinya"
	<br>
	Lihat karya	
	<br>
	like --> showProduct/"id_produknya"
	<br> 
	komen --> showProduct/"id_produknya"
	<br>
	send email --> pas sign up uda otomatis
	<br>
	share fb --> showProduct/"id_produknya"
	<br>
	your profile -> profile/"username yang dicari"
	<br>
	<br><br><br>
	------------------------------------
	<br><br><br>

	fitur yang belom =<br>
	subkomen
	<br>
	editproduct
	<br>
	subscribe
	<br>
	admin page
</body>
</html>