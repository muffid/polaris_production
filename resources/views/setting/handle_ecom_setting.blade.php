<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/utils.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/iziToast.min.css')}}">
    <script src="{{asset('js/iziToast.min.js')}}" type="text/javascript"></script>
    <link rel="icon" href="{{ asset('img/ico.png') }}" type="image/x-icon">
    <title>Polaris Adv - Dashboard</title>
       <script src="{{asset('js/moment.min.js')}}" type="text/javascript"></script>
</head>

<body class=" bg-slate-100 relative font-nunito ">

    @include('setting.globals.sidebar_setting')
        <main id="main" class=" w-full">
            <div class="flex flex-row justify-between w-full">
                <div class="flex flex-col w-full">
                    {{-- main --}}
                    <div class="flex flex-col items-start justify-start">

                        @include('template/header')

                    </div>

                    <div class="mt-24 flex flex-col w-full px-8 gap-x-4">
                        <div class="flex flex-row items-center gap-x-4 mt-2">
                           <img src="{{ asset('img/online-shop.png') }}" alt="logo" class=" w-8 ">
                            <div class="flex flex-col p-2 items-start ">
                                <h1 class="text-lg font-bold text-emerald-900">Order Ecommerce Masuk</h1>
                                <p class="text-sm text-slate-400">Mulai Kerjakan Setting Order</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-between bg-white rounded p-4">
                            <div id="loader" class="flex flex-col items-center justify-center w-full gap-y-4">

                                  <div class="spinner-3"></div>
                                  <h1 class="font-semibold text-teal-600">Loading Data</h1>
                            </div>
                            <div id="table_data_ecomm" class="py-4 hidden w-full overflow-x-scroll scrollbar-thin scrollbar-thumb-slate-400 text-sm">
                               <div class="w-full my-4 flex flex-row items-center border-b">
                                    <a href="#" class="px-4 py-3 border-b-2  border-blue-700 bg-blue-50 rounded-t-xl">
                                        Ecommerce
                                    </a>
                                    <a href="#" class="px-4 py-3 ">
                                        Non Ecommerce
                                    </a>
                               </div>
                                <table id="data_ecomm" class="cell-border w-full display nowrap text-left " style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Aksi</th><th>Tanggal Order</th><th>Pengorder</th><th>Keterangan Order</th>
                                                <th>Nama File</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
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
    <script src="{{ asset('js/handle_ecomm_setting.js') }}"></script>


</html>
