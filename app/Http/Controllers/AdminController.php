<?php

namespace App\Http\Controllers;

use App\User;
use File;
use App\Product;
use App\Subscribe;
use App\Slide;
use DB;
use Mail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as image;

class AdminController extends Controller
{
    //
    public function viewAdminPage(Request $request){
		if(Auth::check()){
    		$user = $request->user();
    		if($user->isAdmin==1){
    			return View('adminpage');
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

    public function adminViewAllProduct(Request $request){
		if(Auth::check()){
			$data = [];
    		$user = $request->user();
    		if($user->isAdmin==1){
    			$data['products_date'] = Product::orderBy('id')->get();
    			$data['products_name'] = Product::orderBy('nama')->get();
    			$data['products_like'] = Product::orderBy('likes', 'desc')->get();
    			$data['products_view'] = Product::orderBy('views', 'desc')->get();
    			$data['products_comment'] = Product::orderBy('comments', 'desc')->get();
    			return View('admin2', $data);
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

    /*public function adminViewAllUser(Request $request){
        if(Auth::check()){
            $data = [];
            $user = $request->user();
            if($user->isAdmin==1){
                $users = 
                $data['user_join'] = DB::table('users')
                                    ->whereNotNull('created_at')
                                    ->orderBy('created_at')
                                    ->get();
                $data['user_kota'] = User::orderBy('kota')->get();
                $data['user_umur'] = User::orderBy('tanggal_lahir')->get();
                return View('admin4', $data);
            }
            else{
                return redirect('/home');   
            }
        }
        else{
            $request->session()->put('msg', 'Harap signin terlebih dahulu');
            return redirect('/login');
        }
    }*/

    public function adminSlideController(Request $request){
        $data = [];
        if(Auth::check()){
            if(Auth::user()->isAdmin==1){
                $data['slides'] = Slide::get();
                return View('admin5', $data);
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

    public function addSlide(Request $request){
        if(Auth::check()){
            if(Auth::user()->isAdmin==1){
                $this->validate($request, [
                    'link' => 'max:50|required',
                    'picture' => 'required|image',
                ]);

                $slide = new Slide();
                $slide->link = $request["link"];
                $slide->save();

                $file = $request->file("picture");
                $filename = $slide->id . ".jpg";
                if($file != null){
                    $path = 'img//slides//'. $filename;
                    Image::make($file)->resize(600, 400)->save($path, 60);
                    $slide->picture = "img//slides//" . $filename;
                }
                $slide->save();
                return redirect("/admin5");
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

    public function deleteSlide($id, Request $request){
        if(Auth::check()){
            if(Auth::user()->isAdmin==1){
                $slide = Slide::where('id', $id)->first();
                File::delete($slide->picture);
                $slide->delete();
                return redirect("/admin5");
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

    public function viewBackgroundController(Request $request){
        if(Auth::check()){
            if(Auth::user()->isAdmin==1){
                return View('admin7');
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

    public function changeBackground(Request $request){
        if(Auth::check()){
            if(Auth::user()->isAdmin==1){
                $this->validate($request, [
                    'picture' => 'required|image',
                ]);

                $file = $request->file("picture");
                $filename = "BARU.png";
                if($file != null){
                    $path = 'img//'. $filename;
                    Image::make($file)->save($path, 100);
                }
                return redirect("/admin7");
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

    public function sendEmailSubscriber(Request $request){
        if(Auth::check()){
            if(Auth::user()->isAdmin==1){
                $subscribers = Subscribe::get();
                foreach($subscribers as $subs){
                    $data = array( 'email' => $subs->email);
                    Mail::send('emailsubs', $data, function($message) use ($data)
                    {
                        $message->to($data['email'])->subject('Subscribe');
                    });
                }
                return redirect('/adminpage');
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

    public function test(Request $request){
        if(Auth::check()){
            if(Auth::user()->isAdmin==1){
                
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
}
