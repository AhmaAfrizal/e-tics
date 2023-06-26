<?php

namespace App\Http\Controllers\superadmin;

use App\Models\User;
use App\Models\Acara;
use App\Models\Order;
use App\Models\Tiket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Coment;

class HomesController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$sold = Order::where('status', 'paid')->count();
		$acaras = Acara::latest()->take(3)->get();
		$tikets = Tiket::latest()->take(3)->get();
		$coments = Coment::latest()->take(3)->get();
		$tiket = Tiket::count();
		$users = User::count();
		$order = Order::where('status', 'paid')->sum('total_price');
		return view('user.superadmin.home',[
			'title' => 'dashboard'
		], compact('users', 'tiket', 'sold', 'order', 'acaras', 'tikets', 'coments'));
	}
}
