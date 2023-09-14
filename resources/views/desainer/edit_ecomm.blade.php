<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>



    <link rel="icon" href="{{ asset('img/ico.png') }}" type="image/x-icon">
    <title>Polaris Adv - Dashboard</title>
</head>

<body class=" bg-[#E9E9E9] relative font-nunito ">

    @include('desainer.globals.sidebar_desainer')
        <main id="main" class=" w-full">


            <div class="flex flex-row justify-between w-full">

                <div class="flex flex-col w-full">
                    {{-- main --}}
                    <div class="flex flex-col items-start justify-start">

                        {{-- performa --}}
                        @include('template/header')
                            <div class="flex flex-col p-6 text-center w-full gap-y-4 mt-14">
                                <div class="flex flex-col  text-center w-full gap-y-4">
                                    <div class="flex flex-row items-center gap-x-4 mt-2">
                                        <img src="{{ asset('img/performance.png') }}" alt="logo" class=" w-8 ">
                                        <div class="flex flex-col p-2 items-start ">
                                            <h1 class="text-lg font-bold text-emerald-900">Edit Order Ecommerce</h1>
                                            <p class="text-sm text-slate-400">Masukan Data Order </p>
                                        </div>
                                    </div>
                                    <?php $nama = ($order_unapprove[0]->nama_akun_order)?>
                                    <?php $penerima = $order_unapprove[0]->nama_penerima?>
                                    <form action={{route('edit_ecomm',['id_akun' => session('id'),'id_ecomm' =>  $order_unapprove[0]->id_order_ecom])}} method="POST">
                                        @method('PUT')
                                    @csrf
                                    <div class="grid grid-cols-2 p-8 text-sm gap-y-4 items-start w-full bg-white rounded-lg">
                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">
                                            <label for="tanggal_order" class="text-left block text-sm w-1/3 font-medium text-gray-700">Tanggal Order</label>
                                            <input class="appearance-none border w-full rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="tanggal_order" type="text"  name="tanggal_order" required value="{{$order_unapprove[0]->order_time}}">
                                        </div>
                                        <div class=" flex flex-row items-center justify-between  text-sm  gap-x-2 px-4 w-full">
                                            <label for="akun" class="text-left block font-medium text-gray-700 w-1/3">Akun</label>
                                            <select class=" w-full cursor-pointerappearance-none border text-sm rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="akun" name="akun">
                                                @for($i=0; $i<sizeof($akun_ecom); $i++)
                                                    @if($akun_ecom[$i]['nama_akun_ecom'] === $order_unapprove[0]->nama_akun_ecom)
                                                        <option value="{{ $akun_ecom[$i]['id_akun_ecom']}}" selected>{{  $akun_ecom[$i]['nama_akun_ecom'] }}</option>
                                                    @else
                                                    <option value="{{ $akun_ecom[$i]['id_akun_ecom'] }}" >{{  $akun_ecom[$i]['nama_akun_ecom'] }}</option>
                                                    @endif
                                                 @endfor
                                              </select>
                                        </div>

                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">

                                            <label for="nama_akun_order" class="text-left w-1/3 block text-sm font-medium text-gray-700">Nama Pengorder</label>
                                            <input value="{{$nama}}" class="appearance-none border w-full  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="nama_akun_order" type="text"  name="nama_akun_order" required>
                                        </div>

                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">
                                            <label for="nama_penerima" class="text-left w-1/3 block text-sm font-medium text-gray-700">Nama Penerima</label>
                                            <input value="{{$penerima}}" class="appearance-none border w-full  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="nama_penerima" type="text"  name="nama_penerima" required>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">
                                            <label for="nomor_order" class="text-left w-1/3 block text-sm font-medium text-gray-700">Nomor Order</label>
                                            <input  value="{{$order_unapprove[0]->nomor_order}}" class="appearance-none border w-full  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="nomor_order" type="text"  name="nomor_order" required>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">
                                            <label for="sku" class="w-1/3 text-left block text-sm font-medium text-gray-700">SKU</label>
                                            <input  value="{{$order_unapprove[0]->sku}}" class="w-full appearance-none border  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="sku" type="text"  name="sku" required>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">
                                            <label for="ekspedisi" class="w-1/3 text-left block text-sm font-medium text-gray-700">Ekspedisi</label>
                                            <select class=" w-full cursor-pointerappearance-none border text-sm rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="ekspedisi" name="ekspedisi">
                                                @for($i=0; $i<sizeof($ekspedisi); $i++)
                                                    @if($ekspedisi[$i]['nama_ekspedisi'] === $order_unapprove[0]->nama_ekspedisi)
                                                        <option value="{{ $ekspedisi[$i]['id_ekspedisi'] }}" selected >{{  $ekspedisi[$i]['nama_ekspedisi'] }}</option>
                                                    @else
                                                        <option value="{{ $ekspedisi[$i]['id_ekspedisi'] }}" >{{  $ekspedisi[$i]['nama_ekspedisi'] }}</option>
                                                    @endif
                                                 @endfor
                                              </select>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">
                                            <label for="warna" class="w-1/3 text-left block text-sm font-medium text-gray-700">Warna</label>
                                            <input  value="{{$order_unapprove[0]->warna}}" class="w-full appearance-none border  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="warna" type="text"  name="warna" required>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">
                                            <label for="jumlah" class="w-1/3 text-left block text-sm font-medium text-gray-700">Jumlah</label>
                                            <input  value="{{$order_unapprove[0]->qty_order}}" class="w-full appearance-none border  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="jumlah" type="text"  name="jumlah" required>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">
                                            <label for="bahan" class="w-1/3 text-left block text-sm font-medium text-gray-700">Bahan</label>
                                            <select  onchange="onChangeBahanCetak()" id="bahan_cetak"  class=" w-full cursor-pointerappearance-none border text-sm rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="bahan" name="bahan">
                                                @for($i=0; $i<sizeof($bahan_cetak); $i++)
                                                    @if($bahan_cetak[$i]['nama_bahan_cetak'] === $order_unapprove[0]->nama_bahan_cetak)
                                                        <option  data-lebar="{{ $bahan_cetak[$i]['lebar_bahan']}}" value="{{ $bahan_cetak[$i]['id_bahan_cetak'] }}" selected >{{  $bahan_cetak[$i]['nama_bahan_cetak'] }}</option>
                                                    @else
                                                        <option  data-lebar="{{ $bahan_cetak[$i]['lebar_bahan']}}" value="{{ $bahan_cetak[$i]['id_bahan_cetak'] }}">{{  $bahan_cetak[$i]['nama_bahan_cetak'] }}</option>
                                                    @endif
                                                @endfor
                                            </select>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">
                                            <label for="laminasi" class="w-1/3 text-left block text-sm font-medium text-gray-700">Laminasi</label>
                                            <select  class=" w-full cursor-pointerappearance-none border text-sm rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="laminasi" name="laminasi">
                                                @for($i=0; $i<sizeof($laminasi); $i++)
                                                    @if($laminasi[$i]['nama_laminasi'] === $order_unapprove[0]->nama_laminasi)
                                                        <option value="{{ $laminasi[$i]['id_laminasi'] }}" selected>{{  $laminasi[$i]['nama_laminasi']}}</option>
                                                    @else
                                                        <option value="{{ $laminasi[$i]['id_laminasi'] }}">{{  $laminasi[$i]['nama_laminasi'] }}</option>
                                                    @endif
                                             @endfor
                                              </select>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">
                                            <label for="mesin" class="w-1/3 text-left block text-sm font-medium text-gray-700">Mesin</label>
                                            <select class=" w-full cursor-pointerappearance-none border text-sm rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="mesin" name="mesin">
                                               @for($i=0; $i<sizeof($mesin_cetak); $i++)
                                                    @if($mesin_cetak[$i]['nama_mesin_cetak'] === $order_unapprove[0]->nama_mesin_cetak)
                                                        <option value="{{ $mesin_cetak[$i]['id_mesin_cetak'] }}" selected >{{  $mesin_cetak[$i]['nama_mesin_cetak'] }}</option>
                                                    @else
                                                        <option value="{{ $mesin_cetak[$i]['id_mesin_cetak'] }}" >{{  $mesin_cetak[$i]['nama_mesin_cetak'] }}</option>
                                                    @endif
                                               @endfor
                                            </select>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">
                                            <label for="panjang" class="w-1/3 text-left block text-sm font-medium text-gray-700">Panjang (cm)</label>
                                            <input  value={{$order_unapprove[0]->panjang_bahan}} class="w-full appearance-none border  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="panjang" type="number"  name="panjang" required>
                                            <label for="lebar" class="w-1/3 text-left block text-sm font-medium text-gray-700 ml-4">lebar (cm)</label>
                                            <input readonly id="lebar_bahan"  value={{$order_unapprove[0]->lebar_bahan}} class="w-full appearance-none border  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="lebar" type="text"  name="lebar" required>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">
                                            <label for="note" class="w-1/3 text-left block text-sm font-medium text-gray-700">Note</label>
                                            <input  value={{$order_unapprove[0]->note}} class="w-full appearance-none border  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="note" type="text" value="-"  name="note">
                                        </div>


                                    </div>

                                    <div class=" rounded p-4 flex flex-row justify-end items-center mt-4">
                                        <div class="flex items-center justify-between gap-x-3">
                                            <button onclick="updateTable()" class="bg-orange-500 rounded-sm hover:bg-orange-600 text-white  py-2 px-4 text-sm focus:outline-none focus:shadow-outline" type="button">
                                                Kembali
                                            </button>
                                            <button class="bg-blue-700 rounded-sm hover:bg-blue-800 text-white  py-2 px-4 text-sm focus:outline-none focus:shadow-outline" type="submit">
                                                Simpan
                                            </button>
                                              </form>
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
<script>

flatpickr("#tanggal_order", {
        // Opsi-opsi konfigurasi di sini
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        time_24hr: true,
    });


    $(window).on("load", function() {
        var pilihanTerpilih = $("#bahan_cetak option:selected");
        var nilaiLebar = pilihanTerpilih.data("lebar");
        $("#lebar_bahan").val(nilaiLebar);

    });

    function onChangeBahanCetak(){
        var pilihanTerpilih = $("#bahan_cetak option:selected");
        var nilaiLebar = pilihanTerpilih.data("lebar");
        $("#lebar_bahan").val(nilaiLebar);
        console.log("change");
    }

</script>

</html>
