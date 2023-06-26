<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function orders($id, Request $request){
        $tiket = Tiket::with(['acara', 'venue'])->find($id);

        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->tiket_id = $tiket->id;
        $order->foto = $tiket->acara->foto;
        $order->nama_tiket = $tiket->acara->nama_acara;
        $order->venue = $tiket->venue->venue;
        $order->total_price = $tiket->harga;
        $order->status = 'unpaid';
        $order->save();
        

        toastr()->info('Segera lakukan pembayaran!', 'Info');
        // return redirect()->intended();
        return view('frontend.pesanan-detil', [
            'title' => 'detil-pesanan'
        ], compact('order'));
    }

    public function transaksi(){
        $order = Order::where(['user_id' => Auth::user()->id ])->latest()->get();

        return view('user.user.pesanan', [
            'title' => 'pesanans'
        ],compact('order'));
    }
    public function transaksis($id){
        $order = Order::find($id);

        return view('user.user.pesanan-detail', [
            'title' => 'pesanan-detail'
        ], compact('order'));
    }

    public function bayar($id, Request $request){
        $this->validate($request, [
            'bukti_bayar' => 'required|image|mimes:png,jpg,jpeg'
        ]);
        $order = Order::findOrFail($id);

        $bukti_bayar = $request->file('bukti_bayar');
        $bukti_bayar->storeAs('public/img/bayar', $bukti_bayar->hashName());
        $order->bukti_bayar = $request->bukti_bayar->hashName();
        $order->save();

        toastr()->success('Bukti pembayaran terkirim!', 'Berhasil');
        return redirect()->route('pesanans');
    }

    public function exportpdf($id){
        // return 'test';
        $order = Order::find($id);
        view()->share('order', $order);
        $pdf = PDF::loadview('user.user.tiket-pdf');
        
        return $pdf->download($order->user->name."-".$order->nama_tiket."-".$order->venue." tiket".".pdf");

    }
}
