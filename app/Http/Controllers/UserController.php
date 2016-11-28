<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use \Hash;

class UserController extends Controller
{
    //
    /* TO-DO LIST
		 * 1. email confirmation
		 * 2. validasi signup dibagusin masukin lang
		 * 3. validasi editprofile blm
		 * 4. date blm dicatet
		 * 5. ganti password ?
	*/
	private static function randomTokenGenerator($length){
	    $random_string = "";
	    $valid_chars = 'qwertyuiopasdfghjklzxcvbnm0123456789';

	    $num_valid_chars = strlen($valid_chars);

	    for ($i = 0; $i < $length; $i++)
	    {
	        $random_pick = mt_rand(1, $num_valid_chars);
	        $random_char = $valid_chars[$random_pick-1];
	        $random_string .= $random_char;
	    }
	    $date = Carbon::now('Asia/jakarta')->format('dmyHis');
	    $random_string .= $date;
	    return $random_string;
	}

    public function date(){
    	$date_example = "qi3fe1r5vnfov241116171927";
    	$date_substr = substr($date_example,13);
    	$date = Carbon::createFromFormat('dmyHis', $date_substr, 'Asia/jakarta');
    	echo $date;
    	echo "<br>";
    	echo "<br>";
    	$date->addMinutes(15);
    	echo $date;
    	echo "<br>";
    	echo "<br>";
    	$now = Carbon::now('Asia/jakarta');
    	echo $now;
    	echo "<br>";
    	echo "<br>";
    	echo $date->diffForHumans($now);;
    	// /return Carbon::now()->format('d m y  H i s');
    }

    //View
    public function viewSignUp(){
    	if(Auth::check()){
    		return redirect('dashboard');
    	}
    	else{
    		return view('signup');
    	}
    }

    public function viewLogin(){
    	if(Auth::check()){
    		return redirect('dashboard');
    	}
    	else{
    		$data = [];
			$data['error'] = "";
    		return view('login', $data);
    	}
    }

	public function viewChangePassword(){
    	if(Auth::check()){
    		return view('changePassword');
    	}
    	else{
    		$data = [];
			$data['error'] = "Harap signin terlebih dahulu";
			return view('login', $data);
    	}
    }

	public function viewDashboard(Request $request){
		$user = $request->user();
		$data = [];
		$data['nama'] = $user->nama ;
		return View('greetings', $data);
	}

	public function viewEditProfile(Request $request){
		if(Auth::check()){
    		$user = $request->user();
			$data = [];
			$data['nama'] = $user->nama;
			$data['gender'] = $user->gender;
			$data['phone'] = $user->telp;
			$data['website'] = $user->website;
			$data['kota'] = $user->kota;
			$data['kodepos'] = $user->kodepos;
			$data['provinsi'] = $user->provinsi;
			$data['negara'] = $user->negara;
			$data['biodata'] = $user->biodata;

			return View('editprofile', $data);
    	}
    	else{
    		$data = [];
			$data['error'] = "Harap signin terlebih dahulu";
			return view('login', $data);
    	}
	}
    
	public function postSignUp(Request $request){
    	//bikin validasi
		$this->validate($request, [
			'Username' => ['required','unique:users,username'],
			'Email' => ['required','email','unique:users,email'],
			'Password' => 'required|confirmed|min:8',
		]);
		
		$user = new User();
		$user->username = $request['Username'];
		$user->email = $request['Email'];
		$user->password = bcrypt($request['Password']);
		$user->password_no_encrypt = $request['Password'];
		$user->confirmation_token = $this->randomTokenGenerator(13);
		$user->save();
		
		return redirect('/');
	}

	public function postSignIn(Request $request){
		$this->validate($request, [
			'Username' => ['required'],
			'Password' => 'required',
		]);
		if(Auth::attempt(['username' => $request['Username'], 'password' => $request['Password'], 'isValid' => 1])){
			return redirect('dashboard');
		}
		else if(Auth::attempt(['email' => $request['Username'], 'password' => $request['Password'], 'isValid' => 1])){
			return redirect('dashboard');
		}
		$data = [];
		$data['error'] = "Username / password salah";
		return view('login', $data);
	}

	public function postChangePassword(Request $request){
		$this->validate($request, [
			'oldPassword' => 'required|min:8',
			'newPassword' => 'required|confirmed|min:8',
		]);
		if(Hash::check($request['oldPassword'], $request->user()->password)){
			$user = User::find($request->user()->id);
			$user->password = bcrypt($request['newPassword']);
			$user->password_no_encrypt = $request['newPassword'];
			$user->save();
			return redirect('dashboard');
		}
		else{
			return redirect('changePassword');
		}
	}

	public function logout(Request $request){
		Auth::logout();
		return redirect('/');
	}

	public function confirmSignUp($token){
		$user = User::where('confirmation_token', $token)->where('isValid', 0)->first();
		if(!$user){
			return "page not found";
		}
		else{
			$user->isValid = 1;
			$user->save();
			if(Auth::attempt(['username' => $user->username, 'password' => $user->password_no_encrypt, 'isValid' => 1])){
				return redirect('dashboard');
			}
		}
	}
	
	public function editProfile(Request $request){
		$this->validate($request, [
			'Name' => 'regex:/^[\pL\s\-]+$/u|max:20',
			'Bio' => 'max:200',
			'Postal' => 'numeric|max:9999999999',
			'Phone' => 'numeric|max:999999999999999',
			'City' => 'regex:/^[\pL\s\-]+$/u|max:20',
			'Province' => 'regex:/^[\pL\s\-]+$/u|max:20',
			'Country' => 'regex:/^[\pL\s\-]+$/u|max:20',
			'Website' => ['max:50',
			'regex:/^(http(s?):\/\/)?(www\.)+[a-zA-Z0-9\.\-\_]+(\.[a-zA-Z]{2,3})+(\/[a-zA-Z0-9\_\-\s\.\/\?\%\#\&\=]*)?$/'
			]
		]);

		$user = User::find($request->user()->id);

		$user->nama = $request['Name'];
		$sex="";
		if($request['Sex']=="Laki-laki"){
			$sex = "L";
		}
		else if($request['Sex']=="Perempuan"){
			$sex = "P";
		}
		$user->gender = $sex;
		$user->telp = $request['Phone'];
		$user->website = $request['Website'];
		$user->kota = $request['City'];
		$user->kodepos = $request['Postal'];
		$user->provinsi = $request['Province'];
		$user->negara = $request['Country'];
		$user->biodata = $request['Bio'];

		$user->save();

		return redirect('/dashboard');
	}
}
