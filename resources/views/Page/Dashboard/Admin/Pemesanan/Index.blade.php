@extends('Layouts.dashboard')

@section('title')
Dashboard | Pemesanan
@endsection
@php
  $i = 1;
@endphp
@section('content')
<div class="bg-white w-full rounded-lg p-8">
    <div class="flex justify-between items-center">
        <span class="text-xl font-semibold text-black">Pemesanan Data</span>
        <a href="/dashboard/pemesanan/create">
            <button class="px-5 py-2 rounded-lg bg-blue-700 font-semibold text-white transition-all duration-300 active:scale-90">Add</button>
        </a>
    </div>
    <div class="h-[2px] w-full bg-black my-4"></div>
    <div class="flex mb-4">
        <form action="{{route('pemesanan.search')}}" method="POST" class="m-0 flex">
            @csrf
            @method("POST")
            <input name="search" type="text" class="py-2 border-gray-400 border-2 rounded-tl-lg rounded-bl-lg px-2 w-[150px] focus:outline-blue-500 h-full" placeholder="Search" autocomplete="off">
            <button class="bg-gray-500 hover:bg-blue-700 font-semibold h-full px-3 text-white rounded-tr-lg rounded-br-lg">Search</button>
        </form>
    </div>
    <div class="bg-blue-400">
        <table class="bg-white w-full text-black">
           <thead class="w-full h-[40px] bg-gray-200">
                <tr class="w-full"> 
                    <th class="w-[50px]">No.</th>
                    <th class="w-[200px]">Product</th>
                    <th>Nama Customer</th>
                    <th>Id payment</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
           </thead>
           <tbody class="text-center h-full">
            @if (count($pemesanan) != 0)
                @foreach ($pemesanan as $item )
                    <tr class="h-[50px] border-b-[1px] border-gray-200">
                        <td>{{ $i++ }}</td>
                        <td class="flex justify-center p-2">
                            <a href="{{$item->Product->imagedir}}" target="_blank"   >
                                <img class="h-[80px] w-[100px]" src="{{$item->Product->imagedir}}" alt="Product Image">
                                <span class="text-center">{{$item->Product->name}}</span>
                            </a>
                        </td>
                        <td>{{$item->User->name}}</td>
                        <td>{{$item->order_id}}</td>
                        <td>Rp {{ number_format($item->Product->harga, 0, ',', ',')}}</td>
                        <td>{{$item->status}}</td>
                        <td class="">
                            <button data-token={{$item->order_id}} class="px-4 py-2 text-white bg-green-600 rounded-lg font-semibold transition-all duration-300 active:scale-95" id="check-button">Check</button>
                        </td>
                    </tr>
                @endforeach
            @else   
                <tr  class="bg-gray-100 h-[50px]">
                    <th colspan="7" class="text-start px-2">Data Not Found</th>
                </tr>
            @endif
        </tbody>
    </table>
    
   
    </div>
</div>
<script>
    var button = document.getElementById('check-button');
    button.addEventListener('click', function () {
    var token = button.getAttribute('data-token');
      window.snap.pay(token);
    });
</script>
@endsection