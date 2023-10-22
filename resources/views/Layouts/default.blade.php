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
    <body class="scrollbar-none">
        @include('Components.Navbar')
        @yield('content')
    </body>
    <style>
    .scrollbar-none::-webkit-scrollbar {
        display: none;
    }
    </style>
</html>