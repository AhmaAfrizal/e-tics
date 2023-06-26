<?php

namespace App\Http\Controllers\admin;

use App\Models\Acara;
use App\Models\Tiket;
use App\Models\Venue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TicketaController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

    public function index(){
        $tikets = Tiket::orderby('id', 'desc')->where(['user_id' => Auth::user()->id])->paginate(10);
        // $acara = Acara::orderby('nama_acara', 'asc')->get();
        $acara = Acara::latest()->where(['user_id' => Auth::user()->id])->get();
        $venue = Venue::orderby('id', 'asc')->get();
        return view('user.admin.tiket.tiket', [
            'title' => 'tiket'
        ], compact('tikets', 'acara', 'venue'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'acara_id' => 'required',
            'venue_id' => 'required',
            'harga' => 'required|numeric',
            'jumlah' => 'required|numeric',
        ]);

        Tiket::create([
            'user_id' => Auth::user()->id,
            'acara_id' => $request->acara_id,
            'venue_id' => $request->venue_id,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
        ]);

        toastr()->success('Data dtambahkan!', 'Berhasil!');
        return redirect()->back();
    }

    public function edit($id){
        $tiket = Tiket::find($id);
        $acara = Acara::orderby('nama_acara', 'asc')->where(['user_id' => Auth::user()->id])->get();
        $venue = Venue::orderby('id', 'asc')->get();
        return view('user.admin.tiket.tiket-edit', [
            'title' => 'tiket-edit'
        ], compact('tiket', 'acara', 'venue'));
    }

    public function update($id, Request $request){
        $tiket = Tiket::find($id);
        $tiket->acara_id = $request->acara_id;
        $tiket->venue_id = $request->venue_id;
        $tiket->harga = $request->harga;
        $tiket->jumlah = $request->jumlah;
        $tiket->save();

        toastr()->success('Data diubah!', 'Berhasil');
        return redirect()->route('admin.tiket');
    }

    public function destroy($id){
        $tiket = Tiket::find($id);
        $tiket->delete();

        toastr()->error('Data dihapus!', 'Berhasil');
        return redirect()->back()->with(['success' => 'Data Berhasil Dihapus']);
    }
}
