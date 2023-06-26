<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\Coment;
use Illuminate\Http\Request;

class ComentsController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}
    public function index(){
        $comentss = Coment::with(['user'])->latest()->paginate(10);
        return view('user.superadmin.coment.coment', [
            'title' => 'coment'
        ], compact('comentss'));
    }

    public function hapus($id){
        $coment = Coment::find($id);
        $coment->delete();
        toastr()->error('Data dihapus!', 'Berhasil!');
        return redirect()->back();
    }
}
