<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/utils.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="{{asset('css/iziToast.min.css')}}">
    <script src="{{asset('js/iziToast.min.js')}}" type="text/javascript"></script>

    <link rel="icon" href="{{ asset('img/ico.png') }}" type="image/x-icon">
    <title>Polaris Adv - Dashboard</title>
    <style>
        .spinner-3 {
        width: 50px;
        padding: 8px;
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
                                            <h1 class="text-lg font-bold text-emerald-900">Data Order Ecommerce</h1>
                                            <p class="text-sm text-slate-400">Data inputan anda </p>
                                        </div>
                                    </div>

                                    <div class="flex flex-col p-8 text-sm gap-y-4 items-start w-full bg-white rounded-lg">
                                        <div class="flex flex-row gap-3 items-center">
                                            <input placeholder="tentukan hari" class="appearance-none border  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="tanggal_order" type="text"  name="tanggal_order" required>
                                            <button onclick="callAjaxDataEcomm('{{session('id')}}')" class="px-3 py-2 bg-blue-700 text-white rounded"><i class="bi bi-search"></i> Tampilkan</button>
                                        </div>
                                    </div>

                                    <div class="bg-white/70 rounded-lg p-8 text-sm flex flex-col">
                                        <div id="loader" class="hidden flex-col items-center gap-y-4">
                                            {{-- <svg class="w-10 h-10 animate-spin  right-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                                <path d="M12 6V2M12 22v-4M4.929 4.929l2.122 2.121M16.95 16.95l2.122 2.121M2 12h4M18 12h4M4.929 19.071l2.122-2.121M16.95 7.05l2.122-2.121" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                              </svg> --}}
                                              <div class="spinner-3"></div>
                                              <h1 class="font-semibold text-teal-600">Loading Data</h1>
                                        </div>
                                        <div id="table_data" class=" overflow-x-scroll scrollbar-thin scrollbar-thumb-slate-400 py-4">
                                            <div class="w-full my-4 flex flex-row items-center border-b">
                                                <a href="#" class="px-4 py-3 border-b-2  border-blue-700 bg-blue-50 rounded-t-xl">
                                                    Ecommerce
                                                </a>
                                                <a href="#" class="px-4 py-3 ">
                                                    Non Ecommerce
                                                </a>
                                           </div>
                                        <table id="data_ecomm" class="cell-border w-full display nowrap text-left text-[0.8rem] py-4" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Status Setting</th><th>No Urut</th><th>Tanggal Order</th><th>Tanggal Input</th>
                                                        <th>Akun</th><th>Pengorder</th><th>Penerima</th>
                                                        <th>No Order</th><th>SKU</th><th>Ekspedisi</th><th>Warna</th><th>Jumlah</th><th>Bahan</th>
                                                        <th>Laminasi</th><th>Mesin</th><th>Dimensi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @for($i=0; $i<sizeof($data_ecomm); $i++)
                                                    <tr data-id="tableRow{{$i}}" class="">
                                                        <td class="p-1">
                                                            <div class="rounded-full py-1 px-2 {{$data_ecomm[$i]->status == 'Belum Setting' ? '  text-orange-700' : ($data_ecomm[$i]->status == 'Proses Setting' ? '  text-blue-900' : ' text-green-900') }}">
                                                                {!!$data_ecomm[$i]->status == 'Belum Setting' ? '<i class="bi bi-exclamation-circle"></i>'  : ($data_ecomm[$i]->status == 'Proses Setting' ? '<i class="bi bi-hourglass-split"></i>' : '<i class="bi bi-check-all"></i>') !!}
                                                                {{$data_ecomm[$i]->status}}
                                                            </div>
                                                        </td>
                                                        <td>{{$data_ecomm[$i]->no_urut}}</td>
                                                        <td>{{$data_ecomm[$i]->tanggal_order_formatted}}</td>
                                                        <td>{{$data_ecomm[$i]->tanggal_input_formatted}}</td>
                                                        <td>{{$data_ecomm[$i]->nama_akun_ecom}}</td>
                                                        <td>{{$data_ecomm[$i]->nama_akun_order}}</td>
                                                        <td>{{$data_ecomm[$i]->nama_penerima}}</td>
                                                        <td>{{$data_ecomm[$i]->nomor_order}}</td>
                                                        <td>{{$data_ecomm[$i]->sku}}</td>
                                                        <td>{{$data_ecomm[$i]->nama_ekspedisi}}</td>
                                                        <td>{{$data_ecomm[$i]->warna}}</td>
                                                        <td>{{$data_ecomm[$i]->qty_order}}</td>
                                                        <td>{{$data_ecomm[$i]->nama_bahan_cetak}}</td>
                                                        <td>{{$data_ecomm[$i]->nama_laminasi}}</td>
                                                        <td>{{$data_ecomm[$i]->nama_mesin_cetak}}</td>
                                                        <td>{{$data_ecomm[$i]->lebar_bahan}} x {{$data_ecomm[$i]->panjang_bahan}}</td>
                                                    </tr>
                                                @endfor
                                                </tfoot>
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
<script src="{{ asset('js/dataEcomm.js') }}"></script>
</html>
