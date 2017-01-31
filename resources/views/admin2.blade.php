<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<script>
	var toggle="name";
</script>
Sorted by : <button type="button" onClick="toggleSort();" id="toggle">name</button><br><br>
<div id="pdate" style="display:none">
	@foreach($products_date as $product)
		{{$product->nama}}<br><br>
		like : {{$product->likes}}<br><br>
		view : {{$product->views}}<br><br>
		comment : {{$product->comments}}<br><br>
		<a href="../deleteProduct/{{$product->id}}">delete Product</a><br><br>
		<a href="../verifyProduct/{{$product->id}}">verify Product</a><br><br>
		<a href="../editProduct/{{$product->id}}">edit Product</a><br><br>
		<a href="../showProduct/{{$product->id}}">show Product</a><br><br>
		-------------------------------------------------------------------------------<br><br>
	@endforeach
</div>

<div id="pview" style="display:none">
	@foreach($products_view as $product)
		{{$product->nama}}<br><br>
		like : {{$product->likes}}<br><br>
		view : {{$product->views}}<br><br>
		comment : {{$product->comments}}<br><br>
		<a href="../deleteProduct/{{$product->id}}">delete Product</a><br><br>
		<a href="../verifyProduct/{{$product->id}}">verify Product</a><br><br>
		<a href="../editProduct/{{$product->id}}">edit Product</a><br><br>
		<a href="../showProduct/{{$product->id}}">show Product</a><br><br>
		-------------------------------------------------------------------------------<br><br>
	@endforeach
</div>

<div id="pcomment" style="display:none">
	@foreach($products_comment as $product)
		{{$product->nama}}<br><br>
		like : {{$product->likes}}<br><br>
		view : {{$product->views}}<br><br>
		comment : {{$product->comments}}<br><br>
		<a href="../deleteProduct/{{$product->id}}">delete Product</a><br><br>
		<a href="../verifyProduct/{{$product->id}}">verify Product</a><br><br>
		<a href="../editProduct/{{$product->id}}">edit Product</a><br><br>
		<a href="../showProduct/{{$product->id}}">show Product</a><br><br>
		-------------------------------------------------------------------------------<br><br>
	@endforeach
</div>

<div id="plike" style="display:none">
	@foreach($products_like as $product)
		{{$product->nama}}<br><br>
		like : {{$product->likes}}<br><br>
		view : {{$product->views}}<br><br>
		comment : {{$product->comments}}<br><br>
		<a href="../deleteProduct/{{$product->id}}">delete Product</a><br><br>
		<a href="../verifyProduct/{{$product->id}}">verify Product</a><br><br>
		<a href="../editProduct/{{$product->id}}">edit Product</a><br><br>
		<a href="../showProduct/{{$product->id}}">show Product</a><br><br>
		-------------------------------------------------------------------------------<br><br>
	@endforeach
</div>

<div id="pname">
	@foreach($products_name as $product)
		{{$product->nama}}<br><br>
		like : {{$product->likes}}<br><br>
		view : {{$product->views}}<br><br>
		comment : {{$product->comments}}<br><br>
		<a href="../deleteProduct/{{$product->id}}">delete Product</a><br><br>
		<a href="../verifyProduct/{{$product->id}}">verify Product</a><br><br>
		<a href="../editProduct/{{$product->id}}">edit Product</a><br><br>
		<a href="../showProduct/{{$product->id}}">show Product</a><br><br>
		-------------------------------------------------------------------------------<br><br>
	@endforeach
</div>
<script type="text/javascript">
	function toggleSort(){
		if(toggle=="name"){
			document.getElementById("pdate").style.display = "block";
			document.getElementById("pname").style.display = "none";
			document.getElementById("toggle").innerHTML = "date";
			toggle = "date";
		}
		else if(toggle=="date"){
			document.getElementById("pview").style.display = "block";
			document.getElementById("pdate").style.display = "none";
			document.getElementById("toggle").innerHTML = "view";
			toggle = "view";
		}
		else if(toggle=="view"){
			document.getElementById("pcomment").style.display = "block";
			document.getElementById("pview").style.display = "none";
			document.getElementById("toggle").innerHTML = "comment";
			toggle = "comment";
		}
		else if(toggle=="comment"){
			document.getElementById("plike").style.display = "block";
			document.getElementById("pcomment").style.display = "none";
			document.getElementById("toggle").innerHTML = "like";
			toggle = "like";
		}
		else{
			document.getElementById("plike").style.display = "none";
			document.getElementById("pname").style.display = "block";
			document.getElementById("toggle").innerHTML = "name";
			toggle = "name";
		}
		return true;
	}
</script>
</body>
</html>