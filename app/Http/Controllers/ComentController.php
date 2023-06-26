<?php

namespace App\Http\Controllers;

use App\Models\Coment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

    public function kirim(Request $request){
        $this->validate($request, [
            'nama' => 'required|alpha',
            'email' => 'required|email',
            'pesan' => 'required'
        ]);
        Coment::create([
            'user_id' => Auth::user()->id,
            'nama' => $request->nama,
            'email' => $request->email,
            'pesan' => $request->pesan
        ]);

        toastr()->success('Pesan dikirim!', 'Berhasil');

        return redirect()->back();
    }
}
