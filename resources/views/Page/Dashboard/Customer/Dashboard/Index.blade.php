@extends('Layouts.dashboard')
@section('title')
    Customer | Dashboard
@endsection
@section('content')
<div class="flex flex-wrap gap-x-5 w-full">
    <div class="bg-red-500 h-[200px] w-[350px] rounded-lg flex flex-col shadow-xl">
        <div class="w-full h-[70px] bg-blue-800 rounded-t-lg flex items-center px-4 text-xl font-semibold text-white">Product :</div>
        <div class="h-full w-full bg-white rounded-b-lg flex justify-center items-center font-semibold text-5xl">
            {{$pemesanan}}
        </div>
    </div>
</div>
@endsection