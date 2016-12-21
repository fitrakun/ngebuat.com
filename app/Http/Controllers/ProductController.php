<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use App\Step;
use App\Tool;
use App\Material;
use App\Label;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
	private static function splitLabel($str){
		$temp = "";
		$j = 0;
		for($i=0; $i<strlen($str); $i++){
			if($str[$i]==';'){
				$temp = trim($temp);
				$arr[$j] = $temp;
				$j++;
				$temp = "";
			}
			else{
				$temp .= $str[$i];
			}
		}
		if($temp!=""){
			$temp = trim($temp);
			$arr[$j] = $temp;
			$j++;
			$temp = "";
		}
		return $arr;
	}

	public function viewAddProduct(Request $request){
    	if(Auth::check()){
    		return view('addProduct');
    	}
    	else{
    		$request->session()->put('msg', 'Harap signin terlebih dahulu');
    		return redirect('/login');
    	}
    }

    public function addProduct(Request $request){
    	//validasi input dari form
    	$this->validate($request, [
    		'Name' => 'regex:/^[a-z\d\-_\s]+$/i|max:20|required',
			'Label' => 'regex:/^[a-z\d\-_\s\;]+$/i|max:200',
			'Level' => 'required|numeric|max:5|min:1',
			'Price' => 'required|numeric',
			'Category' => 'required|alpha',
			'Desc' => 'required|max:200',
			'Picture' => 'required|image'
		]);

    	$countAlat = (int) $request["countAlat"];
    	$countBahan = (int) $request["countBahan"];
    	$countLangkah = (int) $request["countStep"];
		
		for($i=1; $i<=$countAlat; $i++){
			$temp = "alat" . $i;
			$this->validate($request, [
	    		$temp => 'regex:/^[a-z\d\-_\s]+$/i|max:50|required',
			]);
		}

		for($i=1; $i<=$countBahan; $i++){
			$temp = "bahan" . $i;
			$this->validate($request, [
	    		$temp => 'regex:/^[a-z\d\-_\s]+$/i|max:50|required',
			]);
		}

		for($i=1; $i<=$countLangkah; $i++){
			$temp = "judulstep" . $i;
			$temp2 = "descstep" . $i;
			$temp3 = "step" . $i;
			$this->validate($request, [
	    		$temp => 'regex:/^[a-z\d\-_\s]+$/i|max:50|required',
	    		$temp2 => 'regex:/^[a-z\d\-_\s]+$/i|max:1000|required',
	    		$temp3 => 'image',
			]);
		}

		//add tabel product
    	$user = $request->user();

    	$product = new Product();
    	$product->nama = $request["Name"];
    	$product->kesulitan = $request["Level"];
    	$product->harga = $request["Price"];
    	$product->kategori = $request["Category"];
    	$product->penjelasan = $request["Desc"];
    	$product->username_pembuat = $user->username;
    	$product->created_at = Carbon::now('Asia/jakarta')->format('d-m-y-H:i:s');
		$file = $request->file("Picture");
		$filename = $product->id . ".jpg";
		if($file != null){
			$file->move('img//product', $filename);
			$product->picture = "img//product//" . $filename;
		}
		$product->save();

		//add tabel label
		$arr = $this->splitLabel($request["Label"]);
		for($j=0; $j<count($arr); $j++){
			$label = new Label();
			$label->nama = $arr[$j];
			$label->product_id = $product->id;
			$label->nama_produk = $product->nama;
			$label->kategori_produk = $product->kategori;
			$label->picture_produk = $product->picture;
			$label->username_pembuat_produk = $product->username_pembuat;
			$label->penghargaan_produk = 0;
			$label->save();
		}

		//add tabel alat
		for($i=1; $i<=$countAlat; $i++){
			$alat = new Tool();
			$alat->product_id = $product->id;
			$temp = "alat" . $i;
			$alat->nama = $request[$temp];
			$alat->save();
		}

		//add tabel bahan
		for($i=1; $i<=$countBahan; $i++){
			$bahan = new Material();
			$bahan->product_id = $product->id;
			$temp = "bahan" . $i;
			$bahan->nama = $request[$temp];
			$bahan->save();
		}

		//add tabel langkah
		for($i=1; $i<=$countLangkah; $i++){
			$langkah = new Step();
			$langkah->product_id = $product->id;
			$temp = "judulstep" . $i;
			$langkah->judul = $request[$temp];
			$temp = "descstep" . $i;
			$langkah->penjelasan = $request[$temp];

			$temp = "step" . $i;
			$file = $request->file($temp);
			$filename = $product->id . '-' . $i . ".jpg";
			if($file != null){
				$file->move('img//product', $filename);
				$langkah->picture = "img//product//" . $filename;
			}
			$langkah->save();
		}
    	return redirect('/dashboard');
    }

    public function showProduct($id){
		$product = Product::where('id', $id)->first();
		if($product==NULL){
			return redirect('/dashboard');
		}
		else{
			$product->views++;
			$product->save();
			$tools = Tool::where('product_id', $id)->get();
			$materials = Material::where('product_id', $id)->get();
			$steps = Step::where('product_id', $id)->get();
			return View('product')->with(array('product' => $product, 'tools' => $tools, 'materials' => $materials, 
				'steps' => $steps));
		}
    }

    public function home($kategori = NULL, $search = NULL){
    	if($kategori==NULL){
    		$search_result = NULL;
    	}
    	else if($kategori=="all"){
    		if($search==NULL){
    			$search_result	= DB::table('products')
		                		->select('id as product_id', 'nama as nama_produk', 'picture as picture_produk',
		                			'username_pembuat as username_pembuat_produk', 'penghargaan as penghargaan_produk')
		               			->distinct()
		               			->get();
	    	}
	    	else{
	    		$result = collect();
	    		$arr = $this->splitLabel($search);
				for($j=0; $j<count($arr); $j++){
					$search_result	= DB::table('products')
			                		->select('id as product_id', 'nama as nama_produk', 'picture as picture_produk',
			                			'username_pembuat as username_pembuat_produk', 'penghargaan as penghargaan_produk')
			                		->where('nama', 'LIKE', '%'.$arr[$j].'%')
			               			->distinct()
			               			->get();
		   			$search_result2	= DB::table('labels')
					        		->select('product_id', 'nama_produk', 'picture_produk',
					        			'username_pembuat_produk', 'penghargaan_produk')
					        		->where('nama', 'LIKE', '%'.$arr[$j].'%')
					       			->distinct()
					       			->get();
					$search_result = $search_result->merge($search_result2)->unique();
					$result = $result->merge($search_result)->unique();
				}
				$search_result = $result;
	    		
	    	}
		}
		else{
			if($search==NULL){
    			$search_result	= DB::table('products')
		                		->select('id as product_id', 'nama as nama_produk', 'picture as picture_produk',
		                			'username_pembuat as username_pembuat_produk', 'penghargaan as penghargaan_produk')
		                		->where('kategori', $kategori)
		               			->distinct()
		               			->get();
	    	}
	    	else{
	    		$result = collect();
	    		$arr = $this->splitLabel($search);
				for($j=0; $j<count($arr); $j++){
					$search_result	= DB::table('products')
			                		->select('id as product_id', 'nama as nama_produk', 'picture as picture_produk',
			                			'username_pembuat as username_pembuat_produk', 'penghargaan as penghargaan_produk')
			                		->where('nama', 'LIKE', '%'.$arr[$j].'%')
			                		->where('kategori', $kategori)
			               			->distinct()
			               			->get();
			        $search_result2	= DB::table('labels')
					        		->select('product_id', 'nama_produk', 'picture_produk',
					        			'username_pembuat_produk', 'penghargaan_produk')
					        		->where('nama', 'LIKE', '%'.$arr[$j].'%')
					        		->where('kategori_produk', $kategori)
					       			->distinct()
					       			->get();
					$search_result = $search_result->merge($search_result2)->unique();
					$result = $result->merge($search_result)->unique();
				}
				$search_result = $result;
			}
	    }
	    $product_new		= DB::table('products')
	                		->orderBy('id', 'desc')
	               			->limit(6)
	               			->get();
	   	$product_popular  	= DB::table('products')
	   					 	->orderBy('likes', 'desc')
               			 	->limit(4)
               			 	->get();
    	return View('home')->with(array('product_new' => $product_new, 'product_popular' => $product_popular, 'search_result' => $search_result));
    }

    public function search(Request $request){
    	//validasi input dari form
    	$this->validate($request, [
    		'Name' => 'regex:/^[a-z\d\-_\s\;]+$/i|max:50',
			'Category' => 'regex:/^[a-z\d\-_\s]+$/i|max:20',
		]);

    	$kategori = $request["Category"];
    	$nama = $request["Name"];
    	if($kategori=="semua produk"){
    		$kategori = "all";
    	}
    	return redirect('/home/'.$kategori.'/'.$nama);
    }
}
