<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Polaris Production Management System - Dashboard Administrator</title>

    {{-- CHART --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <style>
        .highcharts-figure,
        .highcharts-data-table table {
        min-width: 360px;
        max-width: 800px;
        margin: 1em auto;
        }

        .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
        }

        .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
        }

        .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
        padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
        background: #f1f7ff;
        }
    </style>

    {{-- ICON --}}
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

</head>
<body class=" scrollbar-thin scrollbar-thumb-emerald-300 bg-[#EFEFEF] ">
       {{-- NAVABR --}}
       <div class=" w-full bg-white px-6 py-3 sticky top-0 z-10  ">
            <div class="max-w-[1700px] mx-auto flex flex-row justify-between items-center px-2">
                <div class="flex flex-row items-center gap-x-4">
                    <img src="{{ asset('img/LOGO.png') }}" alt="Deskripsi Gambar" class=" w-12">
                    <div class="flex flex-col items-start">
                        <p class="font-bold text-2xl text-[#0548A5]">Polaris <span class="font-semibold">Adv</span></p>
                        <p class=" text-sm text-slate-700">Polaris Production Management System</p>
                        <p class=" text-xs text-slate-500">App Verson V 0.0.1</p>
                    </div>
                    
                </div>
            </div>
       
     </div>
     {{-- END NABAR --}}
    <div class="max-w-[1700px] mx-auto">
        <div class="flex flex-col ">

            {{-- CONTAINER --}}
            <div class="  bg-[#EFEFEF] w-full  flex  flex-col lg:flex-row lg:gap-4 lg:p-6 gap-y-4 ">
 
                {{-- SIDEBAR --}}
                <div class="hidden lg:flex  w-full lg:w-1/4  flex-col items-center h-full gap-y-4">
                    {{-- PROFIL --}}
                    <div class="hidden lg:flex bg-white rounded-xl lg:w-full py-6  flex-col items-center h-full   space-y-5 ">
                        <div class="flex flex-col items-center gap-y-1 text-center">
                            <div class="bg-emerald-200 rounded-full w-24 h-24 my-4 flex items-center justify-center relative">
                                <img src="{{ asset('img/man.png') }}" alt="Deskripsi Gambar" class="rounded-full w-20">
                                <div class="  hover:scale-125 transition-transform ease-out bg-white rounded-full w-6 h-6 my-4 flex items-center justify-center absolute -bottom-5 right-2 cursor-pointer">
                                    <img src="{{ asset('img/pencil.png') }}" alt="Deskripsi Gambar" class="rounded-full w-4">
                                </div>
                            </div>
                            <p class="text-2xl font-bold ">John Doe</p>
                            <p class=" text-slate-500">Administrator</p>
                            <div class="flex flex-row items-center gap-x-2 cursor-pointer">
                                <i data-feather="log-out" class="text-xs w-4"></i>
                                <p class="text-sm font-semibold text-slate-600"> Log out</p>
                            </div>
                           
                        </div>
                    </div>
                    {{-- MAIN MENU --}}
                    <div class="hidden lg:flex bg-white rounded-xl lg:w-full py-6  flex-col items-start h-full max-h-screen scrollbar-none overflow-scroll sticky space-y-5 top-20 ">
                        <div class="flex flex-col w-full items-start justify-start p-4 gap-y-2 text-slate-800">
                           <div class="flex flex-row justify-start w-full p-3 rounded-xl hover:bg-emerald-50 hover:scale-105 transition-transform ease-out bg-emerald-50 items-center gap-x-4 cursor-pointer">
                            <i data-feather="home" class="text-emerald-800"></i>
                                <p class="font-semibold ">Dashboard</p>
                           </div>

                           <div class="flex flex-row justify-start w-full p-3 rounded-xl hover:bg-emerald-50 cursor-pointer hover:scale-105 transition-transform ease-out items-center gap-x-4">
                            <i data-feather="file-text" class="text-emerald-800"></i>
                                <p class="font-semibold ">Data Rekap</p>
                            </div>
                            <div class="flex flex-row justify-start w-full p-3 rounded-xl hover:bg-emerald-50 hover:scale-105 transition-transform ease-out cursor-pointer items-center gap-x-4">
                                <div class="w-8"></div>
                                <p class=" text-slate-500">Ecommerce</p>
                            </div>

                            <div class="flex flex-row justify-start w-full p-3 rounded-xl hover:bg-emerald-50 hover:scale-105 transition-transform ease-out cursor-pointer items-center gap-x-4">
                                <div class="w-8"></div>
                                <p class=" text-slate-500">Non Ecommerce</p>
                            </div>

                            <div class="flex flex-row justify-start w-full p-3 rounded-xl hover:bg-emerald-50 hover:scale-105 transition-transform ease-out cursor-pointer items-center gap-x-4">
                                <div class="w-8"></div>
                                <p class=" text-slate-500">Bahan Cetak / Laminasi</p>
                            </div>

                            <div class="flex flex-row justify-start w-full p-3 rounded-xl hover:bg-emerald-50 hover:scale-105 transition-transform ease-out cursor-pointer items-center gap-x-4">
                                <div class="w-8"></div>
                                <p class=" text-slate-500">Mesin</p>
                            </div>

                            <div class="flex flex-row justify-start w-full p-3 rounded-xl hover:bg-emerald-50 hover:scale-105 transition-transform ease-out cursor-pointer items-center gap-x-4">
                                <div class="w-8"></div>
                                <p class=" text-slate-500">Karyawan</p>
                            </div>

                            <div class="flex flex-row justify-start w-full p-3 rounded-xl hover:bg-emerald-50 hover:scale-105 transition-transform ease-out cursor-pointer items-center gap-x-4">
                                <i data-feather="monitor" class="text-emerald-800"></i>
                                <p class="font-semibold ">Monitor Order</p>
                            </div>

                            <div class="flex flex-row justify-start w-full p-3 rounded-xl hover:bg-emerald-50 hover:scale-105 transition-transform ease-out cursor-pointer items-center gap-x-4">
                                <i data-feather="hard-drive" class="text-emerald-800"></i>
                                <p class="font-semibold ">Master Data</p>
                            </div>

                            <div class="flex flex-row justify-start w-full p-3 rounded-xl hover:bg-emerald-50 hover:scale-105 transition-transform ease-out cursor-pointer items-center gap-x-4">
                                <div class="w-8"></div>
                                <p class=" text-slate-500">Bahan</p>
                            </div>

                            <div class="flex flex-row justify-start w-full p-3 rounded-xl hover:bg-emerald-50 hover:scale-105 transition-transform ease-out cursor-pointer items-center gap-x-4">
                                <div class="w-8"></div>
                                <p class=" text-slate-500">Laminasi</p>
                            </div>

                            <div class="flex flex-row justify-start w-full p-3 rounded-xl hover:bg-emerald-50 hover:scale-105 transition-transform ease-out cursor-pointer items-center gap-x-4">
                                <div class="w-8"></div>
                                <p class=" text-slate-500">Mesin</p>
                            </div>

                            <div class="flex flex-row justify-start w-full p-3 rounded-xl hover:bg-emerald-50 hover:scale-105 transition-transform ease-out cursor-pointer items-center gap-x-4">
                                <div class="w-8"></div>
                                <p class=" text-slate-500">Ekspedisi</p>
                            </div>

                            <div class="flex flex-row justify-start w-full p-3 rounded-xl hover:bg-emerald-50 hover:scale-105 transition-transform ease-out cursor-pointer items-center gap-x-4">
                                <div class="w-8"></div>
                                <p class=" text-slate-500">User</p>
                            </div>

                            <div class="flex flex-row justify-start w-full p-3 rounded-xl hover:bg-emerald-50 hover:scale-105 transition-transform ease-out cursor-pointer items-center gap-x-4">
                                <i data-feather="user" class="text-emerald-800"></i>
                                <p class="font-semibold ">Akun</p>
                            </div>


                        </div>
                    </div>
                </div>
               
                 {{-- END SIDEBAR --}}

                 {{-- MAIN CONTENT --}}
                 <div class="flex flex-col w-full lg:w-3/5 flex-grow-0 gap-y-4">
                    <div class=" w-full flex-grow-0 h-full bg-white rounded-xl p-6 shadow-slate-200 shadow-lg ">
                        <div class="">
                            <div class="flex flex-row px-4 items-end mb-4">
                                <p class="text-xl lg:text-2xl font-semibold">Total Order</p>
                                <div class="flex-grow ml-4 h-[1px] bg-slate-300"></div>
                            </div>
                            <div class="grid grid-cols-2 gap-2 px-4 lg:gap-x-4 lg:w-full md:grid-cols-3 md:gap-y-4 2xl:grid-cols-4">
                                <div class="bg-emerald-50 rounded-lg  flex flex-col items-center p-6 gap-y-2 relative cursor-pointer hover:scale-105 transition-transform ease-out">
                                    <p class="text-slate-800 text-sm font-bold text-center">Semua</p> 
                                    <div class="flex flex-row items-center justify-center gap-x-4">
                                        <img src="{{ asset('img/online-shopping.png') }}" alt="Deskripsi Gambar" class="w-12">
                                        <p class="text-emerald-600 text-2xl  font-bold">3,56 %</p> 
                                    </div>
                                    <p class="text-slate-500 text-sm ">Dari hari kemarin</p> 
                                    
                                </div>
                                <div class="bg-teal-50 rounded-lg  flex flex-col items-center p-6 gap-y-2 relative cursor-pointer hover:scale-105 transition-transform ease-out">
                                    <p class="text-slate-800 text-sm font-bold text-center">Ecommerce</p> 
                                    <div class="flex flex-row items-center justify-center gap-x-4">
                                        <img src="{{ asset('img/online-shop.png') }}" alt="Deskripsi Gambar" class="w-12">
                                        <p class="text-emerald-600 text-2xl  font-bold">7,8 %</p> 
                                    </div>
                                   
                                    <p class="text-slate-500 text-sm ">Order</p> 
                                </div>
                                <div class="bg-sky-50 rounded-lg  flex flex-col items-center p-6 gap-y-2 relative cursor-pointer hover:scale-105 transition-transform ease-out">
                                    <p class="text-slate-800 text-sm font-bold text-center">Online</p> 
                                    <div class="flex flex-row items-center justify-center gap-x-4">
                                        <img src="{{ asset('img/smartphone.png') }}" alt="Deskripsi Gambar" class="w-12">
                                        <p class="text-emerald-600 text-2xl  font-bold">3,4 %</p> 
                                    </div>
                                    <p class="text-slate-500 text-sm ">Order</p> 
                                   
                                </div>
                                <div class="bg-blue-50 rounded-lg  flex flex-col items-center p-6 gap-y-2 relative cursor-pointer hover:scale-105 transition-transform ease-out">
                                    <p class="text-slate-800 text-sm font-bold text-center">Offline</p> 
                                    <div class="flex flex-row items-center justify-center gap-x-4">
                                        <img src="{{ asset('img/shopping.png') }}" alt="Deskripsi Gambar" class="w-12">
                                        <p class="text-emerald-600 text-2xl  font-bold">2,5 %</p> 
                                    </div>
                                    <p class="text-slate-500 text-sm ">Order</p> 
                                </div>
                            </div>
                        </div>
            
            
                        <div class="">
                            <div class="flex flex-row p-4 items-end mb-4">
                                <p class="text-xl lg:text-2xl font-semibold ">Antrean Order</p>
                                <div class="flex-grow ml-4 h-[1px] bg-slate-300"></div>
                            </div>
                            <div class="grid grid-cols-2 gap-2 px-4 lg:gap-x-4 md:grid-cols-3">
                                <div class="bg-pink-50 rounded-lg  flex flex-col items-center p-6 gap-y-4 relative cursor-pointer hover:scale-105 transition-transform ease-out">
                                    <p class="text-slate-800 text-sm font-bold text-center">Operator</p> 
                                    <div class="flex flex-row items-center justify-center gap-x-4">
                                        <img src="{{ asset('img/plotter.png') }}" alt="Deskripsi Gambar" class="w-10">
                                        <p class="text-red-400 text-2xl md:text-3xl lg:text-4xl font-bold">5</p> 
                                    </div>
                                    <p class="text-slate-500 text-sm text-center ">Desain belum dicetak</p> 
                                </div>
                
                                <div class="bg-pink-50 rounded-md  flex flex-col items-center p-6 gap-y-4 relative cursor-pointer hover:scale-105 transition-transform ease-out">
                                    <p class="text-slate-800 text-sm font-bold text-center">Distributor</p> 
                                    <div class="flex flex-row items-center justify-center gap-x-4">
                                        <img src="{{ asset('img/box.png') }}" alt="Deskripsi Gambar" class="w-10">
                                        <p class="text-red-400 text-2xl md:text-3xl lg:text-4xl font-bold">15</p> 
                                    </div>
                                    <p class="text-slate-500 text-sm text-center ">Paket belum dikirim</p> 
                                </div>
                 
                                <div class="bg-pink-50 rounded-md  flex flex-col items-center p-6 gap-y-4 relative cursor-pointer hover:scale-105 transition-transform ease-out">
                                    <p class="text-slate-800 text-sm font-bold text-center">Administrasi</p> 
                                    <div class="flex flex-row items-center justify-center gap-x-4">
                                        <img src="{{ asset('img/bill.png') }}" alt="Deskripsi Gambar" class="w-10">
                                        <p class="text-red-400 text-2xl md:text-3xl lg:text-4xl font-bold">6</p> 
                                    </div>
                                    <p class="text-slate-500 text-sm text-center">Invoice belum dibuat</p> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" w-full flex-grow-0 h-full bg-white rounded-xl p-8 ">
                        <div class="flex flex-col gap-y-2">
                            <div class="flex flex-col px-4">
                                <p class="text-xl lg:text-2xl font-semibold ">Chart Order</p>
                            </div>
                            <div class="grid grid-cols-1 gap-2 px-4 lg:gap-x-4 lg:grid-cols-1 ">
                                <div class="bg-white  gap-y-2 relative">
                                    <figure class="highcharts-figure">
                                    <div id="container"></div>
                                  </figure>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=" w-full flex-grow-0 h-full bg-white rounded-xl p-8 ">
                       
                        <div class="flex flex-col gap-y-2">
                            <div class="flex flex-col px-4">
                                <p class="text-xl lg:text-2xl font-semibold ">Chart Order</p>
                            </div>
                            <div class="grid grid-cols-1 gap-2 px-4 lg:gap-x-4 lg:grid-cols-1 ">
                                <div class="bg-white  gap-y-2 relative">
                                    <figure class="highcharts-figure">
                                    <div id="container1"></div>
                                  </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
                

                
                 {{-- END MAIN CONTENT --}}


                {{-- RIGHT SECTION--}}
                
                <div class=" rounded-xl p-6 bg-white w-full lg:w-1/4 px-4 flex-col items-start justify-between pt-6 h-full scrollbar-thin scrollbar-thumb-emerald-500 overflow-scroll space-y-5">
                    <div class="flex flex-col gap-y-4">
                        <div class="flex flex-row justify-between items-end ">
                            <p class=" text-lg font-semibold text-slate-700">Log Tugas</p>
                            <p class=" text-xs  text-slate-500">Hari ini</p>
                        </div>
                        <div class="flex flex-col gap-y-3 text-sm">
                            <?php
                                for ($i=0; $i<8; $i++) {
                                    echo('<div class="flex flex-col items-start text-slate-700 ">
                                            <p class="">08.23 WIB</p>
                                            <p class=""><span class="font-bold pr-2"> Jean</span> Selesai Mendesain Order <span class="font-bold">23435</span></p>
                                            </div>'
                                        );
                                }
                            ?>
                        </div>
                        <div class="border px-4 py-3 flex justify-center items-center cursor-pointer">
                                <p class="text-slate-700 text-sm">Tampilkan semua Log</p>
                        </div>
                    </div>
                </div>
                 {{-- END RIGHT SECTION --}}
            </div>
             {{-- END CONTAINER --}}
        </div>
    </div>
</body> 
</html>
 <script>
    feather.replace()
 </script>
<script src="{{ asset('js/chart_dashboard_adm.js') }}"></script>