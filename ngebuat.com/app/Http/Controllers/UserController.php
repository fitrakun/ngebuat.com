<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    public function postSignUp(Request $request){
		
		$messages = [
			'Username.required' => 'Kolom nama tampilan tidak boleh kosong',
			'Username.unique:users,username' => 'Nama tampilan sudah terdaftar sebelumnya',
			'required' => 'Kolom :attribute tidak boleh kosong',
			'Phone.max' => 'Masukan nomor telepon tidak boleh lebih dari 10 angka',
			'Phone.numeric' => 'Masukan nomor telepon hanya boleh mengandung angka',
			'Postal.max' => 'Masukan kode pos tidak boleh lebih dari 10 angka',
			'Postal.numeric' => 'Masukan nomor telepon hanya boleh mengandung angka',
			'max' => 'Masukan :attribute tidak boleh melebihi :max karakter',
			'alpha' => 'Masukan :attribute hanya boleh mengandung alphabet',
			'alpha_num' => 'Masukan :attribute hanya boleh mengandung alphabet dan angka',
			'min' => 'Masukan :attribute minimal terdiri dari :min karakter',
			'email' => 'Masukan :attribute harus alamat email yang valid',
			'unique' =>  'Masukan :attribute sudah terdaftar pada database',
			'Password.confirmed' => 'Password tidak sama'
		];
		
		$this->validate($request, [
			'Username' => ['required','unique:users,username'],
			'Email' => ['required','email','unique:users,email'],
			'Password' => 'required|confirmed|min:8',
			'Nama' => 'required|max:20',
			'Gender' => 'required',
			'Biodata' => 'max:200',
			'Postal' => 'numeric|max:9999999999',
			'Phone' => 'numeric|max:999999999999999',
			'Alamat' => 'alpha_num|max:50',
			'Kota' => 'alpha|max:20',
			'Provinsi' => 'alpha|max:20',
			'Negara' => 'alpha|max:20',
			'Website' => 'alpha|max:50'
		], $messages);
		
		$user = new User();
		$user->username = $request['Username'];
		$user->email = $request['Email'];
		$user->password = bcrypt($request['Password']);
		$user->nama = $request['Name'];
		if($request['Sex']="Laki-laki"){
			$sex = "L";
		}
		else{
			$sex = "P";
		}
		$user->gender = $sex;
		$user->telp = $request['Phone'];
		$user->website = $request['Website'];
		$user->alamat = $request['Address'];
		$user->kota = $request['City'];
		$user->kodepos = $request['Postal'];
		$user->provinsi = $request['Province'];
		$user->negara = $request['Country'];
		$user->biodata = $request['Bio'];
		
		$user->save();
		
		return redirect('/');
	}

	public function postSignIn(Request $request){
		if(Auth::attempt(['username' => $request['Username'], 'password' => $request['Password']])){
			return redirect('signup');
		}
		else if(Auth::attempt(['email' => $request['Username'], 'password' => $request['Password']])){
			return redirect('signup');
		}
		return redirect('/');
	}

	public function logout(Request $request){
		Auth::logout();
		return redirect('/');
	}

	public function viewDashboard(Request $request){
		$user = $request->user();
		$data = [];
		$data['nama'] = $user->nama ;
		return View('greetings', $data);
	}

	public function viewEditProfile(Request $request){
		$user = $request->user();
		$data = [];
		$data['username'] = $user->username;
		$data['email'] = $user->email;
		$data['nama'] = $user->nama;
		$data['gender'] = $user->gender;
		$data['phone'] = $user->telp;
		$data['website'] = $user->website;
		$data['alamat'] = $user->alamat;
		$data['kota'] = $user->kota;
		$data['kodepos'] = $user->kodepos;
		$data['provinsi'] = $user->provinsi;
		$data['negara'] = $user->negara;
		$data['biodata'] = $user->biodata;

		return View('editprofile', $data);
	}

	public function editProfile(Request $request){
		$user = User::find($request->user()->id);

		$user->username = $request['Username'];
		$user->email = $request['Email'];
		$user->password = bcrypt($request['Password']);
		$user->nama = $request['Name'];
		if($request['Sex']="Laki-laki"){
			$sex = "L";
		}
		else{
			$sex = "P";
		}
		$user->gender = $sex;
		$user->telp = $request['Phone'];
		$user->website = $request['Website'];
		$user->alamat = $request['Address'];
		$user->kota = $request['City'];
		$user->kodepos = $request['Postal'];
		$user->provinsi = $request['Province'];
		$user->negara = $request['Country'];
		$user->biodata = $request['Bio'];

		$user->save();

		return redirect('/dashboard');
	}
}
