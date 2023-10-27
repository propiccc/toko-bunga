<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bunga;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        
        $data = Bunga::where('stock', '!=' , 0)->get();
        return view('Page.Home.Index',[
            'products' => $data,
        ]);
    }

    public function dashboard(){
        $pemesanan = Pemesanan::with('Product')->get();
        $pendapatan = $pemesanan->sum(function ($income) {
            return $income->Product->harga;
        });
        $product = Bunga::count();
        $customer =  User::where('role', 'customer')->count();
        return view('Page.Dashboard.Admin.Dashboard.Index',[
            'pemesanan' =>count($pemesanan),
            'pendapatan' => $pendapatan,
            'product' => $product,
            'customer' => $customer
        ]);
    }

    public function dashboardCustomer(){

        $pemesanan = Pemesanan::where('user_id', Auth::user()->id)->count();        
        return view('Page.Dashboard.Customer.Dashboard.Index',[
            'pemesanan' => $pemesanan,
        ]);

    }
}
