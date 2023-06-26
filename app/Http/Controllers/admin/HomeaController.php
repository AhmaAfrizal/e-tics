<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Acara;
use App\Models\Order;
use App\Models\Tiket;
use App\Models\Coment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeaController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{

		$sold = Order::where('status', 'paid')->count();
		$acaras = Acara::latest()->where(['user_id' => Auth::user()->id ])->take(5)->get();
		$tikets = Tiket::latest()->where(['user_id' => Auth::user()->id])->take(5)->get();
		$coments = Coment::latest()->take(3)->get();
		$tiket = Tiket::count();
		$users = User::count();
		$acara = Acara::where(['user_id' => Auth::user()->id ])->count();
		$matiket = Tiket::where(['user_id' => Auth::user()->id])->count();
		$order = Order::where('status', 'paid')->sum('total_price');
		return view('user.admin.home',[
			'title' => 'dashboard'
		], compact('users', 'tiket', 'sold', 'order', 'acaras', 'tikets', 'coments', 'acara', 'matiket'));
	}
}
