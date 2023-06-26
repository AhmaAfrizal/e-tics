<?php

namespace App\Http\Controllers\superadmin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tiket;

class OrdersController extends Controller
{

    public function __construct()
	{
		$this->middleware('auth');
	}

    public function transaksi(){
        $unporder = Order::with(['user', 'tiket'])->where(['status' => 'unpaid'])->whereNotNull('bukti_bayar')->latest()->get();
        $porder = Order::with(['user', 'tiket'])->where(['status' => 'paid'])->latest()->paginate(5);
        // $porder = Order::with(['user', 'tiket'])->where(['status' => 'paid'])->latest()->get();
        return view('user.superadmin.tiket.transaksi', [
            'title' => 'transaksi'
        ], compact('unporder', 'porder'));
    }
    public function confirm($id){
        $order = Order::find($id);
        $tiket_id = $order->tiket_id;
        $order->update([
            'status' => 'paid'
        ]);

        $tiket = Tiket::find($tiket_id);
        $tiket->jumlah = $tiket->jumlah - 1;
        $tiket->update();
        // $tiket->update([
        //     'jumlah' => $jumlah-1
        // ]);
        toastr()->success('Pesanan dikonfirmasi!', 'Berhasil!');
        return redirect()->back();
    }
    public function delete($id){
        $order = Order::find($id);
        $order->delete();

        toastr()->error('Data dihapus!', 'Berhasil');
        return redirect()->back();
    }
}
