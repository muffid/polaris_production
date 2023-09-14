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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

    <link rel="icon" href="{{ asset('img/ico.png') }}" type="image/x-icon">
    <title>Polaris Adv - Dashboard</title>
</head>

<body class=" bg-slate-50 relative font-nunito ">

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
                            <img src="{{ asset('img/performance.png') }}" alt="logo" class=" w-8 ">
                            <div class="flex flex-col p-2 items-start ">
                                <h1 class="text-lg font-bold text-emerald-900">Data Order Ecommerce</h1>
                                <p class="text-sm text-slate-400">Data inputan anda </p>
                            </div>
                        </div>
                        <div class="flex items-center justify-between bg-white rounded p-4">
                            <div id="loader" class="flex flex-col items-center justify-center w-full gap-y-4">
                                <svg class="w-10 h-10 animate-spin  right-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                    <path d="M12 6V2M12 22v-4M4.929 4.929l2.122 2.121M16.95 16.95l2.122 2.121M2 12h4M18 12h4M4.929 19.071l2.122-2.121M16.95 7.05l2.122-2.121" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                  </svg>
                                loading data...
                            </div>
                            <div id="table_data_ecomm" class="hidden w-full overflow-x-scroll scrollbar-thin scrollbar-thumb-slate-400 text-xs">
                                <table id="data_ecomm" class="cell-border w-full display nowrap text-left text-xs" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Aksi</th><th>No Urut</th><th>Tanggal Order</th><th>Tanggal Input</th>
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
