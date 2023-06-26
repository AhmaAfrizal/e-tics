<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use Illuminate\Http\Request;

class VenuesController extends Controller
{

    public function __construct()
	{
		$this->middleware('auth');
	}

    public function index(){
        $venue = Venue::all();

        return view('user.superadmin.venue.venue', [
            'title' => 'venue'
        ], compact('venue'));
    }

    public function addvenue(Request $request){
        $valvenue = $request->validate([
            'venue' => 'required|unique:venues'
        ]);

        $venue = Venue::create($valvenue);
        $venue->save();

        toastr()->success('Data ditambahkan!', 'Berhasil');
        return redirect()->back();
    }

    public function editvenue($id){
        $venue = Venue::find($id);
        return view('user.superadmin.venue.edit-venue', [
            'title' => 'venue'
        ], compact('venue'));
    }

    public function updatevenue($id, Request $request){
        $venue = Venue::find($id);
        $venue->venue = $request->venue;
        $venue->save();

        toastr()->success('Data diubah!', 'Berhasil');
        return redirect('superadmin/venue');
    }

    public function dellvenue($id){
        $venue = Venue::find($id);
        $venue->delete();

        toastr()->error('Data dihapus!', 'Berhasil');
		return redirect()->back();
    }
}
