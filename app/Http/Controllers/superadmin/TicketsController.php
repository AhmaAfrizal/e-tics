<?php

namespace App\Http\Controllers\superadmin;

use App\Models\Acara;
use App\Models\Tiket;
use App\Models\Venue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller
{

    public function __construct()
	{
		$this->middleware('auth');
	}

    public function index(){
        $tikets = Tiket::orderby('id', 'desc')->where(['user_id' => Auth::user()->id])->paginate(10);
        $acara = Acara::orderby('nama_acara', 'asc')->where(['user_id' => Auth::user()->id])->get();
        // $acara = Acara::latest()->where(['user_id' => Auth::user()->id])->get();
        $venue = Venue::orderby('id', 'asc')->get();

        return view('user.superadmin.tiket.tiket', [
            'title' => 'tiket'
        ], compact('tikets', 'venue', 'acara'));
    }

    public function alltiket(){
        $tikets = Tiket::latest()->paginate(10);

        return view('user.superadmin.tiket.alltiket', [
            'title' => 'alltiket'
        ], compact('tikets'));
    }

    public function addtikets(Request $request){
        // $addtics = $request->validate([
        //     'acara_id' => 'required',
        //     'venue_id' => 'required',
        //     'harga' => 'required|numeric',
        //     'jumlah' => 'required|numeric',
        // ]);
        // $tiket = Tiket::create($addtics);
        // $tiket->save();

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
        // toastr()->success('Data ditambahkan!', 'Berhasil');
        return redirect()->back()->with(['success' => 'Data Berhasil disimpan']);
    }

    public function edittiket($id){
        $tiket = Tiket::find($id);
        $acara = Acara::orderby('nama_acara', 'asc')->get();
        $venue = Venue::orderby('id', 'asc')->get();
        return view('user.superadmin.tiket.edit-tiket', [
            'title' => 'tiket'
        ], compact('tiket', 'acara', 'venue'));
    }

    public function updatetiket($id, Request $request){
        $tiket = Tiket::find($id);
        $tiket->acara_id = $request->acara_id;
        $tiket->venue_id = $request->venue_id;
        $tiket->harga = $request->harga;
        $tiket->jumlah = $request->jumlah;
        $tiket->save();

        toastr()->success('Data diubah!', 'Berhasil');
        return redirect('superadmin/tiket');
    }

    public function delltiket($id){
        $tiket = Tiket::find($id);
        $tiket->delete();

        // toastr()->error('Data dihapus!', 'Berhasil');
        return redirect()->back()->with(['success' => 'Data Berhasil Dihapus']);
    }
}