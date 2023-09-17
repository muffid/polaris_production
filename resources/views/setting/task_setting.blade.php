<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="{{asset('css/iziToast.min.css')}}">
    <script src="{{asset('js/iziToast.min.js')}}" type="text/javascript"></script>

    <link rel="icon" href="{{ asset('img/ico.png') }}" type="image/x-icon">
    <title>Polaris Adv - Dashboard</title>

    <script src="{{asset('js/moment.min.js')}}" type="text/javascript"></script>

    <style>
        #data_ecomm {
            border: none !important;
        }
        .spinner-3 {
            width: 50px;
            padding: 6px;
            aspect-ratio: 1;
            border-radius: 50%;
            background: #25b09b;
            --_m:
                conic-gradient(#0000 10%,#000),
                linear-gradient(#000 0 0) content-box;
            -webkit-mask: var(--_m);
                    mask: var(--_m);
            -webkit-mask-composite: source-out;
                    mask-composite: subtract;
            animation: s3 1s infinite linear;
        }
        .spinner-4 {
            width: 20px;
            padding: 2px;
            aspect-ratio: 1;
            border-radius: 50%;
            background: #25b09b;
            --_m:
                conic-gradient(#0000 10%,#000),
                linear-gradient(#000 0 0) content-box;
            -webkit-mask: var(--_m);
                    mask: var(--_m);
            -webkit-mask-composite: source-out;
                    mask-composite: subtract;
            animation: s3 1s infinite linear;
        }
        @keyframes s3 {to{transform: rotate(1turn)}}
    </style>
</head>

<body class=" bg-slate-100 relative font-nunito ">

    @include('setting.globals.sidebar_setting')
        <main id="main" class=" w-full">
            <div class="flex flex-row justify-between w-full">
                <div class="flex flex-col w-full">
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
                        <div class="flex w-full items-center justify-between bg-white rounded p-4">

                            <div id="loader" class="hidden flex-col items-center justify-center w-full gap-y-4">

                                <div class="spinner-3"></div>
                                <h1 class="font-semibold text-teal-600">Loading Data</h1>
                          </div>
                          <div id="table_task_container" class=" w-full overflow-x-scroll scrollbar-thin scrollbar-thumb-slate-400 text-xs">
                              <table id="table_task_ecomm" class="cell-border w-full display nowrap text-left text-[0.8rem]" style="width:100%">
                                      <thead>
                                          <tr>
                                              <th>Aksi</th><th>No Urut</th><th>Durasi</th>
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
            </div>
        </main>
    </body>

    <script src="{{ asset('js/header.js') }}"></script>
    <script src="{{ asset('js/task_setting.js') }}"></script>
</html>
