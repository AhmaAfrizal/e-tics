<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
	{
		$this->middleware('auth');
	}

    public function indexuser(){
        $user = User::where([
            'is_superadmin' => 0,
            'is_admin' => 0
        ])->orderby('id','asc')->get();
        return view('user.superadmin.akun.user', [
            'title' => 'users'
        ], compact('user'));
    }

    public function indexadmin(){
        $user = User::where('is_admin',1)->orderby('id','asc')->get();
        return view('user.superadmin.akun.admin', [
            'title' => 'admin'
        ], compact('user'));
    }

    public function store(Request $request){
        $val = $request->validate([
            'name' => 'required', 'string', 'max:225',
            'email' => 'required', 'string','email', 'max:225',
            'password' => 'required', 'string', 'min:8',
        ]);

        $user = User::create($val);
        $user->is_admin = '1';
        $user->password = bcrypt($request->password);
        $user->email_verified_at = Carbon::now();
        $user->save();

        toastr()->success('Data ditambahkan!', 'Berhasil');
        return redirect()->back();
    }

    public function edit($id){
        $user = User::find($id);
        return view('user.superadmin.akun.edit', [
            'title' => 'edit'
        ], compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::find($id);
		$user->name = $request->name;
		if(is_null($request->password)){
			// 
		}else{
			$user->password = bcrypt($request->password);
		}
		$user->save();

        toastr()->success('Data diubah!', 'Berhasil');
		return redirect()->route('superadmin.home');
    }

    public function hapus($id){
        $user = User::find($id);
        $user->delete();

        toastr()->error('Data dihapus!', 'Berhasil');
		return redirect()->back();
    }
}
