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
    //
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
			'Label' => 'alpha_num|max:50',
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
		$file = $request->file("Picture");
		$filename = $product->id . ".jpg";
		if($file != null){
			$file->move('img//product', $filename);
			$product->picture = "img//product//" . $filename;
		}
		$product->save();
		
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

    public function home(){
	    $product_new		= DB::table('products')
	                		->orderBy('id', 'desc')
	               			->limit(6)
	               			->get();
	   	$product_popular  	= DB::table('products')
	   					 	->orderBy('likes', 'desc')
               			 	->limit(4)
               			 	->get();
    	return View('home')->with(array('product_new' => $product_new, 'product_popular' => $product_popular));
    }
}
