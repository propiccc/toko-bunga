<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyFlowers | Invoice</title>
</head>
<body>
    <div class="container">
        <div class="container-invoice">
            <div class="header">MyFlowers Invoice</div>
            {{-- <div class="img-status">
                <img class="image-display" src="https://i.pinimg.com/originals/f8/48/0e/f8480ec881d606115680283d03ded8ef.jpg" alt="">
                <span class="status-text">Success</span>
            </div> --}}
            <div class="customer-detail">
                <li class="list-detail">
                    Order Id : <span class="detail-value">{{$data->order_id}}</span>
                </li>
                <li class="list-detail">Nama Pembeli : {{$data->User->name}}</li>
                <li class="list-detail">Tanggal Beli : {{$data->created}}</li>
                <li class="list-detail">Alamat Tujuan : {{$data->alamat}}</li>
                <li class="list-detail">Status : {{$data->status}}</li>
                <li class="list-detail">Pesan Customer  : {{$data->description != null ? $data->description : '-' }}</li>
            </div>
            <div class="container-table">
                <table class="table-datail">
                    <thead>
                        <tr>
                            <th>Nama Item</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$data->Product->name}}</td>
                            <td>1</td>
                            <td>Rp{{ number_format($data->Product->harga, 0, ',', '.') }}.00</td>
                        </tr>
                        <tr>
                            <th colspan="2">Total</th>
                            <td>Rp{{ number_format($data->Product->harga, 0, ',', '.') }}.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
    <style>
        body{
            margin: 0px;
        }
        li{
            text-decoration: none;
            list-style: none;
        }
        .container{
            width: 100%;
            background-color: transparents;
            display: flex;
            justify-content: center;
        }
        .container-invoice{
            height: 100vh;
            width: 100%;
            background-color: white;
            display: flex;
            flex-direction: column;
            font-family: sans-serif;
        }
        .header{
            padding: 10px;
            color: white;
            font-size: 40px;
            text-align: center;
            background: #0e1359;
        }
        .customer-detail{
            margin-top: 40px;
            display: flex;
            flex-direction: column;
            padding-left: 14px;
            font-size: 20px;
        }
        .list-detail{
            margin-bottom: 10px;
            width: 100%;
        }
        .img-status{
            margin-bottom: 30px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .image-display{
            height: 200px;
            width: 200px;
        }
        .status-text{
            font-size: 40px;
            color: rgb(16, 177, 16);
            font: bold;
        }
        .container-table{
            margin-top: 20px;
            padding: 10px;
        }
        
        table{
            border-collapse: collapse;
            margin: 0px;
            font-size: 30px;
            width: 100%;
        }
        thead{
            background-color: #0e1359;
            border-radius: 10px;
            color: white;
        }

        th,td{
            border: 1px solid;
            border-color: black;
            text-align: start;
            padding: 10px;
        }
    </style>
</html>