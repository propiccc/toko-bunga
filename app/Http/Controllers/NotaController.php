<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function cetakNota($uuid){

        $data = Pemesanan::with(['User', 'Product'])->where('uuid', $uuid)->first();
        if(!isset($data)){
            toastr()->error('Someting Wrong!');
        }
        $pdf = Pdf::loadView('nota', ['data' => $data]);
        return $pdf->download('invoice.pdf');

    }
}
