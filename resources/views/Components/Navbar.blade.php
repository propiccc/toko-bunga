{{-- Navbar Start --}}
<div class="bg-gray-300 flex justify-between items-center px-4">
    <span class="text-xl font-semibold ">My<span class="text-red-600">Flowers</span></span>
    <div class="flex gap-x-2">
        <a href="/" class="text-lg p-3 font-semibold {{request()->path() == '/' ? 'border-b-[2px] border-black' : 'null'}}">Home</a>
        <a href="/login" class="text-lg p-3 font-semibold {{request()->path() == 'login' ? 'border-b-[2px] border-black' : 'null'}}">login</a>
        <a href="/register" class="text-lg p-3 font-semibold {{request()->path() == 'register' ? 'border-b-[2px] border-black' : 'null'}}">Register</a>
    </div>
</div>
{{-- Navbar End --}}