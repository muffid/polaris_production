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
                            <div class="flex flex-col p-6 text-center w-full gap-y-4 mt-14">
                                <div class="flex flex-col  text-center w-full gap-y-4 mt-14">
                                    <div class="flex flex-row items-center gap-x-4">
                                        <img src="{{ asset('img/performance.png') }}" alt="logo" class=" w-8 ">
                                        <div class="flex flex-col p-2 items-start ">
                                            <h1 class="text-lg font-bold text-emerald-900">Performa Realtime</h1>
                                            <p class="text-sm text-slate-400">Performa dihitung harian</p>
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