@extends('Layouts.default')

@section('title')
MyFlowers | Home
@endsection

@section('content')
    <div class="flex h-[600px] justify-center p-8 bg-black">
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
@endsection