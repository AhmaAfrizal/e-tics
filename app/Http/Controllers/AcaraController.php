<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Tiket;
use App\Models\Venue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AcaraController extends Controller
{
    public function index(){
        $tiket = Tiket::with(['acara', 'venue'])->latest()->get();
        $acaras = Acara::with('tiket')->latest()->paginate(11);
        $venue = Venue::with(['tiket'])->oldest()->get();
        return view('frontend.home', [
            'title' => 'beranda'
        ], compact('tiket', 'acaras', 'venue'));
    }

    public function tikets($id){
        $venue = Venue::with(['tiket'])->find($id);
        $tikets = $venue->tiket;

        return view('frontend.tikets', [
            'title' => 'tikets'
        ], compact('venue', 'tikets'));
    }

    public function show($id){
        $allacara = Acara::with(['tiket'])->inRandomOrder()->limit(2)->get();
        $acara = Acara::with(['tiket'])->find($id);
        $tiket = $acara->tiket;
        return view('frontend.acara-detil', [
            'title' => 'detail-acara'
        ], compact('acara', 'allacara', 'tiket'));
    }

    public function search(){
        $acara 	= Acara::latest();
        if (request('search')) {
            $acara->where('nama_acara' , 'like' , '%' . request('search') . '%');
        }

        return view('frontend.search' ,[
            'title' => 'search',
            "acara" => $acara->get()
        ]);
    }

    public function about(){
        return view('frontend.about', [
            'title' => 'about'
        ]);
    }

    public function contact(){
        return view('frontend.contact', [
            'title' => 'contact'
        ]);
    }
}
