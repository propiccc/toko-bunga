@extends('Layouts.default')
@section('title')
Myflowers | Detail
@endsection
@section('content')
    <div class="bg-black flex justify-center overflow-auto">
        <div class="bg-white h-[calc(100vh-68px)] w-[800px] flex flex-col">
            <div class="bg-gray-200 h-[400px] flex justify-center">
                <img src="{{$product->imagedir}}" class="w-full h-[400px] object-contain" alt="image product">
            </div>
                <div class="flex flex-col gap-y-2 p-4">
                    <div class="">
                        <span class="text-3xl font-semibold">
                            {{$product->name}}
                        </span>
                    </div>
                    <div class="">
                        <span class="text-2xl font-semibold">
                            <span class="">Rp </span>{{number_format($product->harga, 0, ',', '.')}}/Item
                        </span>
                    </div>
                    <div class="">
                        <span class="text-2xl font-semibold">
                            Tipe Bunga: {{$product->tipe == 'bucket' ? 'Bunga Bucket' : 'Bunga Papan'}}
                        </span>
                    </div>
                    <div class="">
                        <span class="text-2xl font-semibold">
                            Stock: {{$product->tipe == 'bucket' ? 'Bunga Bucket' : 'Bunga Papan'}}
                        </span>
                    </div>
                    <div class="">
                        <span class="text-xl font-semibold">
                            Stock: {{$product->stock}}
                        </span>
                    </div>
                    <div class="h-[240px] overflow-scroll scrollbar-none">
                        <span class="font-semibold text-xl">Description :</span>
                        <p class="text-lg">
                            {{$product->description}}
                        </p>
                    </div>
                    <div class="flex justify-center">
                        <a href="{{route('pemesanan.product', ['uuid' => $product->uuid])}}" class="w-full">
                            <button class="w-full bg-blue-800 rounded-lg py-2 text-xl font-semibold text-white transition-all duration-500 active:scale-95">Pesan</button>
                        </a>
                    </div>
                </div>
        </div>
    </div>
@endsection
