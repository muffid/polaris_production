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

    <script src="https://jsuites.net/v4/jsuites.js"></script>
    <link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />

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

                                    <div class="flex flex-row items-center gap-x-4 mt-2">
                                        <img src="{{ asset('img/online-shop.png') }}" alt="logo" class=" w-8 ">
                                        <div class="flex flex-col p-2 items-start ">
                                            <h1 class="text-lg font-bold text-emerald-900">Data Order Ecomm Selesai Dikirim</h1>
                                            <p class="text-sm text-slate-400">pilih order yang akan di return </p>
                                        </div>
                                    </div>
                                    <div class="w-full my-4 flex flex-row items-center border-b text-sm">
                                        <a href="{{route('order_return')}}" class="px-4 py-3 border-b-2  border-blue-700 bg-white rounded-t-xl">
                                            Order Selesai
                                        </a>
                                        <a href="{{route('list_order_return')}}" class="px-4 py-3 ">
                                            Barang Return
                                        </a>
                                   </div>
                                    <div class="grid grid-cols-1  p-8 text-sm gap-y-4 items-start w-full bg-white rounded-lg">
                                        <div class="flex flex-col text-sm gap-y-4 items-start w-full bg-white rounded-lg">
                                            <div class="flex flex-row gap-3 items-center">
                                                <input placeholder="tentukan bulan" class="appearance-none border  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="tanggal_order" type="text"  name="tanggal_order">
                                                <button onclick="callAjaxDataEcomm()" class="px-3 py-2 bg-blue-700 text-white rounded"><i class="bi bi-search"></i> Tampilkan</button>
                                            </div>
                                        </div>
                                         <div id="loader" class="flex col-span-2 flex-col justify-center items-center gap-y-4">
                                            {{-- <svg class="w-10 h-10 animate-spin  right-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                                <path d="M12 6V2M12 22v-4M4.929 4.929l2.122 2.121M16.95 16.95l2.122 2.121M2 12h4M18 12h4M4.929 19.071l2.122-2.121M16.95 7.05l2.122-2.121" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                              </svg>--}}
                                              <div class="spinner-3"></div>
                                              <h1 class="font-semibold text-teal-600">Loading Data</h1>
                                        </div>
                                        <div id="container_order" class="hidden overflow-x-scroll scrollbar-thin scrollbar-thumb-slate-400 py-4">
                                        <table id="order_tuntas" class="cell-border w-full display nowrap text-left text-[0.8rem] py-4" style="width:100%">
                                            <thead>
                                                <tr>
                                                  <th>No</th><th>Aksi</th><th>SC</th><th>Setting</th>
                                                    <th>Akun</th><th>Pengorder</th><th>Penerima</th>
                                                    <th>No Order</th><th>SKU</th><th>Ekspedisi</th><th>No Resi</th><th>Warna</th><th>Jumlah</th><th>Bahan</th>
                                                    <th>Laminasi</th><th>Mesin</th><th>Dimensi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @for($i=0; $i<sizeof($order_tuntas); $i++)
                                                <tr data-id="tableRow{{$i}}" class="">

                                                    <td>{{$i+1}}</td>
                                                    <td>
                                                        <div  class="container_{{$order_tuntas[$i]["id_order_ecom"]}} flex items-center justify-center">
                                                        <div class="{{$order_tuntas[$i]["id_order_ecom"]}} flex items-center gap-x-1 justify-center  rounded-sm px-2 py-2 bg-yellow-200 text-yellow-700 text-sm cursor-pointer text-center" onclick="handleReturn('{{$order_tuntas[$i]['id_order_ecom']}}')">Jadikan Return<i class="bi bi-box-seam"></i></div></div>
                                                    </td>
                                                        {{-- <td>{{$order_tuntas[$i]["tanggal_order_formatted"]}}</td>
                                                    <td>{{$order_tuntas[$i]["tanggal_input_formatted"]}}</td> --}}
                                                    <td>{{$order_tuntas[$i]["nama_desainer"]}}</td>
                                                    <td>{{$order_tuntas[$i]["nama_penyetting"]}}</td>
                                                    <td>{{$order_tuntas[$i]["nama_akun_ecom"]}}</td>
                                                    <td>{{$order_tuntas[$i]["nama_akun_order"]}}</td>
                                                    <td>{{$order_tuntas[$i]["nama_penerima"]}}</td>
                                                    <td>{{$order_tuntas[$i]["nomor_order"]}}</td>
                                                    <td>{{$order_tuntas[$i]["sku"]}}</td>
                                                    <td>{{$order_tuntas[$i]["nama_ekspedisi"]}}</td>
                                                    <td>{{$order_tuntas[$i]["resi"]}}</td>
                                                    <td>{{$order_tuntas[$i]["warna"]}}</td>
                                                    <td>{{$order_tuntas[$i]["qty_order"]}}</td>
                                                    <td>{{$order_tuntas[$i]["nama_bahan_cetak"]}}</td>
                                                    <td>{{$order_tuntas[$i]["nama_laminasi"]}}</td>
                                                    <td>{{$order_tuntas[$i]["nama_mesin_cetak"]}}</td>
                                                    <td>{{$order_tuntas[$i]["lebar_bahan"]}} x {{$order_tuntas[$i]["panjang_bahan"]}}</td>
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
           {{-- di sini nanti footer --}}
                </div>
        </main>
</body>

<script src="{{ asset('js/header.js') }}"></script>
<script src="{{ asset('js/order_tuntas.js') }}"></script>
</html>
