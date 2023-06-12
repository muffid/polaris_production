<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
   
    {{-- DATATABLE --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
   

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <style>
        .dataTables_length{
            visibility: hidden;
        }

        .dataTables_filter{
            visibility: hidden;
        }
        .dataTables_info{
            visibility: hidden;
        }
        #example_paginate{
            visibility: hidden;
        }
    
    </style>

    {{-- HIGHCHART --}}
   <!-- Highcharts Core -->
   
        

    <link rel="icon" href="{{ asset('img/ico.png') }}" type="image/x-icon">
    <title>Polaris Adv - Dashboard</title>
</head>

<body class=" bg-slate-50 flex flex-row font-nunito  ">
   
    @include('admin/globals/sidebar')
        <main id="main" class=" w-full">
          <div class="flex flex-col gap-y-2">
            {{-- main --}}
            <div class="flex flex-col items-start justify-start">
                {{-- performa --}}
                <div class="flex flex-col items-start gap-y-2 w-full">
                @include('template.header') 
                <div class="flex flex-row items-center gap-x-4 px-6 mt-24  ">
                    <img src="{{ asset('img/plotter.png') }}" alt="logo" class=" w-8 ">
                    <div class="flex flex-col items-start p-2 ">
                        <h1 class="text-lg font-bold text-emerald-900">Master Mesin</h1>
                        <p class="text-sm text-slate-400">Manage Mesin</p>
                    </div>
                </div>
                </div>

                <div class="flex flex-col gap-y-1 w-full">
                    <div class="flex flex-col items-start gap-y-2 md:px-6 py-2 w-full ">
                        <div class="flex flex-col gap-y-4  p-4 bg-white border w-full lg:w-[70%] overflow-x-scroll scrollbar-thin scrollbar-thumb-slate-400 md:rounded-xl ">
                            <div class="mb-3 flex flex-row items-center justify-start lg:justify-start pl-6">
                                <label class="block text-gray-700 md:w-[25%]  font-bold mb-2 w-1/2 " for="nama-bahan">Nama Mesin :</label>
                                <input class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nama-bahan" type="text" placeholder="Masukkan nama bahan">
                            </div>
                           
                        </div>
                    </div>           
                </div>
                <div class="flex flex-col gap-y-1 w-full">
                    <div class="flex flex-col items-start gap-y-2 md:px-6 py-2 w-full ">
                        <div class="flex flex-col gap-y-4 items-center lg:items-end p-4 bg-white border w-full overflow-x-scroll scrollbar-thin scrollbar-thumb-slate-400 md:rounded-xl ">
                       
                            <div id="tableCom" class="display nowrap" style="width:100%">
                                <table id="example" class=" display nowrap text-sm" style="width:100%">
                                    <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>Nama Mesin</th>
                                        <th>Aksi</th>
                                    </tr>
                               
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>1</td>
                                    <td>Bahan China</td>
                                  
                                    <td><div class="flex bg-emerald-700 px-3 py-2 rounded items-center justify-center w-24 text-white cursor-pointer">Edit</div></td>
                                  </tr>

                                  <tr>
                                    <td>2</td>
                                    <td>Maxdecal</td>
                                   
                                    <td><div class="flex bg-emerald-700 px-3 py-2 w-24  items-center justify-center rounded text-white cursor-pointer">Edit</div></td>
                                  </tr>
        
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
        $('#example').DataTable({
            "pageLength": 25,
           
        });

     
});



</script>
<script src="{{ asset('js/header.js') }}"></script>


</html>