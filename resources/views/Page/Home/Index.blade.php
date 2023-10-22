@extends('Layouts.default')

@section('title')
MyFlowers | Home
@endsection
@section('content')
{{-- Header start --}}
<div class="flex min-h-[600px] justify-center p-8 bg-black" id="about">
    <div class="bg-black  p-4 w-1/2 text-white">
        <span class="text-white font-extrabold text-4xl">
            Selamat Datang di Toko Bunga Kami
        </span>
        <p class="text-lg font-semibold mt-2">
            Toko ini menawarkan beragam bunga segar dan indah yang cocok untuk berbagai acara, mulai dari buket bunga mawar klasik hingga bunga potong eksotis dan tanaman hias. Mereka juga memiliki bunga musiman yang selalu segar dan siap untuk diambil.
            Toko Bunga MyFlowers dikenal karena desain kreatif dan unik yang mereka tawarkan. Anda dapat meminta buket bunga kustom atau dekorasi bunga yang sesuai dengan tema acara Anda.
            Toko ini menawarkan bunga dengan harga yang terjangkau, sehingga siapa pun dapat menikmati keindahan bunga segar tanpa merusak anggaran.
            Tim di toko ini sangat peduli terhadap kebutuhan pelanggan mereka. Mereka siap memberikan saran tentang pemilihan bunga terbaik dan mengaturnya sesuai dengan keinginan Anda.
        </p>
        <button class="px-6 border-[2px] border-white py-3 mt-10 rounded-md hover:bg-white hover:text-black transition-all duration-300 active:scale-95">Lihat Produk</button>
    </div>       
    <div class="w-1/2 h-full bg-black flex justify-center p-4">
        <img class="rounded-lg" src="https://piknikwisata.com/wp-content/uploads/2019/11/wisata-Taman-Bunga-Cihideung-e1573206337496.jpg" alt="header">
    </div>   
</div>
{{-- Header start --}}
{{-- Produk start --}}
    <div class="bg-gray-800 min-h-screen flex flex-col p-10">
        <div class="p-2">
            <span class="text-4xl font-extrabold text-white">            
                Berbagai Produk Kami
            </span>
            <div class="bg-white h-[2px] w-full mt-2"></div>
        </div>
        <div class="flex flex-wrap {{count($products) > 5 ? 'justify-center' : 'justify-start'}}">
            @if (count($products) != 0)
                @foreach ($products as $item )
                <a href="{{route('product.detail',['uuid' => $item->uuid])}}" class="p-4">
                    <div class=" bg-gray-100 hover:bg-gray-200 hover:cursor-pointer min-h-[400px] min-w-[300px] max-w-[300px] max-h-[400px] rounded-lg border-[2px] border-black flex flex-col">
                        <div class="bg-white h-[200px] rounded-t-md border-b-[2px] border-black">
                            <img class="rounded-t-md object-fill h-[200px] w-[300px]" src="https://tokobungamurah.com/wp-content/uploads/2020/12/bunga-papan-selamat-berbahagia-atas-pernikahan-ananda-harga-500-ribu-akuntansi-universitas-andalas-padang.jpg" alt="">
                        </div>
                        <div class="bg-transparent h-[200px] rounded-b-md flex flex-col p-2">
                            <span class="text-md font-semibold flex max-h-[45px] overflow-hidden">Bunga Papan Ucapan Selamat</span>
                            <span class="text-blue-700 font-semibold">Rp 1.000.000</span>
                            <span class="text-sm text-yellow-600">Tipe Bunga : Bunga Papan</span>
                            <span class="text-sm max-h-[100px] overflow-hidden">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro cupiditate molestiae eligendi consequuntur libero iure voluptatibus temporibus neque mollitia, rem suscipit, sapiente alias tempore, saepe enim id maiores totam. Consectetur eveniet quo error minus harum eligendi aperiam nihil nisi, omnis laboriosam molestiae aliquid, commodi at aut incidunt, nobis dolore! Earum nam sapiente nobis iure placeat veniam quas deleniti officia laboriosam, provident neque id aliquam impedit rerum nostrum? Fuga harum cum facere quae voluptas illum nulla? Commodi ipsa quae magni est expedita quidem ratione, tempore odio beatae ullam totam laborum, temporibus error necessitatibus doloremque eligendi soluta saepe consequatur perspiciatis assumenda. Nemo!
                            </span>
                        </div>
                    </div>
                </a>
                @endforeach
            
            @else
                <span class="text-black text-xl">No Product In Here</span>
            @endif
        </div>
        
    </div>
{{-- Produk end --}}

<footer class="bg-white shadow dark:bg-gray-900">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="/" class="flex items-center mb-4 sm:mb-0">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">MyFlowers</span>
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                <li>
                    <a href="/" class="mr-4 hover:underline md:mr-6 ">Home</a>
                </li>
                <li>
                    <a href="#about" class="mr-4 hover:underline md:mr-6 ">About</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="/" class="hover:underline">MyFlowers</a></span>
    </div>
</footer>


@endsection