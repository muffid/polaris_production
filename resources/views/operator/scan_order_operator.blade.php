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

                        <div class="mt-28 grid grid-cols-1 w-full lg:w-1/4 px-8 gap-x-4">
                            <div class="flex flex-row items-center gap-x-4 mt-2">
                                <img src="{{ asset('img/scanner.png') }}" alt="logo" class=" w-8 ">
                                 <div class="flex flex-col p-2 items-start ">
                                     <h1 class="text-lg font-bold text-emerald-900">Scan Order</h1>
                                     <p class="text-sm text-slate-400">Scan no resi yang ada di paket order</p>
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
