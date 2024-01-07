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
    <title>Polaris Adv - Master Mesin</title>
    <style>
        .current{
            visibility: none;
        }
    </style>
</head>
<body class=" bg-slate-50 flex flex-row font-nunito relative parent ">
    <div class="hidden fixed w-full h-full bg-slate-500/20 z-50 backdrop-blur" id="pop_up_edit">
        <div class="flex flex-col rounded-lg bg-white w-1/3 mx-auto mt-24 shadow-xl relative ">
            <div class="flex flex-row items-center gap-x-4  px-10 bg-slate-100 rounded-t-lg">
                <i class="ri-file-paper-line text-2xl"></i>
                <div class="flex flex-col p-2 items-start ">
                    <h1 class="text-lg font-bold text-emerald-900">Edit Mesin Cetak</h1>
                    <p class="text-sm text-slate-400">Pastikan Data Valid</p>
                </div>
            </div>
            <div class="absolute -top-4 -right-4 w-8 h-8 rounded-full bg-white text-red-700 font-bold
                        text-center flex items-center justify-center cursor-pointer" onclick="handleClosePopUp()"><i class="bi bi-x-circle font-bold"></i></div>
            <div></div>
            <form action="edit_mesin_cetak" method="POST">
                @method('PUT')
                @csrf
                <div class="w-full flex flex-row items-center justify-center gap-x-4 mb-6">
                    <div class="flex flex-col  p-8 text-sm gap-y-4 items-center w-full  bg-white rounded-lg">
                        <div class=" flex flex-row items-center justify-between  gap-x-2 px-4 w-full">
                            <label for="nama_mesin" class="text-left w-1/3 block text-sm font-medium text-gray-700">Nama Mesin</label>
                            <input class="appearance-none border w-full  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="nama_mesin" type="text"  name="nama_mesin" required>
                        </div>
                        <div class=" hidden flex flex-row items-center justify-between  gap-x-2 px-4 w-full">
                            <label for="id_mesin" class="text-left w-1/3 block text-sm font-medium text-gray-700">Nama Bahan</label>
                            <input class="appearance-none border w-full  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="id_mesin" type="text"  name="id_mesin" required>
                        </div>
                        <button class="bg-blue-700 rounded hover:bg-blue-800 text-white  py-2 px-4 text-sm focus:outline-none focus:shadow-outline" type="submit">
                            <i class="bi bi-box-arrow-down"></i><span> Simpan</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('admin/globals/sidebar')
        <main id="main" class=" w-full">
          <div class="flex flex-col gap-y-2">

            <div class="flex flex-col items-start justify-start">

                <div class="flex flex-col items-start gap-y-2 w-full">
                @include('template.header')
                <div class="flex flex-col p-6 text-center w-full gap-y-4 mt-14">
                <div class="w-full my-4 flex flex-row items-center border-b text-sm ">
                    <a href="master_bahan" class="px-4 py-3 hover:scale-105 transition-ransform ease-out hover:text-blue-500">
                        <i class="ri-file-paper-line"></i> <span>Bahan Cetak</span>
                    </a>
                    <a href="master_mesin" class="px-4 py-3 border-b-2  border-blue-700 bg-white rounded-t-xl ">
                        <i class="ri-printer-line"></i> Mesin Cetak
                    </a>
                    <a href="master_laminasi" class="px-4 py-3  hover:scale-105 transition-ransform ease-out hover:text-blue-500">
                        <i class="ri-file-paper-2-line"></i> Laminasi
                    </a>
                    <a href="#" class="px-4 py-3  hover:scale-105 transition-ransform ease-out hover:text-blue-500">
                        <i class="ri-truck-line"></i> Ekspedisi
                    </a>
                    <a href="#" class="px-4 py-3  hover:scale-105 transition-ransform ease-out hover:text-blue-500">
                        <i class="ri-store-2-line"></i> Akun Toko
                    </a>
                    <a href="#" class="px-4 py-3  hover:scale-105 transition-ransform ease-out hover:text-blue-500">
                        <i class="ri-user-add-line"></i> User
                    </a>
               </div>
                <div class="flex flex-row items-center gap-x-4 px-6 mt-4  ">
                    <img src="{{ asset('img/plotter.png') }}" alt="logo" class=" w-8 ">
                    <div class="flex flex-col items-start p-2 ">
                        <h1 class="text-lg font-bold text-emerald-900">Master Mesin</h1>
                        <p class="text-sm text-slate-400">Manage Mesin</p>
                    </div>
                </div>
                </div>
                <form action="save_mesin" method="POST" class="w-full">
                @csrf
                <div class="flex flex-col lg:flex-row lg:w-full w-full">
                        <div class="flex flex-col  p-8 text-sm gap-y-4 items-start w-full lg:w-2/5 2xl:w-1/3 bg-white rounded-lg">
                            <div class=" flex flex-row items-center justify-between  gap-x-2 px-4 w-full">
                                <label for="nama_mesin" class="text-left w-1/3 block text-sm font-medium text-gray-700">Nama mesin</label>
                                <input class="appearance-none border w-full  rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-blue-400 focus:shadow-outline" id="nama_mesin" type="text"  name="nama_mesin" required>
                            </div>

                            <div class="flex justify-end px-4">
                                <button class="bg-blue-700 rounded hover:bg-blue-800 text-white  py-2 px-4 text-sm focus:outline-none focus:shadow-outline" type="submit">
                                    <i class="bi bi-box-arrow-down"></i><span> Simpan</span>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="bg-white rounded-lg p-8 text-sm w-full lg:w-3/5 2xl:w-2/3">
                        <div class=" overflow-x-scroll scrollbar-thin scrollbar-thumb-slate-400 py-4">
                            <table id="data_master_mesin" class="cell-border w-full display nowrap text-left text-sm" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th><th>Nama Mesin</th><th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($i=0; $i<sizeof($data_mesin); $i++)
                                        <tr>
                                            <td>{{$i+1}}</td>
                                            <td>{{$data_mesin[$i]->nama_mesin_cetak}}</td>
                                            <td><button onclick="handleEdit('{{$data_mesin[$i]->nama_mesin_cetak}}','{{$data_mesin[$i]->id_mesin_cetak}}')" type="button" class="px-4 py-1 rounded-full bg-emerald-200 text-emerald-700"><i class="ri-file-edit-line"></i> edit mesin</button></td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </main>
</body>
<script>
    $(document).ready(function () {
        $('#data_master_mesin').DataTable({
        "pageLength": 25,
    });
});
function handleEdit(nama_mesin, id_mesin){
    $('#pop_up_edit').removeClass('hidden')
    $('#nama_mesin').val(nama_mesin)
    $('#id_mesin').val(id_mesin)
}

function handleClosePopUp(){
    $('#pop_up_edit').addClass('hidden')
}


</script>
<script src="{{ asset('js/header.js') }}"></script>
</html>
