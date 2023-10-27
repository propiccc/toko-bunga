<?php

namespace App\Http\Controllers;

use App\Models\Bunga;
use App\Models\Pemesanan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PemesananController extends Controller
{
    public function index(){
        $data = Pemesanan::with(['User', 'Product'])->get();
        return view('Page.Dashboard.Admin.Pemesanan.Index', [
            'pemesanan' => $data
        ]);
    }

    public function PemesananIndex($uuid){
        
        $data = Bunga::where('uuid', $uuid)->first();
        if (!isset($data)) {
            toastr()->error('Data Not Found!');
            return redirect()->route('home');
        }
        if($data->stock === 0){
            return redirect()->route('home')->with('error', 'Stock Telah Habis');
        }

        return view('Page.Pemesanan.Pemesanan',[
            'item' => $data
        ]);
    }
    public function PemesananDetail(Request $request, $uuid){

        $validate = Validator::make($request->all(), [
            'alamat' => ['required', 'string'],
            'no_telp' => ['required', 'string', 'min:11','max:13'],
            'pesan' => ['nullable', 'string'],
        ]);

        if ($validate->fails()) {
            toastr()->success('Someting Wrong, Try Again!');
            return redirect()->route('home');
        }
        
        $data = Bunga::where('uuid', $uuid)->first();

        if (!isset($data)) {
            toastr()->error('Data Not Found!');
            return redirect()->route('home');
        }

        // * MIDRANDS && PAYMENT CONFIG
        \Midtrans\Config::$serverKey = env('VITE_MIDRANS_SERVER_KEY');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => Str::random(36) . date('YmdHis'),
                'gross_amount' => $data->harga
            ],
            'item_details' => [
                [
                    'id' =>  Str::random(10),
                    'price' => $data->harga,
                    'quantity' => 1,
                    'name' => $data->name
                ]
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => $request->no_telp,
            ],
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('Page.Pemesanan.Payment',[
            'item' => $data,
            'token' => $snapToken,
            'detail' => [
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'pesan' => $request->pesan
            ]
        ]);
    }

    public function create(){
        return view('Page.Dashboard.Admin.Pemesanan.Create');
    }

    public function search(Request $request){

        if($request->search == null || $request->search == "" ) return redirect()->route('pemesanan.index');

        $validate = Validator::make($request->all(), [
            'search' => ['required', 'string']
        ]);
        
        if ($validate->fails()) {
            toastr()->success('Someting Wrong, Try Again!');
            return redirect()->route('pemesanan.index');
        }
        
        $data = Pemesanan::where('order_id', 'LIKE', '%' . $request->search . '%')
        ->orWhere('status', 'LIKE', '%' . $request->search . '%')
        ->orWhereHas('User', function($q) use ($request){
            $q->where('name', 'LIKE', '%' . $request->search . '%');
        })
        ->orWhereHas('Product', function($q) use ($request){
            $q->where('name', 'LIKE', '%' . $request->search . '%');
        })
        ->get();

        return view('Page.Dashboard.Admin.Pemesanan.Index', [
            'pemesanan' => $data
        ]);
    }

    public function detail($uuid){
        
        $data = Bunga::where('uuid', $uuid)->first();

        if (!isset($data)) {
            toastr()->error('Data Not Found!');
            return redirect()->route('home');
        }

        return view('Page.Home.ProductDetail',[
            'product' => $data
        ]);
        
    }

    public function PemesananSuccess($uuid){
        $data = Pemesanan::where('uuid', $uuid)->first();
        if (!isset($data)) {
            toastr()->error('Data Not Found!');
            return redirect()->route('pemesanan.index');
        }

        $data->status = 'success';
        $data->save();
        
        if($data){
          return  redirect()->back()->with('success', 'Pesanan Sucess Sanpai Ke Customer!');
        } else {
           return redirect()->back()->with('error', 'Someting Wrong, Try Again!');
        }
    }
    public function set(Request $request, $uuid){

        $validate = Validator::make($request->all(), [
            'token' => ['required', 'string']
        ]);
        
        if ($validate->fails()) {
            return response()->json(['error' => 'Bad Requests',], 400);
        }
        
        $data = Bunga::where('uuid', $uuid)->first();
        if(!isset($data)){
            return response()->json(['error' => 'Data Not Found'], 404);
        }
        
        $pemesanan = Pemesanan::create([
            'order_id' => $request->token,
            'bunga_id' => $data->id,
            'user_id'=> Auth::user()->id,
            'alamat' => $request->alamat,
            'description' => $request->description,
            'status' => 'process'
        ]);

        $data->stock = $data->stock - 1;
        $data->save();

        if($pemesanan){
            return response()->json(['success' => true], 200);
        } else {
            return response()->json(['success' => false], 500);
        }
        
    }

}
