<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bunga;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        
        $data = Bunga::all();
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
}
