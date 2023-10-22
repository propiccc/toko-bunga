@extends('Layouts.dashboard')

@section('title')
Dashboard | Bungga
@endsection
@section('content')
<div class="bg-white w-full rounded-lg p-8">

    <div class="flex justify-between items-center">
        <span class="text-xl font-semibold text-black">Product Create</span>
    </div>
    <div class="h-[2px] w-full bg-black my-4"></div>
    <div class="flex flex-col">
        <form action="{{route('bunga.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="flex gap-x-2">
                <div class="flex flex-col w-full">
                    <label for="image" class="text-lg font-semibold">Image :</label>
                    <input id="image" type="file" name="image" class="p-2 border-[2px] border-gray-500 rounded-md" required>
                    @if (isset($error) && $error === true && isset($message['image']))
                        <span class="text-red-600">{{$message['image'][0]}}</span>
                    @endif
                </div>
                <div class="flex flex-col w-full">
                    <label for="name" class="text-lg font-semibold">Nama Bunga :</label>
                    <input class="p-2 border-[2px] border-gray-500 rounded-md" type="text" name="name" id="nama" placeholder="Bunga Mawar" autocomplete="off" required>
                </div>
                @if (isset($error) && $error === true && isset($message['name']))
                    <span class="text-red-600">{{$message['name'][0]}}</span>
                @endif
            </div>
            <div class=" flex gap-x-2">
                <div class="flex flex-col w-full">
                    <label for="harga" class="text-lg font-semibold">Harga :</label>
                    <input class="p-2 border-[2px] border-gray-500 rounded-md" type="number" name="harga" id="price" value="Rp {{ number_format(0, 0, ',', '.') }}" placeholder="Rp 10000"  autocomplete="off" required>
                    @if (isset($error) && $error === true && isset($message['harga']))
                        <span class="text-red-600">{{$message['harga'][0]}}</span>
                    @endif
                </div>
                <div class="flex flex-col w-full">
                    <label for="tipe" class="text-lg font-semibold">Tipe :</label>
                    <select class="p-2 border-[2px] border-gray-500 rounded-md text-blacks" name="tipe" id="tipe" required>
                        <option class="text-xl text-black p-2" value="papan">Papan</option>
                        <option class="text-xl text-black p-2" value="bucket">Bucket</option>
                    </select>
                    {{-- <input class="p-2 border-[2px] border-gray-500 rounded-md" type="text" name="tipe" id="tipe" placeholder=""  autocomplete="off"> --}}
                </div>
                @if (isset($error) && $error === true && isset($message['tipe']))
                    <span class="text-red-600">{{$message['tipe'][0]}}</span>
                @endif
            </div>
            <div class="flex gap-x-2">
                <div class="flex flex-col w-full">
                    <label for="stock" class="text-lg font-semibold">Stock :</label>
                    <input class="p-2 border-[2px] border-gray-500 rounded-md" type="number" name="stock" id="price" placeholder="100"  autocomplete="off" required>
                    @if (isset($error) && $error === true && isset($message['stock']))
                        <span class="text-red-600">{{$message['stock'][0]}}</span>
                    @endif
                </div>
                <div class="flex flex-col w-full">
                    <label for="description" class="text-lg font-semibold">Description :</label>
                    <textarea class="p-2 border-[2px] border-gray-500 rounded-md" type="text" name="description" id="description" autocomplete="off" required></textarea>
                    @if (isset($error) && $error === true && isset($message['description']))
                        <span class="text-red-600">{{$message['description'][0]}}</span>
                    @endif
                </div>
            </div>
            <div class="mt-2 flex justify-end gap-x-1">
                <button class="px-5 py-2 bg-blue-700 text-lg font-semibold text-white rounded-lg">Create</button>
                <a href="{{route('bunga.index')}}" class="px-5 py-2 bg-red-700 text-lg font-semibold text-white rounded-lg">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection