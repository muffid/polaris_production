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

    @include('admin.globals.sidebar')
        <main id="main" class=" w-full">
            <div class="flex flex-row justify-between w-full">
                <div class="flex flex-col w-full">
                    {{-- main --}}
                    <div class="flex flex-col items-start justify-start">
                        {{-- performa --}}
                        @include('template/header')
                            <div class="flex flex-col p-6 text-center w-full gap-y-4 mt-14">
                                <div class="flex flex-row items-center gap-x-4">
                                    <img src="{{ asset('img/performance.png') }}" alt="logo" class=" w-8 ">
                                    <div class="flex flex-col p-2 items-start ">
                                        <h1 class="text-lg font-bold text-emerald-900">Performa Realtime</h1>
                                        <p class="text-sm text-slate-400">Performa dihitung harian</p>
                                    </div>
                                </div>
                             
                                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 p-6 rounded-lg gap-6 bg-white  relative ">
                                    <div class="hidden absolute inset-0 lg:flex items-center justify-center">
                                        <div class="w-72 h-72 rounded-full  bg-slate-50"></div>
                                    </div>
                                    <div class="flex flex-row items-center  mx-auto">
                                        <img src="{{ asset('img/box.png') }}" alt="logo" class=" w-12">
                                        <div class="flex flex-col items-start justify-center p-6">
                                            <h1 class=" font-bold text-center">Total Order</h1>
                                            <div class="flex flex-row items-center justify-center gap-x-2">
                                                <h1 class="  text-emerald-500  font-extrabold text-4xl  py-2">102</h1>
                                                <p class=" text-emerald-500  text-xs">12 %</p>
                                                <div class="flex flex-col items-center justify-center p-2 w-5 h-5 rounded-full">
                                                    <i class="bi bi-caret-up-fill text-xs text-emerald-500"></i>
                                                </div>
                                            </div>
                                            <p class="text-xs text-slate-400">data hari ini</p>
                                        </div>
                                    </div>

                                    <div class="flex flex-row items-center  mx-auto">
                                        <img src="{{ asset('img/people.png') }}" alt="logo" class=" w-12">
                                        <div class="flex flex-col items-start justify-center p-6">
                                            <h1 class=" font-bold text-center">Total Pembeli</h1>
                                            <div class="flex flex-row items-center justify-center gap-x-2">
                                                <h1 class="  text-emerald-500  font-extrabold text-4xl  py-2">56</h1>
                                                <p class=" text-emerald-500  text-xs">12 %</p>
                                                <div class="flex flex-col items-center justify-center p-2 w-5 h-5 rounded-full">
                                                    <i class="bi bi-caret-up-fill text-xs text-emerald-500"></i>
                                                </div>
                                            </div>
                                            <p class="text-xs text-slate-400">data hari ini</p>
                                        </div>
                                    </div>

                                    <div class="flex flex-row items-center justify-center z-10 mx-auto">
                                        <canvas id="myChart" class="w-40 h-40"></canvas>
                                    </div>

                                    <div class="flex flex-row items-center  mx-auto">
                                        <img src="{{ asset('img/user (1).png') }}" alt="logo" class=" w-12">
                                        <div class="flex flex-col items-start justify-center p-6">
                                            <h1 class=" font-bold text-center">Pembeli Baru</h1>
                                            <div class="flex flex-row items-center justify-center gap-x-2">
                                                <h1 class="  text-emerald-500  font-extrabold text-4xl  py-2">5</h1>
                                                <p class=" text-emerald-500  text-xs">12 %</p>
                                                <div class="flex flex-col items-center justify-center p-2 w-5 h-5 rounded-full">
                                                    <i class="bi bi-caret-up-fill text-xs text-emerald-500"></i>
                                                </div>
                                            </div>
                                            <p class="text-xs text-slate-400">data hari ini</p>
                                        </div>
                                    </div>

                                    
                                    <div class="flex flex-row items-center  mx-auto">
                                        <img src="{{ asset('img/win.png') }}" alt="logo" class=" w-12">
                                        <div class="flex flex-col items-start justify-center p-6">
                                            <h1 class=" font-bold text-center lg:text-left">Pembeli Berulang</h1>
                                            <div class="flex flex-row items-center justify-center gap-x-2">
                                                <h1 class="  text-emerald-500  font-extrabold text-4xl  py-2">34</h1>
                                                <p class=" text-emerald-500  text-xs">12 %</p>
                                                <div class="flex flex-col items-center justify-center p-2 w-5 h-5 rounded-full">
                                                    <i class="bi bi-caret-up-fill text-xs text-emerald-500"></i>
                                                </div>
                                            </div>
                                            <p class="text-xs text-slate-400">data hari ini</p>
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
<script>
    // Generate random data
    var pembeliBaru = 5;
    var pembeliBerulang = 34;

    // Create doughnut chart
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Pembeli Baru', 'Pembeli Berulang'],
        datasets: [{
          label: 'Jumlah Pembeli',
          data: [pembeliBaru, pembeliBerulang],
          backgroundColor: [
        'rgba(255, 165, 0, 0.6)', // Warna oranye
        'rgba(0, 0, 255, 0.6)' // Warna biru
      ]
    
        }]
      },
      options: {
    responsive: true,
    cutoutPercentage: 10,
    plugins: {
      legend: {
        display:false,
        position:'bottom',
        title: {
          fontSize: 12 // Ukuran font yang lebih kecil
        }
      }
    }
  }
    });
  </script>

</html>