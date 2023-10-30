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
    <link rel="stylesheet" href="{{asset('css/iziToast.min.css')}}">
    <script src="{{asset('js/iziToast.min.js')}}" type="text/javascript"></script>
    <link rel="icon" href="{{ asset('img/ico.png') }}" type="image/x-icon">
    <title>Polaris Adv - Dashboard</title>
</head>

<body class=" bg-slate-100 relative font-nunito ">

    @include('operator.globals.sidebar_operator')
        <main id="main" class=" w-full">
            <div class="flex flex-row justify-between w-full">
                <div class="flex flex-col w-full">
                    {{-- main --}}
                    <div class="flex flex-col items-start justify-start">
                        {{-- performa --}}
                        @include('template/header')

                        </div>

                        <div class="mt-20 grid grid-cols-1 w-full  px-8 gap-y-4">
                            <div class="flex flex-row items-center w-full lg:w-1/4 gap-x-4 mt-2">
                                <img src="{{ asset('img/scanner.png') }}" alt="logo" class=" w-8 ">
                                 <div class="flex flex-col p-2 items-start ">
                                     <h1 class="text-lg font-bold text-emerald-900">Scan Order</h1>
                                     <p class="text-sm text-slate-400">Scan no resi yang ada di paket order</p>
                                 </div>
                             </div>
                             <div class="w-5/6 mx-auto border pt-20 pb-4 px-4 rounded-lg grid grid-cols-1 gap-y-1 relative" id="containerQueue">
                                <div class="resi-div absolute top-0 bg-slate-50 w-full py-4 px-6 rounded-t-lg flex flex-row justify-between">
                                    <input placeholder="scan no resi di paket" class="appearance-none border  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="resi" type="text"  name="resi" required>
                                    <div class="flex gap-x-4 ">
                                        <h1 class="hidden  action-button px-4 py-2 rounded-xl cursor-pointer bg-green-200 text-green-700"><i class="bi bi-check-all"></i> Selesaikan Order</h1>
                                        <h1 class="px-4 py-2 rounded-xl bg-orange-200 text-orange-700 cursor-pointer remove-all"><i class="bi bi-trash"></i> Bersihkan List</h1>
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
<script src="{{ asset('js/scan_order.js') }}"></script>

</html>
