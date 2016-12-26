<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Mail;
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
	    $date = Carbon::now('Asia/Jakarta')->format('dmyHis');
	    $random_string .= $date;
	    return $random_string;
	}

	//fungsi coba-coba
    public function date(){
    	$date_example = "qi3fe1r5vnfov241116171927";
    	$date_substr = substr($date_example,13);
    	$date = Carbon::createFromFormat('dmyHis', $date_substr, 'Asia/Jakarta');
    	echo $date;
    	echo "<br>";
    	echo "<br>";
    	$date->addMinutes(15);
    	echo $date;
    	echo "<br>";
    	echo "<br>";
    	$now = Carbon::now('Asia/Jakarta');
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

    public function viewLogin(Request $request){
    	if(Auth::check()){
    		return redirect('dashboard');
    	}
    	else{
    		$data = [];
    		if(!$request->session()->has('msg')){
				$data['error'] = "";
			}
			else{
				$data['error'] = $request->session()->get('msg');
			}
			$request->session()->put('msg', '');
    		return view('login', $data);
    	}
    }

	public function viewChangePassword(Request $request){
    	if(Auth::check()){
    		return view('changePassword');
    	}
    	else{
    		$request->session()->put('msg', 'Harap signin terlebih dahulu');
    		return redirect('/login');
    	}
    }

	public function viewDashboard(Request $request){
		$user = $request->user();
		$data = [];
		$data['nama'] = $user->nama ;
		$data['img'] = $user->picture ;
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
			$data['picture'] = $user->picture;
			if($user->tanggal_lahir!=''){
				$birthdate = explode("-", $user->tanggal_lahir);
				$data['date'] = $birthdate[0];
				$data['month'] = $birthdate[1];
				$data['year'] = $birthdate[2];
			}
			else{
				$data['date'] = '';
				$data['month'] = '';
				$data['year'] = '';
			}
			return View('editprofile', $data);
    	}
    	else{
    		$request->session()->put('msg', 'Harap signin terlebih dahulu');
    		return redirect('/login');
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

		$data = array( 'email' => $user->email, 'token' =>  $user->confirmation_token);
		Mail::send('emails', $data, function($message) use ($data)
		{
		    $msg = 'Hi, selamat telah berhasil mendaftar pada www.ngebuat.com' . "<br>";
		    $msg .= "silahkan kunjungi www.ngebuat.com/confirm/" . $data['token'] . " untuk menyelesaikan proses registrasi\n";
		    $message->to($data['email'])->subject('Konfirmasi registrasi')
		    ->setBody($msg);;
		});
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
		if($token!="banned"){
			$user = User::where('confirmation_token', $token)->where('isValid', 0)->first();
			if(!$user){
				return "page not found";
			}
			else{
				$user->isValid = 1;
				$user->created_at = Carbon::now('Asia/Jakarta')->format('d-m-y-H:i:s');
				$user->save();
				if(Auth::attempt(['username' => $user->username, 'password' => $user->password_no_encrypt, 'isValid' => 1])){
					return redirect('dashboard');
				}
			}
		}
	}
	
	public function editProfile(Request $request){
		$request['Birthdate'] = $request['Date'] . '-' . $request['Month'] . '-' . $request['Year'];
		
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
			],
			'ProfPic' => 'image',
			'Birthdate' => 'Date'
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

		$file = $request->file('ProfPic');
		$filename = $user->username . ".jpg";
		if($file != null){
			$file->move('img//users', $filename);
			$user->picture = "img//users//" . $filename;
		}
		$user->tanggal_lahir = $request['Birthdate'];
		
		$user->save();

		return redirect('/dashboard');
	}

	//fungsi coba2
	public function pictura(Request $request){
		return 1;
		/*$flights = User::where('username', 'alifbm')->get();
		return View('test')->with(array('flights' => $flights));*/
		//return $string;
		//return $flight;
		//return view('test'. $flight);
		/*$file = $request->file('img');
		$name = 'testing.jpg';
		if($file==null){
			return 'x';
		}
		else{
			$file->move('uploads', $name);	
		}*/
	}
}
