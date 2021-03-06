<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use File;
use App\Step;
use App\Tool;
use App\Material;
use App\Label;
use App\StepPicture;
use App\Like;
use App\Slide;
use App\Comment;
use App\SubComment;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as image;

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
    	if(Auth::check()){
	    	//validasi input dari form
	    	$this->validate($request, [
	    		'Name' => 'regex:/^[a-z\d\-_\s]+$/i|max:20|required',
				'Label' => 'regex:/^[a-z\d\-_\s\;]+$/i|max:200|required',
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
				$this->validate($request, [
		    		$temp => 'regex:/^[a-z\d\-_\s]+$/i|max:50|required',
		    		$temp2 => 'regex:/^[a-z\d\-_\s]+$/i|max:1000|required'
				]);
				$j=1;
				while($j<=10){
					$temp3 = "step" . $i . "-" . $j;
					$temp4 = "judulstep" . $i . "-" . $j;
					$file = $request->file($temp3);
					if($file != null){
						$this->validate($request, [
				    		$temp3 => 'image',
				    		$temp4 => 'regex:/^[a-z\d\-_\s]+$/i|max:100'
						]);
					}
					$j++;
				}
			}

			//add tabel product
	    	$user = $request->user();

	    	$product = new Product();
	    	$product->nama = $request["Name"];
	    	$product->kesulitan = $request["Level"];
	    	$product->harga = $request["Price"];
	    	$product->kategori = $request["Category"];
	    	$product->label = $request["Label"];
	    	$product->penjelasan = $request["Desc"];
	    	$product->username_pembuat = $user->username;
	    	$product->created_at = Carbon::now('Asia/Jakarta')->format('d-m-y-H:i:s');
	    	$product->picture = "temporary";
	    	$product->save();
			$file = $request->file("Picture");
			$filename = $product->id . ".jpg";
			if($file != null){
				$path = 'img//product//'. $filename;
	            		Image::make($file)->resize(600, 400)->save($path, 60);
			
				//$file->move('img//product', $filename);
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
				$langkah->order = $i;
				$langkah->save();

				$j=1;
				$k=1;
				while($j<=10){
					$stepPic = new StepPicture();
					$temp = "step" . $i . "-" . $j;
					$temp2 = "judulstep" . $i . "-" . $j;
					$file = $request->file($temp);
					$filename = $product->id . '-' . $i . '-' . $k . ".jpg";
					if($file != null){
						$path = 'img//product//'. $filename;
	            				Image::make($file)->resize(600, 400)->save($path, 60);
						//$file->move('img//product', $filename);
						$stepPic->step_id = $langkah->id;
						$stepPic->judul = $request[$temp2];
						$stepPic->picture = "img//product//" . $filename;
						$stepPic->order = $k;
						$stepPic->save();
						$k++;
					}
					$j++;
				}
			}
	    	return redirect('/dashboard');
	    }
    }

    public function viewEditProduct($id, Request $request){
    	if(Auth::check()){
			$data = [];
			$data['product'] = Product::where('id', $id)->first();
			if(Auth::user()->username==$data['product']->username_pembuat or Auth::user()->isAdmin==1){
				$data['tools'] = Tool::where('product_id', $id)->get();
				$data['materials'] = Material::where('product_id', $id)->get();
				$data['steps'] = Step::where('product_id', $id)->get();
				$data['productCtrl'] = new ProductController();
				$request->session()->put('id_produk', $id);
				return View('editproduct', $data);
			}
			else{
				return redirect('/home');
			}
    	}
    	else{
    		$request->session()->put('msg', 'Harap signin terlebih dahulu');
    		return redirect('/login');
    	}
    }

    public function editProduct(Request $request){
    	if(Auth::check()){
			//validasi input dari form
	    	$this->validate($request, [
	    		'Name' => 'regex:/^[a-z\d\-_\s]+$/i|max:20|required',
				'Label' => 'regex:/^[a-z\d\-_\s\;]+$/i|max:200',
				'Level' => 'required|numeric|max:5|min:1',
				'Price' => 'required|numeric',
				'Category' => 'required|alpha',
				'Desc' => 'required|max:200',
				'Picture' => 'image'
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
				$this->validate($request, [
		    		$temp => 'regex:/^[a-z\d\-_\s]+$/i|max:50|required',
		    		$temp2 => 'regex:/^[a-z\d\-_\s]+$/i|max:1000|required'
				]);
				$j=1;
				while($j<=10){
					$temp3 = "step" . $i . "-" . $j;
					$temp4 = "judulstep" . $i . "-" . $j;
					$file = $request->file($temp3);
					if($file != null){
						$this->validate($request, [
				    		$temp3 => 'image',
				    		$temp4 => 'regex:/^[a-z\d\-_\s]+$/i|max:100'
						]);
					}
					$j++;
				}
			}
			$id = $request->session()->get('id_produk');
			$product = Product::where('id', $id)->first();
			if($product==NULL){
				return redirect('/dashboard');
			}
			else{
				$product->nama = $request["Name"];
			    	$product->kesulitan = $request["Level"];
			    	$product->harga = $request["Price"];
			    	$product->kategori = $request["Category"];
			    	$product->label = $request["Label"];
			    	$product->penjelasan = $request["Desc"];
				$file = $request->file("Picture");
				$filename = $product->id . ".jpg";
				if($file != null){
					$path = 'img//product//'. $filename;
            		Image::make($file)->resize(600, 400)->save($path, 60);
					//$file->move('img//product', $filename);
					$product->picture = "img//product//" . $filename;
				}
				$product->save();

				//add tabel label
				$arr = $this->splitLabel($request["Label"]);
				$labels = Label::where('product_id', $id)->get();
				$i = 1;
				$j = 0;
				foreach($labels as $label){
					if($j>=count($arr)){
						$label->delete();
					}
					else{
						$label->nama = $arr[$j];
						$label->save();	
					}
					$j++;
				}
				if($j<count($arr)){
					for($j; $j<count($arr); $j++){
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
				}
						
				//add tabel alat
				$tools = Tool::where('product_id', $id)->get();
				$i = 1;
				foreach($tools as $tool){
					$temp = "alat" . $i;
					if($request[$temp]==NULL){
						$tool->delete();
					}
					else{
						$tool->nama = $request[$temp];
						$tool->save();	
					}
					$i++;
				}
				if($i<=$countAlat){
					for($i; $i<=$countAlat; $i++){
						$alat = new Tool();
						$alat->product_id = $product->id;
						$temp = "alat" . $i;
						$alat->nama = $request[$temp];
						$alat->save();
					}
				}

				//add tabel bahan
				$materials = Material::where('product_id', $id)->get();
				$i = 1;
				foreach($materials as $material){
					$temp = "bahan" . $i;
					if($request[$temp]==NULL){
						$material->delete();
					}
					else{
						$material->nama = $request[$temp];
						$material->save();
					}
					$i++;
				}
				if($i<=$countBahan){
					for($i; $i<=$countBahan; $i++){
						$bahan = new Material();
						$bahan->product_id = $product->id;
						$temp = "bahan" . $i;
						$bahan->nama = $request[$temp];
						$bahan->save();
					}
				}

				//add tabel langkah
				$steps = Step::where('product_id', $id)->get();
				$i = 1;
				foreach($steps as $step){
					$temp = "judulstep" . $i;
					$temp2 = "descstep" . $i;
					if($request[$temp]==NULL){
						$step->delete();
						$arr = StepPicture::where('step_id',$step->id)->get();
						foreach($arr as $pict){
							$pict->delete();
						}
					}
					else{
						$step->judul = $request[$temp];
						$step->penjelasan = $request[$temp2];
						$step->save();
						$arr = StepPicture::where('step_id',$step->id)
							->orderBy('order')->get();		
						$j = 1;
						foreach($arr as $pict){
							$temp = "step" . $i . '-' . $j;
							$temp2 = "judulstep" . $i . "-" . $j;
							$pict->judul = $request[$temp2];
							$file = $request->file($temp);
							$filename = $pict->picture;
							if($file != null){
								$path = $filename;
					            		Image::make($file)->resize(600, 400)->save($path, 60);
								//$file->move('img//product', $filename);
							}
							$pict->save();
							$j++;
						}
						$k = $j;
						if($j<=10){
							while($j<=10){
								$stepPic = new StepPicture();
								$temp = "step" . $i . "-" . $j;
								$temp2 = "judulstep" . $i . "-" . $j;
								$file = $request->file($temp);
								$filename = $product->id . '-' . $i . '-' . $k . ".jpg";
								if($file != null){
									$path = 'img//product//'. $filename;
						            		Image::make($file)->resize(200, 200)->save($path, 60);
									//$file->move('img//product', $filename);
									$stepPic->step_id = $step->id;
									$stepPic->judul = $request[$temp2];
									$stepPic->picture = "img//product//" . $filename;
									$stepPic->order = $k;
									$stepPic->save();
									$k++;
								}
								$j++;
							}
						}
					}
					$i++;
				}
				if($i<=$countLangkah){
					for($i; $i<=$countLangkah; $i++){
						$step = new Step();
						$step->product_id = $product->id;
						$temp = "judulstep" . $i;
						$temp2 = "descstep" . $i;
						$step->judul = $request[$temp];
						$step->penjelasan = $request[$temp2];
						$step->order = $i;
						$step->save();
					}
				}
			}
			return redirect('/home');
    	}
    }

    public function showProduct($id, Request $request){
		$product = Product::where('id', $id)->first();
		if($product==NULL){
			return redirect('/dashboard');
		}
		else{
			$user = User::where('username', $product->username_pembuat)->first();
			$product_other = Product::where('username_pembuat', $user->username)
							->whereNotIn('id', [$id])
							->take(3)
							->inRandomOrder()
							->get();
			$product_related = collect();
			$arrLabel = $this->splitLabel($product->label);
			foreach($arrLabel as $label){
				$result = $this->searchProduct("all", $label);
				$product_related = $product_related->merge($result)->unique();
			}
			foreach ($product_related as $key => $value) {
		      if ($product_related[$key]->product_id == $product->id) {
	          	$product_related->forget($key);
		      }
			}
			if($product_related->count()>3){
				$product_related = $product_related->random(3);
			}
			$product->views++;
			$product->save();
			$tools = Tool::where('product_id', $id)->get();
			$materials = Material::where('product_id', $id)->get();
			$steps = Step::where('product_id', $id)->get();
			if(Auth::check()){
				$user = $request->user();	
				$likes = Like::where('username', $user->username)
	    				->where('product_id', $id)
	    				->first();
	    		if($likes==NULL){
	    			$like = "like";
	    		}
	    		else{
	    			$like = "liked";
	    		}
			}
			else{
				$like = NULL;
			}
			$comments = Comment::where('product_id', $id)->get();
			$request->session()->put('id_produk', $id);
			$request->session()->put('creator_produk', $product->username_pembuat);
			return View('product')->with(array('product' => $product, 'tools' => $tools, 'materials' => $materials, 
				'steps' => $steps, 'labels' => $arrLabel, 'productCtrl' => new ProductController, 'pembuat_produk' => $user,
				'product_other' => $product_other, 'product_related' => $product_related, 'like' => $like,
				'comments' => $comments));
		}
    }

    public function getStepPictures($id){
    	$arr = StepPicture::where('step_id',$id)->get();
    	return $arr;
    }

    public function getSubComment($id){
    	$arr = SubComment::where('comment_id',$id)->get();
    	return $arr;
    }

    private function searchProduct($kategori, $search){
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
    	return $search_result;
    }

    public function home($kategori = NULL, $search = NULL){
    	$search = NULL;
    	$search_result = $this->searchProduct($kategori, $search);
	    $product_new		= DB::table('products')
	                		->orderBy('id', 'desc')
	               			->limit(6)
	               			->get();
	   	$product_popular  	= DB::table('products')
	   					 	->orderBy('likes', 'desc')
               			 	->limit(4)
               			 	->get();
        $slides = Slide::get();
    	return View('home')->with(array('product_new' => $product_new, 'product_popular' => $product_popular, 'search_result' => $search_result, 'slides' => $slides));
    }

    public function allPopular(){
    	$product_popular  	= DB::table('products')
	   					 	->orderBy('likes', 'desc')
               			 	->get();
        return View('all')->with(array('products' => $product_popular));
    }

    public function allNew(){
    	$product_new		= DB::table('products')
	                		->orderBy('id', 'desc')
	               			->get();
        return View('all')->with(array('products' => $product_new));
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
    	else if($kategori==NULL){
    		$kategori = "all";
    	}
    	return redirect('/search/'.$kategori.'/'.$nama);
    }
    
    public function filterCategory($kategori){
	$search = NULL;
    	$search_result = $this->searchProduct($kategori, $search);
    	return View('filterCategory')->with(array('search_query' => $kategori,'search_result' => $search_result));
    }
    
    public function viewSearchResult($kategori = NULL, $search = NULL){
    	$search_result = $this->searchProduct($kategori, $search);
    	return View('searchResult')->with(array('search_query' => $search, 'search_result' => $search_result));
    }

    public function like(Request $request){
    	$id = $request["id"];
    	if(Auth::check()){
    		$user = $request->user();
    		$product = Product::where('id', $id)->first();
    		if($product==NULL){
				return redirect('/dashboard');
			}
    		else{
	    		$likes = Like::where('username', $user->username)
	    				->where('product_id', $id)
	    				->first();
	    		if($likes==NULL){
	    			$like = new Like();
	    			$like->username = $user->username;
	    			$like->product_id = $id;
	    			$like->save();
	    			
	    			$product->likes++;
	    			$product->save();
	    			return [
	    				'status' => "success",
	    				'button' => 'liked',
	    				'value' => $product->likes
			        ];
	    		}
	    		else{
	    			DB::table('likes')->where('username', $user->username)->where('product_id', $id)->delete();

	    			$product->likes--;
	    			$product->save();
	    			return [
			            'status' => "success",
	    				'button' => 'like',
	    				'value' => $product->likes
			        ];
	    		}
    		}
    	}
    	else{
    		return [
	            'status' => "failed",
	        ];
    	}
    }

	public function addSubComment(request $request){
    	if(Auth::check()){
    		$this->validate($request, [
	    		'BodySCmt' => 'max:500|required',
	    		'cId' => 'numeric'
			]);

    		$user = $request->user();
    		$comment = new subComment();
    		$comment->username = $user->username;
    		$comment->picture_user = $user->picture;
    		$comment->body = $request["BodySCmt"];
    		$comment->created_at = Carbon::now('Asia/Jakarta')->format('d-m-y-H:i:s');
    		$comment->username_pembuat_produk = $request->session()->get('creator_produk');
    		$comment->comment_id = $request["cId"];
    		$comment->save();

			return redirect("/showProduct/". $request->session()->get('id_produk'));
    	}
    	else{
    		return redirect("/login");
    	}
    }

    public function addComment(request $request){
    	if(Auth::check()){
    		$this->validate($request, [
	    		'BodyCmt' => 'max:500|required',
				'PictureCmt' => 'image',
			]);

    		$user = $request->user();
    		$comment = new Comment();
    		$comment->username = $user->username;
    		$comment->picture_user = $user->picture;
    		$comment->body = $request["BodyCmt"];
    		$comment->created_at = Carbon::now('Asia/Jakarta')->format('d-m-y-H:i:s');
    		$comment->username_pembuat_produk = $request->session()->get('creator_produk');
    		$comment->product_id = $request->session()->get('id_produk');
    		$product = Product::where("id", $request->session()->get('id_produk'))->first();
    		$product->comments++;
    		$product->save();
    		$comment->save();

    		$file = $request->file("PictureCmt");
			$filename = $comment->id . ".jpg";
			if($file != null){
				$path = 'img//comment//'. $filename;
	            		Image::make($file)->resize(600, 400)->save($path, 60);
				//$file->move('img//comment', $filename);
				$comment->picture = "img//comment//" . $filename;
			}
			$comment->save();

			return redirect("/showProduct/". $request->session()->get('id_produk'));
    	}
    	else{
    		return redirect("/login");
    	}
    }

    public function deleteProduct($id, Request $request){
    	if(Auth::check()){
			if(Auth::user()->isAdmin==1){
				$tools = Tool::where('product_id', $id)->get();
				foreach($tools as $tool){
					$tool->delete();
				}
				$materials = Material::where('product_id', $id)->get();
				foreach($materials as $material){
					$material->delete();
				}
				$steps = Step::where('product_id', $id)->get();
				foreach($steps as $step){
					$picts = StepPicture::where('step_id', $step->id)->get();
					foreach($picts as $p){
						File::delete($p->picture);
						$p->delete();
					}
					$step->delete();
				}
				$comments = Comment::where('product_id', $id)->get();
				foreach($comments as $comment){
					$subcs = SubComment::where('comment_id', $comment->id)->get();
					foreach($subcs as $sc){
						$sc->delete();
					}
					if($comment->picture!=NULL){
						File::delete($comment->picture);
					}
					$comment->delete();
				}
				$labels = Label::where('product_id', $id)->get();
				foreach($labels as $label){
					$label->delete();
				}
				$likes = Like::where('product_id', $id)->get();
				foreach($likes as $like){
					$like->delete();
				}
				$product = Product::where('id', $id)->first();
				File::delete($product->picture);
				$product->delete();
				return redirect('/admin2');
			}
			else{
				return redirect('/home');
			}
    	}
    	else{
    		$request->session()->put('msg', 'Harap signin terlebih dahulu');
    		return redirect('/login');
    	}
    }

    public function verifyProduct($id, Request $request){
    	if(Auth::check()){
			if(Auth::user()->isAdmin==1){
				$product = Product::where('id', $id)->first();
				$product->isVerified=1;
				$product->save();
				return redirect('/admin2');
			}
			else{
				return redirect('/home');
			}
    	}
    	else{
    		$request->session()->put('msg', 'Harap signin terlebih dahulu');
    		return redirect('/login');
    	}
    }

    public function substractDate($date){
    	$date = Carbon::createFromFormat('d-m-y-H:i:s', $date, 'Asia/Jakarta');
    	$now = Carbon::now('Asia/Jakarta');
    	$str = $date->diffForHumans($now);
    	$str = str_replace("seconds","detik",$str);
    	$str = str_replace("second","detik",$str);
    	$str = str_replace("minutes","menit",$str);
    	$str = str_replace("minute","menit",$str);    	
    	$str = str_replace("hours","jam",$str);
    	$str = str_replace("hour","jam",$str);
    	$str = str_replace("days","hari",$str);
    	$str = str_replace("day","hari",$str);
    	$str = str_replace("months","bulan",$str);
    	$str = str_replace("month","bulan",$str);
    	$str = str_replace("years","tahun",$str);
    	$str = str_replace("year","tahun",$str);
    	$str = str_replace("before","yang lalu",$str);
    	return $str;
    }
}
