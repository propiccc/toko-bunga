{{-- Navbar Start --}}
<div class="bg-gray-300 flex justify-between items-center px-4 py-2">
    <span class="text-xl font-semibold ">My<span class="text-red-600">Flowers</span></span>
    @if (auth()->check())
        @if (auth()->user()->role == 'admin')
        <div class="flex gap-x-3">
            <a href="{{route('home')}}" class="text-lg py-3 font-semibold">Home</a>
            <a href="{{route('payment.detail')}}" class="text-lg py-3 font-semibold">Pesanan</a>
            <a href="{{route('dashboard.admin')}}" class="text-lg py-3 font-semibold">Dashboard</a>
            <a href="{{route('logout')}}" class="text-lg py-3 font-semibold">Logout</a>
        </div>
        @else 
        <div class="flex gap-x-3">
            <a href="{{route('home')}}" class="text-lg py-3 font-semibold">Home</a>
            <a href="{{route('payment.detail')}}" class="text-lg py-3 font-semibold">Pesanan</a>
            <a href="{{route('logout')}}" class="text-lg py-3 font-semibold">Logout</a>
        </div>
        @endif
    @else
        <div class="flex gap-x-2">
            <a href="{{route('home')}}" class="text-lg p-3 font-semibold {{request()->path() == '/' ? 'border-b-[2px] border-black' : 'null'}}">Home</a>
            <a href="{{route('login.view')}}" class="text-lg p-3 font-semibold {{request()->path() == 'login' ? 'border-b-[2px] border-black' : 'null'}}">Login</a>
            <a href="{{route('register.view')}}" class="text-lg p-3 font-semibold {{request()->path() == 'register' ? 'border-b-[2px] border-black' : 'null'}}">Register</a>
        </div>
    @endif
</div>
{{-- Navbar End --}}