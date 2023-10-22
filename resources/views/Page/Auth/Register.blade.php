@extends('Layouts.default')
@section('title')
   MyFlowers | Register
@endsection
@section('content')
<div class="flex justify-center h-[calc(100vh-54px)] w-full items-center">
    <img src="https://e0.pxfuel.com/wallpapers/1000/464/desktop-wallpaper-login-page-larry-page-homepage-nexus-and-bing-homepage.jpg" class="w-full absolute h-[calc(100vh-54px)] -z-10" alt="">
    <div class="bg-gray-800 p-8 flex flex-col text-white rounded-lg">
        <span class="font-semibold text-xl text-center mb-8">Register</span>
        @if (isset($error))
            @foreach ($message as $item )
                <span class="text-red-600 text-center">{{$item}}</span>
            @endforeach
        @endif
            <form action="{{route('register.store')}}" method="POST" class="flex flex-col gap-y-10 w-[400px]">
                @csrf
                @method("POST")
                <div class="">
                    <input name="name" type="text" class="w-full bg-transparent text-white border-b-[1px] border-white px-2 py-4 focus:border-blue-500 outline-none placeholder:text-lg" placeholder="Username" autocomplete="off" required>
                </div>
                <div class="">
                    <input name="no_telp" type="text" class="w-full bg-transparent text-white border-b-[1px] border-white px-2 py-4 focus:border-blue-500 outline-none placeholder:text-lg" placeholder="No Telephone" autocomplete="off" required>
                </div>
                <div class="">
                    <input name="email" type="email" class="w-full bg-transparent text-white border-b-[1px] border-white px-2 py-4 focus:border-blue-500 outline-none placeholder:text-lg" placeholder="Email" autocomplete="off" required>
                </div>
                <div class="">
                    <input name="password" type="password" class="w-full bg-transparent text-white border-b-[1px] border-white px-2 py-4  focus:border-blue-500 outline-none placeholder:text-lg" placeholder="Password" autocomplete="off" required>
                </div>
                <div class="">
                    <input name="password_confirmation" type="password" class="w-full bg-transparent text-white border-b-[1px] border-white px-2 py-4  focus:border-blue-500 outline-none placeholder:text-lg" placeholder="Password Confirmation" autocomplete="off" required>
                </div>
                <div class="flex">
                    <button type="submit" class="bg-blue-700 rounded-lg px-4 py-2 font-semibold w-full">Register</button>
                </div>
            </form>
            <span class="text-sm mt-5 text-gray-400">Sudah Memiliki Akun? <a class="text-blue-400" href="{{route('login.view')}}">Login</a></span>
        </div>
    </div>
@endsection