<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/utils.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/iziToast.min.css')}}">
    <script src="{{asset('js/iziToast.min.js')}}" type="text/javascript"></script>
    <link rel="icon" href="{{ asset('img/ico.png') }}" type="image/x-icon">
    <title>Polaris Adv - Dashboard</title>
</head>

<body class=" bg-slate-100 relative font-nunito min-h-screen">
    @include('admin.globals.sidebar')
        <main id="main" class=" w-full relative">
            <div class="flex flex-row justify-between w-full">
                <div class="flex flex-col w-full">
                    {{-- main --}}
                    <div class="flex flex-col items-start justify-start">
                        {{-- performa --}}
                        @include('template/header')
                            <div class="flex flex-col p-6 text-center w-full gap-y-4 mt-14">
                                <div class="flex flex-col  text-center w-full gap-y-4">
                                    <div class="w-full my-4 flex flex-row items-center border-b text-sm">
                                        <a href="#" class="px-4 py-3 border-b-2  border-blue-700 bg-white rounded-t-xl">
                                            <i class="ri-file-paper-line"></i> <span>Bahan Cetak</span>
                                        </a>
                                        <a href="#" class="px-4 py-3 ">
                                            <i class="ri-printer-line"></i> Mesin Cetak
                                        </a>
                                        <a href="#" class="px-4 py-3">
                                            <i class="ri-file-paper-2-line"></i> Laminasi
                                        </a>
                                        <a href="#" class="px-4 py-3 ">
                                            <i class="ri-truck-line"></i> Ekspedisi
                                        </a>
                                        <a href="#" class="px-4 py-3 ">
                                            <i class="ri-store-2-line"></i> Akun Toko
                                        </a>
                                        <a href="#" class="px-4 py-3 ">
                                            <i class="ri-user-add-line"></i> User
                                        </a>
                                   </div>
                                    <div class="flex flex-row items-center gap-x-4 mt-2">
                                        <img src="{{ asset('img/online-shop.png') }}" alt="logo" class=" w-8 ">
                                        <div class="flex flex-col p-2 items-start ">
                                            <h1 class="text-lg font-bold text-emerald-900">Input Order Ecommerce</h1>
                                            <p class="text-sm text-slate-400">Masukan Data Order </p>
                                        </div>
                                    </div>
                                    <form action="save_ecomm" method="POST">
                                    @csrf
                                    <div class="grid grid-cols-1 lg:grid-cols-2 p-8 text-sm gap-y-4 items-start w-full bg-white rounded-lg">


                                        <div class=" flex flex-row items-center justify-between  gap-x-2 px-4 w-full">
                                            <label for="akun_pengorder" class="text-left w-1/3 block text-sm font-medium text-gray-700">Nama bahan</label>
                                            <input class="appearance-none border w-full  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="akun_pengorder" type="text"  name="akun_pengorder" required>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between  gap-x-2 px-4 w-full">
                                            <label for="nama_penerima" class="text-left w-1/3 block text-sm font-medium text-gray-700">Lebar Default (cm)</label>
                                            <input class="appearance-none border w-full  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="nama_penerima" type="text"  name="nama_penerima" required>
                                        </div>
                                        <div></div>
                                        <div class="flex justify-end px-4">
                                            <button class="bg-blue-700 rounded hover:bg-blue-800 text-white  py-2 px-4 text-sm focus:outline-none focus:shadow-outline" type="submit">
                                                <i class="bi bi-box-arrow-down"></i><span> Simpan</span>
                                            </button>
                                        </div>
                                    </form>

                                </div>
                                <div class="bg-white rounded-lg p-8 text-sm">
                                    <div class=" overflow-x-scroll scrollbar-thin scrollbar-thumb-slate-400 py-4">
                                    <table id="data_master_bahan" class="cell-border w-full display nowrap text-left text-sm" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th><th>Nama Bahan</th><th>Lebar</th><th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @for($i=0; $i<sizeof($data_bahan); $i++)
                                                    <tr>
                                                        <td>{{$i+1}}</td>
                                                        <td>{{$data_bahan[$i]->nama_bahan_cetak}}</td>
                                                        <td>{{$data_bahan[$i]->lebar_bahan}}</td>
                                                        <td><button class="px-4 py-1 rounded-full bg-emerald-200 text-emerald-700"><i class="ri-file-edit-line"></i> edit bahan</button></td>
                                                    </tr>
                                                @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
        </main>
</body>

<script src="{{ asset('js/header.js') }}"></script>
<script src="{{ asset('js/masterbahan.js') }}"></script>

</html>
