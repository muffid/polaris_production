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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <link rel="stylesheet" href="{{asset('css/iziToast.min.css')}}">
    <script src="{{asset('js/iziToast.min.js')}}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="icon" href="{{ asset('img/ico.png') }}" type="image/x-icon">
    <title>Polaris Adv - Dashboard</title>


</head>

<body class=" bg-slate-100 relative font-nunito min-h-screen">
    @if(session('message'))
        <script>
            var message =@json(session('message'));
            var textToCopy =@json(session('copy'));
            if(message == 'success'){
                Swal.fire({
                    title: 'Berhasil, silahkan copy nama file ',
                    confirmButtonText: 'Copy Nama File',
                }).then((result) => {
                    if (result.isConfirmed) {
                        navigator.clipboard.writeText(textToCopy)
                        .then(() => {
                            console.log('Teks berhasil di-copy ke clipboard.');
                            Swal.fire('copied!', '', 'success')
                        })
                        .catch((error) => {
                            console.error('Gagal menyalin teks ke clipboard:', error);
                        });
                    }
                })
            }else{
                iziToast.error({
                    title: 'Failed',
                    message: 'Data gagal disimpan',
                    position: 'topRight',
                });
            }
        </script>
    @endif
    <div id="popup" class=" fixed py-4 px-8 w-full h-full hidden flex-col items-center justify-center my-auto mx-auto z-50 right-0 top-0  bg-slate-900/25">
       <div class="mx-auto my-auto bg-white max-w-[400px] p-6 rounded flex flex-col items-center gap-y-4">
            <h1 class="font-bold text-lg text-orange-700"> <i class="bi bi-exclamation-diamond"></i> Peringatan</h1>
            <p class="text-center text-xs">Anda akan mengapus data : </p>
            <p id="data_hapus" class="font-bold"></p>
            <p class="text-center text-xs">menghapus data mengakibatkan data yang anda hapus tidak bisa dikembalikan. yakin hapus? </p>
            <div id="button_container" class="flex flex-row items-center gap-x-4 text-sm">
                <button onclick="callAjax()" class="bg-red-500 px-3 py-2 rounded text-white">ya, hapus</button>
                <button onclick="closeDeleteDialog()" class="bg-white border border-slate-800 px-3 py-2 rounded">batalkan</button>
            </div>
            <button id="button_process" class="hidden  items-center justify-center px-4 py-2 text-white bg-blue-700 rounded-full focus:outline-none">
                <span class="mr-2">Memproses...</span>
                <svg class="w-5 h-5 animate-spin  right-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                    <path d="M12 6V2M12 22v-4M4.929 4.929l2.122 2.121M16.95 16.95l2.122 2.121M2 12h4M18 12h4M4.929 19.071l2.122-2.121M16.95 7.05l2.122-2.121" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
            </button>
        </div>
    </div>


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
                                        <a href="#" class="px-4 py-3 border-b-2  border-blue-700 bg-white rounded-t-xl">
                                            Ecommerce
                                        </a>
                                        <a href="#" class="px-4 py-3 ">
                                            Non Ecommerce
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
                                        <div class=" flex flex-row items-center justify-between gap-x-2 px-4 w-full">
                                            <label for="tanggal_order" class="text-left block text-sm w-1/3 font-medium text-gray-700">Tanggal Order</label>
                                            <div class="relative w-full">
                                                <div class="absolute inset-y-0 right-4 pl-3 flex items-center pointer-events-none">
                                                    <i class="bi bi-calendar3 text-slate-400"></i>
                                                </div>
                                                <div class="absolute inset-y-0 right-10 pl-3 flex items-center pointer-events-none">
                                                    <i class="bi bi-caret-down-fill text-xs text-slate-400"></i>
                                                </div>
                                                <input placeholder="pilih waktu" class="appearance-none border w-full rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="tanggal_order" type="text"  name="tanggal_order" required>
                                            </div>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between  text-sm  gap-x-2 px-4 w-full">
                                            <label for="akun" class="text-left block font-medium text-gray-700 w-1/3">Akun</label>
                                            <div class="relative w-full">
                                                <div class="absolute inset-y-0 right-4 pl-3 flex items-center pointer-events-none">
                                                    <i class="bi bi-shop text-slate-400"></i>
                                                </div>
                                                <div class="absolute inset-y-0 right-10 pl-3 flex items-center pointer-events-none">
                                                    <i class="bi bi-caret-down-fill text-xs text-slate-400"></i>
                                                </div>
                                            <select class=" w-full cursor-pointer appearance-none border text-sm rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="akun" name="akun">
                                                @for($i=0; $i<sizeof($akun_ecom); $i++)
                                                    <option value="{{ $akun_ecom[$i]['id_akun_ecom'] }}" >{{  $akun_ecom[$i]['nama_akun_ecom'] }}</option>
                                                 @endfor
                                              </select>
                                            </div>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between  gap-x-2 px-4 w-full">
                                            <label for="akun_pengorder" class="text-left w-1/3 block text-sm font-medium text-gray-700">Akun Pengorder</label>
                                            <input class="appearance-none border w-full  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="akun_pengorder" type="text"  name="akun_pengorder" required>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between  gap-x-2 px-4 w-full">
                                            <label for="nama_penerima" class="text-left w-1/3 block text-sm font-medium text-gray-700">Nama Penerima</label>
                                            <input class="appearance-none border w-full  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="nama_penerima" type="text"  name="nama_penerima" required>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">
                                            <label for="nomor_order" class="text-left w-1/3 block text-sm font-medium text-gray-700">Nomor Order</label>
                                            <input class="appearance-none border w-full  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="nomor_order" type="text"  name="nomor_order" required>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">
                                            <label for="sku" class="w-1/3 text-left block text-sm font-medium text-gray-700">SKU</label>
                                            <input class="w-full appearance-none border  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="sku" type="text"  name="sku" required>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">
                                            <label for="ekspedisi" class="w-1/3 text-left block text-sm font-medium text-gray-700">Ekspedisi</label>
                                            <div class="relative w-full">
                                                <div class="absolute inset-y-0 right-4 pl-3 flex items-center pointer-events-none">
                                                    <i class="bi bi-truck text-slate-400 text-base"></i>
                                                </div>
                                                <div class="absolute inset-y-0 right-10 pl-3 flex items-center pointer-events-none">
                                                    <i class="bi bi-caret-down-fill text-xs text-slate-400"></i>
                                                </div>
                                            <select class=" w-full cursor-pointer appearance-none border text-sm rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="ekspedisi" name="ekspedisi">
                                                @for($i=0; $i<sizeof($ekspedisi); $i++)
                                                    <option value="{{ $ekspedisi[$i]['id_ekspedisi'] }}" >{{  $ekspedisi[$i]['nama_ekspedisi'] }}</option>
                                                 @endfor
                                              </select>
                                            </div>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">
                                            <label for="warna" class="w-1/3 text-left block text-sm font-medium text-gray-700">Warna</label>
                                            <input class="w-full appearance-none border  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="warna" type="text"  name="warna" required>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">
                                            <label for="jumlah" class="w-1/3 text-left block text-sm font-medium text-gray-700">Jumlah</label>
                                            <input class="w-full appearance-none border  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="jumlah" type="text"  name="jumlah" required>
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
                                                <select onchange="onChangeBahanCetak()" id="bahan_cetak" class=" w-full cursor-pointer appearance-none border text-sm rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="bahan" name="bahan">
                                                    @for($i=0; $i<sizeof($bahan_cetak); $i++)
                                                        <option data-lebar="{{ $bahan_cetak[$i]['lebar_bahan']}}" value="{{ $bahan_cetak[$i]['id_bahan_cetak'] }}"  @if($bahan_cetak[$i]['nama_bahan_cetak']=="China") selected @endif>{{  $bahan_cetak[$i]['nama_bahan_cetak'] }}</option>
                                                    @endfor
                                                </select>
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
                                            <label for="panjang" class="w-1/3 text-left block text-sm font-medium text-gray-700">Panjang (cm)</label>
                                            <input class="w-full appearance-none border  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="panjang" type="number"  name="panjang" required>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">
                                            <label for="lebar" class="w-1/3 text-left block text-sm font-medium text-gray-700 ">lebar (cm)</label>
                                            <input readonly id="lebar_bahan" class="w-full appearance-none border  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="lebar" type="text"  name="lebar" required>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">
                                            <label for="resi" class="w-1/3 text-left block text-sm font-medium text-gray-700">Resi</label>
                                            <input class="w-full appearance-none border  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="resi" type="text"  name="resi" required>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">
                                            <label for="note" class="w-1/3 text-left block text-sm font-medium text-gray-700">Note</label>
                                            <input class="w-full appearance-none border  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="note" type="text" value="-"  name="note">
                                        </div>
                                    </div>
                                    <div class=" rounded p-4 flex flex-row justify-end items-center mt-4">
                                        <div class="flex items-center justify-between gap-x-3">
                                            {{-- <button onclick="updateTable()" class="bg-orange-500 rounded hover:bg-orange-600 text-white  py-2 px-4 text-sm focus:outline-none focus:shadow-outline" type="button">
                                                <i class="bi bi-caret-left-fill"></i><span> Kembali</span>
                                            </button> --}}
                                            <button class="bg-blue-700 rounded hover:bg-blue-800 text-white  py-2 px-4 text-sm focus:outline-none focus:shadow-outline" type="submit">
                                                <i class="bi bi-box-arrow-down"></i><span> Simpan</span>
                                            </button>
                                              </form>
                                        </div>
                                    </div>

                                    <div class="flex flex-row items-center gap-x-4 mt-2">
                                        <img src="{{ asset('img/evaluation.png') }}" alt="logo" class=" w-8 ">
                                        <div class="flex flex-col p-2 items-start ">
                                            <h1 class="text-lg font-bold text-emerald-900">Order Ecom Belum Disetting</h1>
                                            <p class="text-sm text-slate-400">Order Ecom Baru Baru Ini</p>
                                        </div>
                                    </div>
                                   <div class="bg-white rounded-lg p-8 text-sm">
                                        <div class=" overflow-x-scroll scrollbar-thin scrollbar-thumb-slate-400 py-4">
                                        <table id="example" class="cell-border w-full display nowrap text-left text-sm" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Aksi</th><th>No Urut</th><th>Tanggal Order</th><th>Tanggal Input</th><th>Akun</th><th>Pengorder</th><th>Penerima</th>
                                                        <th>No Order</th><th>SKU</th><th>Ekspedisi</th><th>Warna</th><th>Jumlah</th><th>Bahan</th>
                                                        <th>Laminasi</th><th>Mesin</th><th>Dimensi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @for($i=0; $i<sizeof($order_unapprove); $i++)
                                                        <tr data-id="tableRow{{$i}}">
                                                            <td>
                                                                <div class="flex flex-row items-center justify-between gap-x-3">
                                                                    <h1
                                                                        onclick="copyText(({{json_encode($order_unapprove[$i]->no_urut.'-'.$order_unapprove[$i]->nama_akun_ecom.'-'.
                                                                        $order_unapprove[$i]->nama_akun_order.'-'.$order_unapprove[$i]->nama_penerima.'-'.
                                                                        $order_unapprove[$i]->sku.'-'.$order_unapprove[$i]->warna.$order_unapprove[$i]->panjang_bahan.'-'.$order_unapprove[$i]->nama_ekspedisi.'-'. $order_unapprove[$i]->order_time)}}))"
                                                                        class="cursor-pointer text-blue-700 hover:underline " title="klik untuk mengkopi text sebagai nama file"><i class="bi bi-clipboard"></i>
                                                                    </h1>
                                                                    <h1 onclick="window.location.href = '{{ route('edit_ecom', ['id_akun' => $order_unapprove[$i]->id_akun,'id_ecom' =>  $order_unapprove[$i]->id_order_ecom]) }}'" class="cursor-pointer text-green-700 hover:underline "><i class="bi bi-pencil-square"></i></h1>
                                                                    <h1 onclick="showDeleteDialog({{json_encode($order_unapprove[$i]->id_order_ecom)}},{{json_encode($order_unapprove[$i]->nomor_order)}},{{json_encode('tableRow'.$i)}})" class="cursor-pointer text-red-700 hover:underline"><i class="bi bi-trash"></i></h1>
                                                                </div>
                                                            </td>
                                                            <td>{{$order_unapprove[$i]->no_urut}}</td>
                                                            <td>{{$order_unapprove[$i]->tanggal_order_formatted}}</td>
                                                            <td>{{$order_unapprove[$i]->tanggal_input_formatted}}</td>
                                                            <td>{{$order_unapprove[$i]->nama_akun_ecom}}</td>
                                                            <td>{{$order_unapprove[$i]->nama_akun_order}}</td>
                                                            <td>{{$order_unapprove[$i]->nama_penerima}}</td>
                                                            <td>{{$order_unapprove[$i]->nomor_order}}</td>
                                                            <td>{{$order_unapprove[$i]->sku}}</td>
                                                            <td>{{$order_unapprove[$i]->nama_ekspedisi}}</td>
                                                            <td>{{$order_unapprove[$i]->warna}}</td>
                                                            <td>{{$order_unapprove[$i]->qty_order}}</td>
                                                            <td>{{$order_unapprove[$i]->nama_bahan_cetak}}</td>
                                                            <td>{{$order_unapprove[$i]->nama_laminasi}}</td>
                                                            <td>{{$order_unapprove[$i]->nama_mesin_cetak}}</td>
                                                            <td>{{$order_unapprove[$i]->panjang_bahan}} x {{$order_unapprove[$i]->lebar_bahan}}</td>
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
<script src="{{ asset('js/inputEcommPage.js') }}"></script>
</html>
