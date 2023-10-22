@extends('Layouts.default')
@section('title')
    MyFlowers | Pesan Bunga
@endsection
@section('content')
<div class="bg-black flex justify-center overflow-hidden">
    <div class="bg-white h-[calc(100vh-52px)] w-[800px] flex flex-col p-4">
        <span class="text-xl font-semibold">Item :</span>
        <div class="h-[1px] bg-black w-full my-5"></div>
        <div class="bg-gray-200 flex p-1 rounded-lg">
            <img src="{{$item->imagedir}}" class="rounded-lg h-[140px] w-[190px] object-contain" alt="">
            <div class="flex flex-col w-full p-2">
                <span class="w-full font-semibold text-black">{{$item->name}}</span>
                <span class="w-full">
                    <span class="">Rp </span>{{number_format($item->harga, 0, ',', '.')}}/Item
                </span>
                <span class="w-full">
                    Tipe Bunga: {{$item->tipe == 'bucket' ? 'Bunga Bucket' : 'Bunga Papan'}}
                </span>
            </div>
        </div>
        <div class="h-[1px] bg-black w-full mt-2"></div>
        <span class="text-xl font-semibold my-2">Detail Pemesan :</span>
        <div class="h-[1px] bg-black w-full mb-2"></div>
        <div class="flex flex-col">
            <span class="font-semibold text-xl">Nama : </span>
            <span>{{ auth()->user()->name}}</span>
            <span class="font-semibold text-xl">Email : </span>
            <span>{{ auth()->user()->email}}</span>
            <span class="font-semibold text-xl">Alamat : </span>
            <p>{{$detail['alamat']}}</p>
            <span class="font-semibold text-xl">No Telp : </span>
            <p>{{$detail['no_telp']}}</p>
            <span class="font-semibold text-xl">Pesan : </span>
            <p>{{$detail['pesan']}}</p>
        </div>
        <div class="bg-transparent h-full flex items-end justify-center p-2" >
            <button id="pay-button" class="w-full bg-blue-800 rounded-lg py-2 text-xl font-semibold text-white transition-all duration-500 active:scale-95">Bayar</button>
        </div>
    </div>
</div>
<script>
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        var token = {!! json_encode($token) !!};
        window.snap.pay(token, {
            onSuccess: function(result){
                fetch("{{ route('pemesanan.set',['uuid' => $item->uuid]) }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ token: {!! json_encode($token) !!}, alamat: '{{$detail["alamat"]}}',description: '{{$detail["pesan"]}}'  })
                })
                .then(response => response.json())
                .then(data => {
                if(data.success === true){
                    setTimeout(() => {
                        window.location.href = "{{ route('home') }}";
                    }, 500);
                } else {
                    alert('Someting Worng In Server !!!');
                }
            });
            },
        });
      },);
</script>
@endsection
