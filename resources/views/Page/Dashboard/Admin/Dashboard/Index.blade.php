@extends('Layouts.dashboard')
@section('title')
MyFlowers | Dashboard
@endsection
@section('content')
<div class="flex flex-wrap gap-x-5 w-full justify-center">
    <div class="bg-red-500 h-[200px] w-[350px] rounded-lg flex flex-col shadow-xl">
        <div class="w-full h-[70px] bg-blue-800 rounded-t-lg flex items-center px-4 text-xl font-semibold text-white">Product :</div>
        <div class="h-full w-full bg-white rounded-b-lg flex justify-center items-center font-semibold text-5xl">
            {{$product}}
        </div>
    </div>
    <div class="bg-red-500 h-[200px] w-[350px] rounded-lg flex flex-col shadow-xl">
        <div class="w-full h-[70px] bg-blue-800 rounded-t-lg flex items-center px-4 text-xl font-semibold text-white">Pemesanan :</div>
        <div class="h-full w-full bg-white rounded-b-lg flex justify-center items-center font-semibold text-5xl">
            {{$pemesanan}}
        </div>
    </div>
    <div class="bg-red-500 h-[200px] w-[350px] rounded-lg flex flex-col shadow-xl">
        <div class="w-full h-[70px] bg-blue-800 rounded-t-lg flex items-center px-4 text-xl font-semibold text-white">Pendapatan :</div>
        <div class="h-full w-full bg-white rounded-b-lg flex justify-center items-center font-semibold text-3xl">
            Rp{{number_format($pendapatan, 0, ',', ',')}}.00
        </div>
    </div>
    <div class="bg-red-500 h-[200px] w-[350px] rounded-lg flex flex-col shadow-xl">
        <div class="w-full h-[70px] bg-blue-800 rounded-t-lg flex items-center px-4 text-xl font-semibold text-white">Customer :</div>
        <div class="h-full w-full bg-white rounded-b-lg flex justify-center items-center font-semibold text-5xl">
            {{$customer}}
        </div>
    </div>
</div>
@endsection
