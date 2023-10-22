@extends('Layouts.default')
@section('title')
    MyFlowers | Pesan Bunga
@endsection
@section('content')
<div class="bg-black flex justify-center overflow-hidden">
    <div class="bg-white h-[calc(100vh-68px)] w-[800px] flex flex-col p-4">
        <span class="text-xl font-semibold">Item :</span>
        <div class="h-[1px] bg-black w-full my-5"></div>
        <div class="bg-gray-200 flex p-1 rounded-lg">
            <img src="{{$item->imagedir}}" class="rounded-lg h-[140px] w-[190px] object-contain" alt="">
            <div class="flex flex-col w-full p-2">
                <span class="w-full font-semibold text-black">{{$item->name}}</span>
                <span class="w-full">
                    <span class="">Rp </span>{{number_format($item->harga, 0, ',', '.')}}/Item
                </span>
                <span class="w-full">
                    Tipe Bunga: {{$item->tipe == 'bucket' ? 'Bunga Bucket' : 'Bunga Papan'}}
                </span>
                <span class="w-full">
                    Stock: {{$item->stock}}
                </span>
            </div>
        </div>
        <div class="h-[1px] bg-black w-full mt-2"></div>
        <span class="text-xl font-semibold my-2">Detail Pemesan :</span>
        <div class="h-[1px] bg-black w-full mb-2"></div>
        <form action="{{route('pemesanan.detail', ['uuid' => $item->uuid])}}" method="POST" class="h-[365px]">
            @csrf
            @method('POST')
            <div class="flex flex-col">
                <label class="font-semibold" for="alamat">Alamat Tujuan : </label>
                <input class="bg-gray-200 border-[1px] p-4 border-black rounded-lg" id="alamat" name="alamat" type="text" autocomplete="off" required>
            </div>
            <div class="flex flex-col">
                <label class="font-semibold" for="no_telp">No Telp Pemesan : </label>
                <input class="bg-gray-200 border-[1px] p-4 border-black rounded-lg" id="no_telp" name="no_telp" type="number" autocomplete="off" required>
            </div>
            <div class="flex flex-col">
                <label class="font-semibold" for="pesan">Pesan : <span class="text-sm font-normal">Silahkan Isi Pesan Untuk Seller jika Tidak Ada Kosongkan</span></label>
                <input class="bg-gray-200 border-[1px] p-4 border-black rounded-lg" id="pesan" name="pesan" type="text" autocomplete="off" required>
            </div>
            <div class="flex items-end justify-center h-full p-2">
                <button type="submit" class="w-full bg-blue-800 rounded-lg py-2 text-xl font-semibold text-white transition-all duration-500 active:scale-95">Pesan</button>
            </div>
        </form>
        
    </div>

    
</div>
@endsection
