<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/utils.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    {{-- DATATABLE --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('js/moment.min.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="icon" href="{{ asset('img/ico.png') }}" type="image/x-icon">
    <style>
        .dataTables_length{
                visibility: hidden;
        }

    </style>
    <title>{{$session['username']}} - Monitor Order </title>
</head>

<body class=" bg-slate-50 flex flex-row">
    @if($session['status']==='Administrator')
        @include('admin/globals/sidebar')
    @elseif($session['status']==='Desainer')
        @include('desainer/globals/sidebar_desainer')
    @elseif($session['status']==='Setting')
        @include('setting/globals/sidebar_setting')
    @elseif($session['status']==='Operator')
        @include('operator/globals/sidebar_operator')
    @endif
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
                        <div id="table_data_monitor" class="py-4 hidden  w-full overflow-x-scroll scrollbar-thin scrollbar-thumb-slate-400 text-sm">
                           <div class="w-full my-4 flex flex-row items-center border-b">
                                <a href="#" class="px-4 py-3 border-b-2  border-blue-700 bg-blue-50 rounded-t-xl">
                                    Ecommerce
                                </a>
                                <a href="#" class="px-4 py-3 ">
                                    Non Ecommerce
                                </a>
                           </div>
                            <table id="data_monitor" class="cell-border w-full nowrap text-left mt-4 " style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th><th>Waktu Order</th><th>Pengorder</th><th>Qty</th><th>Nama File</th><th>Diinput Oleh</th><th>Status</th><th>Disetting Oleh</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
</body>

<script src="{{ asset('js/header.js') }}"></script>
<script src="{{ asset('js/monitor.js') }}"></script>


</html>

