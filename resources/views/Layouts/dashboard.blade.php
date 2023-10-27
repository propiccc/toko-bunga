<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript"src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{env('VITE_MIDRANS_CLIENT_KEY')}}"></script>
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
</head>
<body>
    <div class="bg-black scrollbar-none flex overflow-scroll min-h-screen max-h-screen">
        {{-- Menu Start --}}
        <div class="bg-white w-[350px] flex flex-col">
            <a href="{{'/'}}" class="bg-white h-[70px] text-3xl font-semibold flex items-center justify-center">
                My<span class="text-red-600">Flowers</span>
            </a>
            <div class="bg-gray-100 flex flex-col h-full overflow-scroll scrollbar-none px-3 py-5 gap-y-2 text-white">
                @if (auth()->user()->role == 'admin')   
                    <a href="{{route('dashboard.admin')}}" class="w-full  min-h-[50px] flex items-center justify-center font-semibold text-xl rounded-md cursor-pointer {{request()->path() == 'dashboard' ? 'bg-blue-800' : 'bg-transparent text-black'}}">Dashboard</a>
                    <a href="{{route('user.index')}}" class="w-full  min-h-[50px] flex items-center justify-center font-semibold text-xl rounded-md cursor-pointer {{request()->path() == 'dashboard/user' || request()->path() == 'dashboard/user/create' || Request::is('dashboard/user/*/edit')  || request()->path() == 'dashboard/user/search' ? 'bg-blue-800' : 'bg-transparent text-black'}}">User</a>
                    <a href="{{route('bunga.index')}}" class="w-full  min-h-[50px] flex items-center justify-center font-semibold text-xl rounded-md cursor-pointer {{request()->path() == 'dashboard/bunga' || request()->path() == 'dashboard/bunga/create' || Request::is('dashboard/bunga/*/edit')  || request()->path() == 'dashboard/bunga/search' ? 'bg-blue-800' : 'bg-transparent text-black'}}">Bunga</a>
                    <a href="{{route('pemesanan.index')}}" class="w-full  min-h-[50px] flex items-center justify-center font-semibold text-xl rounded-md cursor-pointer {{request()->path() == 'dashboard/pemesanan' || request()->path() == 'dashboard/pemesanan/create' || Request::is('dashboard/pemesanan/*/edit')  || request()->path() == 'dashboard/pemesanan/search' ? 'bg-blue-800' : 'bg-transparent text-black'}}">Pemesanan</a>
                
                @elseif (auth()->user()->role == 'customer')    
                    <a href="{{route('dashboard.customer')}}" class="w-full  min-h-[50px] flex items-center justify-center font-semibold text-xl rounded-md cursor-pointer {{request()->path() == 'customer/dashboard' ? 'bg-blue-800' : 'bg-transparent text-black'}}">Dashboard</a>
                    <a href="{{route('payment.detail')}}" class="w-full  min-h-[50px] flex items-center justify-center font-semibold text-xl rounded-md cursor-pointer {{request()->path() == 'customer/payment' ? 'bg-blue-800' : 'bg-transparent text-black'}}">Pemesanan</a>
                @endif
                
            </div>
        </div>
        {{-- Menu End --}}
        {{-- Container Content Start --}}
        <div class="bg-gray-200 w-full flex flex-col">
            {{-- Navbar Start --}}
             <div class="bg-white h-[70px] flex items-center justify-end px-5 gap-x-2">
                <a href="{{route('home')}}" class="font-semibold text-lg hover:text-black text-gray-500">Home</a>
                <a href="{{route('logout')}}" class="font-semibold text-lg hover:text-black text-gray-500">Logout</a>
             </div>
            {{-- Navbar End --}}
            <div class="bg-gray-300 h-full p-10 overflow-hidden">
                <div class="bg-transparent max-h-full p-1 overflow-scroll scrollbar-none">
                    @yield('content')
                </div>
            </div>
        </div>
        {{-- Container Content Start --}}
    </div>
</body>
<style>
    .scrollbar-none::-webkit-scrollbar {
        display: none;
    }
</style>
</html>