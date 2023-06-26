<?php

namespace App\Http\Controllers\superadmin;

use App\Models\Acara;
use App\Models\Tiket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AcarasController extends Controller
{

    public function __construct()
	{
		$this->middleware('auth');
	}

    public function index(){
        $acaras = Acara::orderby('id', 'desc')->where(['user_id' => Auth::user()->id])->paginate(5);
        // $acara = Acara::latest()->paginate(5);

        return view('user.superadmin.acara.acara', [
            'title' => 'event'
        ], compact('acaras'));
    }

    public function allacara(){
        $acaras = Acara::orderby('nama_acara', 'asc')->paginate(10);

        return view('user.superadmin.acara.allacara',[
            'title' => 'allacara'
        ], compact('acaras'));
    }

    public function addacara(Request $request){
        $month = date('m');
        $day = date('d');
        $year = date('y');
        $today = $day. '-'. $month. '-'. $year;
        $today = Carbon::now()->toDateString();

        $this->validate($request, [
            'nama_acara' => 'required|unique:acaras',
            'deskripsi' => 'required',
            'tempat' => 'required',
            'tanggal' => 'required|date|after_or_equal:'.$today,
            'foto' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        // upload image
        $foto = $request->file('foto');
        $foto->storeAs('public/img/acara', $foto->hashName());

        Acara::create([
            'user_id' => Auth::user()->id,
            'nama_acara' => $request->nama_acara,
            'deskripsi' => $request->deskripsi,
            'tempat' => $request->tempat,
            'tanggal' => $request->tanggal,
            'foto' => $foto->hashName()
        ]);
        
        // toastr()->success('Data dtambahkan!', 'Berhasil!');
        return redirect()->back()->with(['success' => 'Data Berhasil disimpan!']);
    }

    public function editacara($id){
        $acara = Acara::find($id);
        return view('user.superadmin.acara.edit-acara', [
            'title' => 'acara'
        ], compact('acara'));
    }

    public function updateacara($id, Request $request, Acara $acara){
        $acara = Acara::findOrFail($id);
        if ($request->file('foto') == "") {
            $acara->nama_acara = $request->nama_acara;
            $acara->deskripsi = $request->deskripsi;
            $acara->tempat = $request->tempat;
            $acara->tanggal = $request->tanggal;
            $acara->save();
        } else {
            Storage::disk('local')->delete('public/img/acara/'.$acara->foto);
            $foto = $request->file('foto');
            $foto->storeAs('public/img/acara', $foto->hashName());

            $acara->nama_acara = $request->nama_acara;
            $acara->deskripsi = $request->deskripsi;
            $acara->tempat = $request->tempat;
            $acara->tanggal = $request->tanggal;
            $acara->foto = $request->foto->hashName();
            $acara->save();
        }
        toastr()->success('Data diubah!', 'Berhasil');
        return redirect('superadmin/acara');
    }

    public function dellacara($id){
        $acara = Acara::findOrFail($id);
        Storage::disk('local')->delete('public/img/acara/'.$acara->foto);
        $acara->delete();

        $tiket = Tiket::where(['acara_id' => $id]);
        $tiket->delete();

        foreach ($tiket as $t) {
            # code...
            $order = Order::where(['tiket_id' => $t->id]);
            $order->delete();
        }
        // toastr()->error('Data dihapus!', 'Berhasil!');
        return redirect()->back()->with(['success' => 'Data Berhasil Dihapus']);
    }
}