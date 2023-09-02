<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link rel="icon" href="{{ asset('img/ico.png') }}" type="image/x-icon">
    <title>Polaris Adv - Dashboard</title>
</head>

<body class=" bg-slate-50 relative font-nunito ">

    @include('desainer.globals.sidebar_desainer')
        <main id="main" class=" w-full">
            <div class="flex flex-row justify-between w-full">
                <div class="flex flex-col w-full">
                    {{-- main --}}
                    <div class="flex flex-col items-start justify-start">
                        {{-- performa --}}
                        @include('template/header')

                        </div>

                        <div class="mt-28 grid grid-cols-1 lg:grid-cols-2 w-full px-8 gap-x-4">

                            <div class="grid grid-cols-2 w-full gap-4">

                                <div class="flex bg-white px-6 py-4 rounded border border-slate-200 flex-row justify-between items-center gap-x-2">

                                    <img src="{{ asset('img/box.png') }}" alt="logo" class="w-8 lg:w-12">

                                    <div class="flex flex-col items-start justify-between gap-y-3">

                                        <h1 class=" lg:text-lg">Total Order</h1>

                                        <div class="flex flex-row items-center gap-x-2">

                                            <h1 class="text-xl lg:text-3xl ">102</h1>

                                            <p class="text-sm text-slate-400">12%</p>

                                            <i class="bi bi-caret-up-fill text-xs text-emerald-500"></i>

                                        </div>

                                        <h1 class="text-sm text-slate-500">Data hari ini</h1>

                                    </div>

                                    <div>

                                    </div>

                                </div>

                                <div class="flex bg-white px-6 py-4 rounded border border-slate-200 flex-row justify-between items-center gap-x-2">

                                    <img src="{{ asset('img/people.png') }}" alt="logo" class="w-8 lg:w-12">

                                    <div class="flex flex-col items-start justify-between gap-y-3">

                                        <h1 class=" lg:text-lg">Total Pembeli</h1>

                                        <div class="flex flex-row items-center gap-x-2">

                                            <h1 class="text-xl lg:text-3xl ">23</h1>

                                            <p class="text-sm text-slate-400">23%</p>

                                            <i class="bi bi-caret-up-fill text-xs text-emerald-500"></i>

                                        </div>

                                        <h1 class="text-sm text-slate-500">Data hari ini</h1>

                                    </div>

                                    <div>

                                    </div>

                                </div>

                                <div class="flex bg-white px-6 py-4 rounded border border-slate-200 flex-row justify-between items-center gap-x-2">

                                    <img src="{{ asset('img/user (1).png') }}" alt="logo" class="w-8 lg:w-12">

                                    <div class="flex flex-col items-start justify-between gap-y-3">

                                        <h1 class=" lg:text-lg">Pembeli Baru</h1>

                                        <div class="flex flex-row items-center gap-x-2">

                                            <h1 class="text-xl lg:text-3xl ">23</h1>

                                            <p class="text-sm text-slate-400">23%</p>

                                            <i class="bi bi-caret-up-fill text-xs text-emerald-500"></i>

                                        </div>

                                        <h1 class="text-sm text-slate-500">Data hari ini</h1>

                                    </div>

                                    <div>

                                    </div>

                                </div>

                                <div class="flex bg-white px-6 py-4 rounded border border-slate-200 flex-row justify-between items-center gap-x-2">

                                    <img src="{{ asset('img/win.png') }}" alt="logo" class="w-8 lg:w-12">

                                    <div class="flex flex-col items-start justify-between gap-y-3">

                                        <h1 class=" lg:text-lg">Pembeli Berulang</h1>

                                        <div class="flex flex-row items-center gap-x-2">

                                            <h1 class="text-xl lg:text-3xl ">23</h1>

                                            <p class="text-sm text-slate-400">23%</p>

                                            <i class="bi bi-caret-up-fill text-xs text-emerald-500"></i>

                                        </div>

                                        <h1 class="text-sm text-slate-500">Data hari ini</h1>

                                    </div>

                                    <div>

                                    </div>

                                </div>

                            </div>

                            <div class="w-full grid grid-cols-1 gap-4 mt-4 lg:mt-0">

                                <div class="w-full bg-white px-6 py-4 flex border border-slate-200 rounded flex-row items-center justify-between gap-x-6">

                                    <div class="flex flex-row items-center gap-x-8">

                                        <img src="{{ asset('img/box.png') }}" alt="logo" class="w-8 lg:w-8">

                                        <h1 class="">Total Order</h1>

                                    </div>

                                    <div class="flex flex-row items-center gap-x-2">

                                        <h1 class="text-xl lg:text-3xl ">23</h1>

                                        <p class="text-sm text-slate-400">23%</p>

                                        <i class="bi bi-caret-up-fill text-xs text-emerald-500"></i>

                                    </div>

                                </div>

                                <div class="w-full bg-white px-6 py-4 border border-slate-200 flex flex-row items-center justify-between gap-x-6">

                                    <div class="flex flex-row items-center gap-x-8">

                                        <img src="{{ asset('img/smartphone.png') }}" alt="logo" class="w-8 lg:w-8">

                                        <h1 class="">Order Online</h1>

                                    </div>

                                    <div class="flex flex-row items-center gap-x-2">

                                        <h1 class="text-xl lg:text-3xl ">23</h1>

                                        <p class="text-sm text-slate-400">23%</p>

                                        <i class="bi bi-caret-up-fill text-xs text-emerald-500"></i>

                                    </div>

                                </div>

                                <div class="w-full bg-white px-6 py-4 flex flex-row border border-slate-200 rounded items-center justify-between gap-x-6">

                                    <div class="flex flex-row items-center gap-x-8">

                                        <img src="{{ asset('img/online-shopping.png') }}" alt="logo" class="w-8 lg:w-8">

                                        <h1 class="">Order Offline</h1>

                                    </div>

                                    <div class="flex flex-row items-center gap-x-2">

                                        <h1 class="text-xl lg:text-3xl ">23</h1>

                                        <p class="text-sm text-slate-400">23%</p>

                                        <i class="bi bi-caret-up-fill text-xs text-emerald-500"></i>

                                    </div>

                                </div>
                                <div class="w-full bg-white px-6 py-4 flex flex-row border border-slate-200 rounded items-center justify-between gap-x-6">

                                    <div class="flex flex-row items-center gap-x-8">

                                        <img src="{{ asset('img/online-shop.png') }}" alt="logo" class="w-8 lg:w-8">

                                        <h1 class="">Order Ecommerce</h1>

                                    </div>

                                    <div class="flex flex-row items-center gap-x-2">

                                        <h1 class="text-xl lg:text-3xl ">23</h1>

                                        <p class="text-sm text-slate-400">23%</p>

                                        <i class="bi bi-caret-up-fill text-xs text-emerald-500"></i>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="grid grid-cols-1 xl:grid-cols-2 w-full mt-10">
                            <div class="flex flex-col items-start px-4 w-full">
                                <div class="flex flex-row items-center gap-x-4 px-4">
                                    <img src="{{ asset('img/online-shop.png') }}" alt="logo" class=" w-8 ">
                                    <div class="flex flex-col items-start p-2 ">
                                        <h1 class="text-lg  text-emerald-900">Order Ecommerce</h1>
                                        <p class="text-sm text-slate-400">Performa dihitung harian</p>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 md:grid-cols-2 gap-2  p-8 md:gap-8  lg:px-4 w-full   ">
                                        <div class="flex flex-row items-center bg-white border p-6 rounded-lg gap-4  hover:scale-105 transition-transform ease-out">

                                                <img src="{{ asset('img/finnish.png') }}" alt="logo" class="w-5 md:w-6">

                                            <div class="flex flex-col items-start justify-between ">
                                                <h1 class="lg:text-xl font-bold text-emerald-900">41 Order</h1>
                                                <p class="text-xs md:text-sm text-slate-400">Terselesaikan</p>
                                            </div>
                                        </div>

                                        <div class="flex flex-row  items-center bg-white border p-6 rounded-lg gap-4  hover:scale-105 transition-transform ease-out">

                                                <img src="{{ asset('img/unfinish.png') }}" alt="logo" class=" w-5 md:w-4">

                                            <div class="flex flex-col items-start justify-between">
                                                <h1 class="lg:text-xl font-bold text-emerald-900">10 Order</h1>
                                                <p class="text-xs md:text-sm text-slate-400">Belum selesai</p>
                                            </div>
                                        </div>

                                        <div class="flex flex-row items-center bg-white border p-6 rounded-lg gap-4  hover:scale-105 transition-transform ease-out">

                                                <img src="{{ asset('img/deliver.png') }}" alt="logo" class="w-5 md:w-6">

                                            <div class="flex flex-col items-start justify-between">
                                                <h1 class="lg:text-xl font-bold text-emerald-900">41 Order</h1>
                                                <p class="text-xs md:text-sm text-slate-400">Terkirim</p>
                                            </div>
                                        </div>

                                        <div class="flex flex-row items-center bg-white border p-6 rounded-lg gap-4  hover:scale-105 transition-transform ease-out">

                                                <img src="{{ asset('img/package.png') }}" alt="logo" class="w-5 md:w-6">

                                            <div class="flex flex-col items-start justify-between">
                                                <h1 class="lg:text-xl font-bold text-emerald-900">41 Order</h1>
                                                <p class="text-xs md:text-sm text-slate-400">Belum dikirm</p>
                                            </div>
                                        </div>
                                </div>
                            </div>

                            <div class="flex flex-col items-start px-4 w-full">
                                <div class="flex flex-row items-center gap-x-4 px-4">
                                    <img src="{{ asset('img/smartphone.png') }}" alt="logo" class=" w-8 ">
                                    <div class="flex flex-col items-start p-2 ">
                                        <h1 class="text-lg font-bold text-emerald-900">Order Non Ecommerce</h1>
                                        <p class="text-sm text-slate-400">Performa dihitung harian</p>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 md:grid-cols-2 gap-2  p-8 md:gap-8  lg:px-4 w-full   ">
                                        <div class="flex flex-row items-center bg-white border p-6 rounded-lg gap-4 hover:scale-105 transition-transform ease-out">

                                                <img src="{{ asset('img/finnish.png') }}" alt="logo" class="w-5 md:w-6">

                                            <div class="flex flex-col items-start justify-between ">
                                                <h1 class="lg:text-xl font-bold text-emerald-900">41 Order</h1>
                                                <p class="text-xs md:text-sm text-slate-400">Terselesaikan</p>
                                            </div>
                                        </div>

                                        <div class="flex flex-row  items-center bg-white border p-6 rounded-lg gap-4  hover:scale-105 transition-transform ease-out">

                                                <img src="{{ asset('img/unfinish.png') }}" alt="logo" class=" w-5 md:w-4">

                                            <div class="flex flex-col items-start justify-between">
                                                <h1 class="lg:text-xl font-bold text-emerald-900">10 Order</h1>
                                                <p class="text-xs md:text-sm text-slate-400">Belum selesai</p>
                                            </div>
                                        </div>

                                        <div class="flex flex-row items-center bg-white border p-6 rounded-lg gap-4  hover:scale-105 transition-transform ease-out">

                                                <img src="{{ asset('img/deliver.png') }}" alt="logo" class="w-5 md:w-6">

                                            <div class="flex flex-col items-start justify-between">
                                                <h1 class="lg:text-xl font-bold text-emerald-900">41 Order</h1>
                                                <p class="text-xs md:text-sm text-slate-400">Terkirim</p>
                                            </div>
                                        </div>

                                        <div class="flex flex-row items-center bg-white border p-6 rounded-lg gap-4  hover:scale-105 transition-transform ease-out">

                                                <img src="{{ asset('img/package.png') }}" alt="logo" class="w-5 md:w-6">

                                            <div class="flex flex-col items-start justify-between">
                                                <h1 class="lg:text-xl font-bold text-emerald-900">41 Order</h1>
                                                <p class="text-xs md:text-sm text-slate-400">Belum dikirm</p>
                                            </div>
                                        </div>
                                </div>
                            </div>

                        </div>

                </div>
                    {{-- <div class="lg:flex flex-col h-auto w-1/4 border-l hidden " >

                    </div> --}}
                  </div>
           {{-- di sini nanti footer --}}
                </div>


        </main>
</body>
<script src="{{ asset('js/header.js') }}"></script>

</html>
