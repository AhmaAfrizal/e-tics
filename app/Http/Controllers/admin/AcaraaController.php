<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Acara;
use App\Models\Tiket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AcaraaController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

    public function index(){
        $acaras = Acara::with(['user'])->latest()->where(['user_id' => Auth::user()->id])->paginate(5);

        return view('user.admin.acara.acara', [
            'title' => 'acara'
        ], compact('acaras'));
    }

    public function store(Request $request){
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
        
        toastr()->success('Data dtambahkan!', 'Berhasil!');
        return redirect()->back();
    }

    public function edit($id){
        $acara = Acara::find($id);
        return view('user.admin.acara.acara-edit', [
            'title' => 'acara-edit'
        ], compact('acara'));
    }

    public function update($id, Request $request){
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
        return redirect()->route('admin.acara');
    }

    public function destroy($id){
        $acara = Acara::findOrFail($id);
        Storage::disk('local')->delete('public/img/acara/'.$acara->foto);
        $acara->delete();

        $tiket = Tiket::where(['acara_id' => $id]);
        $tiket->delete();
        // toastr()->error('Data dihapus!', 'Berhasil!');
        return redirect()->back()->with(['success' => 'Data Berhasil Dihapus']);
    }
}
