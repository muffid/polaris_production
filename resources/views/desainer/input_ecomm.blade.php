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
   
    @if(session('message'))
    <script>
          document.addEventListener('DOMContentLoaded', function () {
            var message =@json(session('message'));
            showAndHideWithFade(message);
           
        });
        
        function showAndHideWithFade(message) {
            var div = document.querySelector('.hidden-div');
            if(message == "success"){
                div.innerHTML = 'Data berhasil disimpan  <i class="bi bi-check-circle-fill"></i>';
                div.classList.add('bg-green-500');
            }else{
                div.innerHTML = "Data Gagal disimpan";
                div.classList.add('bg-red-500');
            }
          
    
            // Tampilkan elemen div dengan animasi fade
            div.classList.remove('hidden');
            div.classList.add('animate-fade-in');
            div.classList.add('animate-bounce');
      
    
            // Setelah 4 detik, sembunyikan elemen div dengan animasi fade
            setTimeout(function() {
                div.classList.remove('animate-fade-in');
                div.classList.add('animate-fade-out');
    
                // Tunggu animasi fade-out selesai, lalu sembunyikan elemen div
                setTimeout(function() {
                    div.classList.add('hidden');
                    div.classList.remove('animate-fade-out');
                }, 1000);
            }, 4000);
        }
    </script>
    
    <div class="absolute py-4 px-8  my-auto mx-auto z-50 right-10 top-10 rounded font-bold text-white hidden hidden-div ">
      
    </div>
    @endif
   
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
                                    <div class="flex flex-row items-center gap-x-4">
                                        <img src="{{ asset('img/performance.png') }}" alt="logo" class=" w-8 ">
                                        <div class="flex flex-col p-2 items-start ">
                                            <h1 class="text-lg font-bold text-emerald-900">Input Order Ecommerce</h1>
                                            <p class="text-sm text-slate-400">Masukan Data Order </p>
                                        </div>
                                    </div>
                                    <form action="/save_ecomm" method="POST">
                                    @csrf
                                    <div class="grid grid-cols-2 py-4 text-sm px-4 gap-y-4 items-start w-full bg-white rounded">
                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">
                                            <label for="tanggal_order" class="text-left block text-sm w-1/3 font-medium text-gray-700">Tanggal Order</label>
                                            <input class="appearance-none border w-full rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="tanggal_order" type="text"  name="tanggal_order" required>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between  text-sm  gap-x-2 px-4 w-full">
                                            <label for="akun" class="text-left block font-medium text-gray-700 w-1/3">Akun</label>
                                            <select class=" w-full cursor-pointerappearance-none border text-sm rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="akun" name="akun">
                                             
                                                <option >S.JD</option>
                                                <option>L.JD</option>
                                                <option>T.JD</option>
                                                <option>S.JSV</option>
                                                <option>L.JSV</option>
                                              </select>
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
                                            <select class=" w-full cursor-pointerappearance-none border text-sm rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="ekspedisi" name="ekspedisi">
                                                <option selected>JNE Reguler</option>
                                                <option>JNT</option>
                                                <option>Antar Aja</option>
                                                <option>Inflek</option>
                                                <option>Orajet</option>
                                              </select>
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
                                            <select class=" w-full cursor-pointerappearance-none border text-sm rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="bahan" name="bahan">
                                                @for($i=0; $i<sizeof($bahan_cetak); $i++)
                                                <option value="{{ $bahan_cetak[$i]->id_bahan_cetak }}"  @if($bahan_cetak[$i]->nama_bahan_cetak=="China") selected @endif>{{  $bahan_cetak[$i]->nama_bahan_cetak }}</option>
                                           @endfor
                                            </select>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">
                                            <label for="laminasi" class="w-1/3 text-left block text-sm font-medium text-gray-700">Laminasi</label>
                                            <select class=" w-full cursor-pointerappearance-none border text-sm rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="laminasi" name="laminasi">
                                                <option selected>Glossy</option>
                                              </select>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">
                                            <label for="mesin" class="w-1/3 text-left block text-sm font-medium text-gray-700">Mesin</label>
                                            <select class=" w-full cursor-pointerappearance-none border text-sm rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="mesin" name="mesin">
                                               @for($i=0; $i<sizeof($mesin_cetak); $i++)
                                                    <option value="{{ $mesin_cetak[$i]->id_mesin_cetak }}" @if($mesin_cetak[$i]->nama_mesin_cetak=="Mimaki") selected @endif >{{  $mesin_cetak[$i]->nama_mesin_cetak }}</option>
                                               @endfor
                                            </select>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">
                                            <label for="panjang" class="w-1/3 text-left block text-sm font-medium text-gray-700">Panjang (cm)</label>
                                            <input class="w-full appearance-none border  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="panjang" type="text"  name="panjang" required>
                                            <label for="lebar" class="w-1/3 text-left block text-sm font-medium text-gray-700 ml-4">lebar (cm)</label>
                                            <input class="w-full appearance-none border  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="lebar" type="text"  name="lebar" required>
                                        </div>
                                        <div class=" flex flex-row items-center justify-between   gap-x-2 px-4 w-full">
                                            <label for="note" class="w-1/3 text-left block text-sm font-medium text-gray-700">Note</label>
                                            <input class="w-full appearance-none border  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="note" type="text" value="-"  name="note">
                                        </div>
                                      
                                    </div>
                                    <div class="bg-white rounded p-4 flex flex-row justify-end items-center">
                                        <div class="flex items-center justify-between gap-x-3">
                                            <button  class="bg-orange-500 rounded-sm hover:bg-orange-600 text-white  py-2 px-4 text-sm focus:outline-none focus:shadow-outline" type="button">
                                                Kembali
                                            </button>
                                            <button class="bg-blue-700 rounded-sm hover:bg-blue-800 text-white  py-2 px-4 text-sm focus:outline-none focus:shadow-outline" type="submit">
                                                Simpan
                                            </button>
                                        </div>
                                    </div>
                                </form>
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