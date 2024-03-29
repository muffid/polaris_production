<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/utils.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <link rel="stylesheet" href="{{asset('css/iziToast.min.css')}}">
    <script src="{{asset('js/iziToast.min.js')}}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="icon" href="{{ asset('img/ico.png') }}" type="image/x-icon">
    <title>Polaris Adv - Dashboard</title>


</head>

<body class=" bg-slate-100 relative font-nunito min-h-screen">
    @include('desainer.globals.sidebar_desainer')
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
                                        <a href="{{route('input_ecomm_page')}}" class="px-4 py-3 ">
                                            Ecommerce
                                        </a>
                                        <a href="{{route('input_nonecommerce')}}" class="px-4 py-3 border-b-2  border-blue-700 bg-white rounded-t-xl">
                                            Non Ecommerce
                                        </a>
                                   </div>
                                    <div class="flex flex-row items-center gap-x-4 mt-2">
                                        <img src="{{ asset('img/online-shop.png') }}" alt="logo" class=" w-8 ">
                                        <div class="flex flex-col p-2 items-start ">
                                            <h1 class="text-lg font-bold text-emerald-900">Input Order Non Ecommerce</h1>
                                            <p class="text-sm text-slate-400">Masukan Data Order </p>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 lg:grid-cols-2 p-8 text-sm gap-y-4 items-start w-full bg-white rounded-lg">
                                        {{-- <div class="col-span-2 flex flex-row items-center justify-start gap-x-4 px-4 w-full">
                                            <label for="nama_cust" class="text-left block text-sm font-medium text-gray-700">Masukan nama : </label>
                                            <div class="relative w-2/4">
                                                <input class="appearance-none border w-full rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="nama_cust" type="text"  name="nama_cust" required>
                                            </div>
                                            <h1 class="px-3 py-2 rounded bg-blue-500 text-white">cari customer</h1>
                                        </div> --}}
                                        <div id="loader" class="flex col-span-2 flex-col justify-center items-center gap-y-4">
                                            {{-- <svg class="w-10 h-10 animate-spin  right-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                                <path d="M12 6V2M12 22v-4M4.929 4.929l2.122 2.121M16.95 16.95l2.122 2.121M2 12h4M18 12h4M4.929 19.071l2.122-2.121M16.95 7.05l2.122-2.121" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                              </svg>--}}
                                              <div class="spinner-3"></div>
                                              <h1 class="font-semibold text-teal-600">Loading Data</h1>
                                        </div>

                                        <div id="table_cust_container" class="hidden col-span-2 overflow-x-scroll scrollbar-thin scrollbar-thumb-slate-400 py-4">
                                            <table id="table_cust" class="cell-border w-full display text-left text-sm" style="width:100%">
                                                <thead>
                                                    <tr>
                                                       <th>ID</th><th>Nama</th><th>Jenis</th><th>Alamat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @for($i=0; $i<sizeof($data_customer); $i++)
                                                        <tr>
                                                            <td>
                                                                {{$data_customer[$i]["ID"]}}
                                                            </td>
                                                            <td>
                                                                {{$data_customer[$i]["Nama"]}}
                                                            </td>
                                                            <td>
                                                                {{$data_customer[$i]["Golongan"]}}
                                                            </td>
                                                            <td>
                                                                {{$data_customer[$i]["Alamat"]}}
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class=" flex flex-row items-center justify-start gap-x-4 px-4 w-full">
                                            <label for="nama_cust" class=" w-1/3 text-left block text-sm font-medium text-gray-700">Nama Konsumen </label>
                                            <div class="relative w-full">
                                                <input class="appearance-none border w-full rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="nama_cust" type="text"  name="nama_cust" required>
                                            </div>
                                        </div>
                                        <div class=" flex flex-row items-center justify-start gap-x-4 px-4 w-full">
                                            <label for="jenis" class=" w-1/3 text-left block text-sm font-medium text-gray-700">Jenis Konsumen</label>
                                            <div class="relative w-full">
                                                <input class="appearance-none border w-full rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="jenis" type="text"  name="jenis" required>
                                            </div>
                                        </div>
                                        <div class=" flex flex-row items-center justify-start gap-x-4 px-4 w-full">
                                            <label for="nama_file" class=" w-1/3 text-left block text-sm font-medium text-gray-700">Nama File</label>
                                            <div class="relative w-full">
                                                <input class="appearance-none border w-full rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="nama_file" type="text"  name="nama_file" required>
                                            </div>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">
                                            <label for="bahan" class="w-1/3 text-left block text-sm font-medium text-gray-700">Bahan</label>
                                            <div class="relative w-full">
                                                <div class="absolute inset-y-0 right-4 pl-3 flex items-center pointer-events-none">
                                                    <i class="bi bi-file-richtext text-slate-400 text-base"></i>
                                                </div>
                                                <div class="absolute inset-y-0 right-10 pl-3 flex items-center pointer-events-none">
                                                    <i class="bi bi-caret-down-fill text-xs text-slate-400"></i>
                                                </div>
                                                <select onchange="onChangeBahanCetak()"  id="bahan_cetak" class=" w-full cursor-pointer appearance-none border text-sm rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" name="bahan">
                                                    @for($i=0; $i<sizeof($bahan_cetak); $i++)
                                                        <option data-lebar="{{ $bahan_cetak[$i]['lebar_bahan']}}" value="{{ $bahan_cetak[$i]['id_bahan_cetak'] }}"  @if($bahan_cetak[$i]['nama_bahan_cetak']=="China") selected @endif>{{  $bahan_cetak[$i]['nama_bahan_cetak'] }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class=" flex flex-row items-center justify-start gap-x-4 px-4 w-full">
                                            <label for="lebar" class=" w-1/3 text-left block text-sm font-medium text-gray-700">Lebar bahan</label>
                                            <div class="relative w-full">
                                                <input readonly class="appearance-none border w-full rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="lebar" type="text"  name="lebar" required>
                                            </div>
                                        </div>
                                        <div class=" flex flex-row items-center justify-start gap-x-4 px-4 w-full">
                                            <label for="panjang" class=" w-1/3 text-left block text-sm font-medium text-gray-700">Panjang bahan</label>
                                            <div class="relative w-full">
                                                <input  class="appearance-none border w-full rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="panjang" type="number"  name="panjang" required>
                                            </div>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">
                                            <label for="laminasi" class="w-1/3 text-left block text-sm font-medium text-gray-700">Laminasi</label>
                                            <div class="relative w-full">
                                                <div class="absolute inset-y-0 right-4 pl-3 flex items-center pointer-events-none">
                                                    <i class="bi bi-file-earmark text-slate-400 text-base"></i>
                                                </div>
                                                <div class="absolute inset-y-0 right-10 pl-3 flex items-center pointer-events-none">
                                                    <i class="bi bi-caret-down-fill text-xs text-slate-400"></i>
                                                </div>
                                            <select class=" w-full cursor-pointer appearance-none border text-sm rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="laminasi" name="laminasi">
                                                    <option value="tanpa laminasi">tanpa laminasi</option>
                                                    @for($i=0; $i<sizeof($laminasi); $i++)
                                                        <option value="{{ $laminasi[$i]['id_laminasi'] }}" >{{  $laminasi[$i]['nama_laminasi'] }}</option>
                                                    @endfor
                                              </select>
                                            </div>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">
                                            <label for="mesin" class="w-1/3 text-left block text-sm font-medium text-gray-700">Mesin</label>
                                            <div class="relative w-full">
                                                <div class="absolute inset-y-0 right-4 pl-3 flex items-center pointer-events-none">
                                                    <i class="bi bi-printer text-slate-400 text-base"></i>
                                                </div>
                                                <div class="absolute inset-y-0 right-10 pl-3 flex items-center pointer-events-none">
                                                    <i class="bi bi-caret-down-fill text-xs text-slate-400"></i>
                                                </div>
                                            <select class=" w-full cursor-pointer appearance-none border text-sm rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="mesin" name="mesin">
                                               @for($i=0; $i<sizeof($mesin_cetak); $i++)
                                                    <option value="{{ $mesin_cetak[$i]['id_mesin_cetak'] }}" @if($mesin_cetak[$i]['nama_mesin_cetak']=="Mimaki") selected @endif >{{  $mesin_cetak[$i]['nama_mesin_cetak'] }}</option>
                                               @endfor
                                            </select>
                                            </div>
                                        </div>

                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">
                                            <label for="distribusi" class="w-1/3 text-left block text-sm font-medium text-gray-700">Distribusi</label>
                                            <div class="relative w-full">
                                                <div class="absolute inset-y-0 right-4 pl-3 flex items-center pointer-events-none">
                                                    <i class="bi bi-truck text-slate-400 text-base"></i>
                                                </div>
                                                <div class="absolute inset-y-0 right-10 pl-3 flex items-center pointer-events-none">
                                                    <i class="bi bi-caret-down-fill text-xs text-slate-400"></i>
                                                </div>
                                            <select class=" w-full cursor-pointer appearance-none border text-sm rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="distribusi" name="distribusi">
                                                <option value="Diambil">Diambil</option>
                                                <option value="Diambil">Dikirim</option>
                                                <option value="Diambil">Kurir</option>
                                            </select>
                                            </div>
                                        </div>

                                        <div class=" flex flex-row items-center justify-start gap-x-4 px-4 w-full">
                                            <label for="tambahan" class=" w-1/3 text-left block text-sm font-medium text-gray-700">Tambahan</label>
                                            <div class="relative w-full">
                                                <input class="appearance-none border w-full rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="tambahan" type="text"  name="tambahan" required>
                                            </div>
                                        </div>
                                        <div class=" flex flex-row items-center justify-start gap-x-4 px-4 w-full">
                                            <label for="jumlah" class=" w-1/3 text-left block text-sm font-medium text-gray-700">Jumlah</label>
                                            <div class="relative w-full">
                                                <input class="appearance-none border w-full rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="jumlah" type="number"  name="jumlah" required>
                                            </div>
                                        </div>
                                        <div class=" flex flex-row items-center justify-start gap-x-4 px-4 w-full">
                                            <label for="keterangan" class=" w-1/3 text-left block text-sm font-medium text-gray-700">Keterangan</label>
                                            <div class="relative w-full">
                                                <input class="appearance-none border w-full rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="keterangan" type="text"  name="keterangan" >
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
           {{-- di sini nanti footer --}}
                </div>
        </main>
</body>

<script src="{{ asset('js/header.js') }}"></script>
<script src="{{ asset('js/nonecomm/input_nonecomm.js') }}"></script>
</html>
