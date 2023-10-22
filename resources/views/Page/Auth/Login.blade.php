@extends('Layouts.default')
@section('title')
   MyFlowers | Login
@endsection
@section('content')
<div class="flex justify-center h-[calc(100vh-54px)] w-full items-center">
    <img src="https://e0.pxfuel.com/wallpapers/1000/464/desktop-wallpaper-login-page-larry-page-homepage-nexus-and-bing-homepage.jpg" class="w-full absolute h-[calc(100vh-54px)] -z-10" alt="">
    <div class="bg-gray-800 p-8 flex flex-col text-white rounded-lg">
        <span class="font-semibold text-xl text-center mb-8">Login</span>
            @if(isset($error))
             <span class="text-red-500 text-center">Please, Check Your Password/Username</span>
            @endif
            <form action="{{route('login.store')}}" method="POST" class="flex flex-col gap-y-10 w-[300px]">
               
                @method('POST')
                @csrf

                <div class="">
                    <input type="text" name="username" class="w-full bg-transparent text-white border-b-[1px] border-white px-2 py-4 focus:border-blue-500 outline-none placeholder:text-lg" placeholder="Username/Email" autocomplete="off" required>
                </div>
                <div class="">
                    <input type="password" name="password" class="w-full bg-transparent text-white border-b-[1px] border-white px-2 py-4  focus:border-blue-500 outline-none placeholder:text-lg" placeholder="Password" autocomplete="off" required>
                </div>
                <div class="flex">
                    <button type="submit" class="bg-blue-700 rounded-lg px-4 py-2 font-semibold w-full">Login</button>
                </div>
            </form>
            <span class="text-sm mt-5 text-gray-400">Belum Memiliki Akun? <a class="text-blue-400" href="{{route('register.view')}}">Register</a></span>
        </div>
    </div>
@endsection