<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function PaymentDetail(){
        
        $pemesanan =  Pemesanan::with(['Product','User'])->where('user_id', Auth::user()->id)->get();

        return view('Page.Dashboard.Customer.Pemesanan.Index',[
            'pemesanan' => $pemesanan,
        ]);
    
    }
}
