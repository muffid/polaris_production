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
        #nonEcom_paginate{
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
                    <div class="flex flex-row items-center gap-x-4 px-6 mt-24 ">
                        <img src="{{ asset('img/online-shop.png') }}" alt="logo" class=" w-8 ">
                        <div class="flex flex-col items-start p-2 ">
                            <h1 class="text-lg font-bold text-emerald-900">Monitor Order Ecommerce</h1>
                            <p class="text-sm text-slate-400">Order ecommerce yang belum selesai cetak</p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-y-1 w-full">
                        <div class="flex flex-col items-start gap-y-2 md:px-6 py-2 ">
                            <div class="flex flex-col p-4 bg-white w-full border md:rounded-lg overflow-x-scroll scrollbar-thin scrollbar-thumb-slate-400">
                                
                                <div id="tableCom" class="display nowrap" style="width:100%">
                                  <table id="example" class=" display nowrap text-xs" style="width:100%">
                                              <thead>
                                                <tr>
                                                  <th>No</th>
                                                  <th>Waktu Order</th>
                                                  <th>Akun</th>
                                                  <th>Akun Order</th>
                                                  <th>Penerima</th>
                                                  <th>Nomor Order</th>
                                                  <th>SKU</th>
                                                  <th>Ekspedisi</th>
                                                  <th>Warna</th>
                                                  <th>Jumlah</th>
                                                  <th>Status</th>
                                                  <th>Print Oleh</th>
                                                  <th>Print Selesai</th>
                                                  <th>Distribusi</th>
                                                  <th>Return</th>
                                              </tr>
                                         
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>1</td>
                                              <td>12:45:34 23-05-2023</td>
                                              <td>XYZ</td>
                                              <td>John Statham</td>
                                              <td>Mike Portnoy</td>
                                              <td>7567456</td>
                                              <td>8756894</td>
                                              <td>JNE</td>
                                              <td>GREEN-SOHO</td>
                                              <td>1</td>
                                              <td>On Printing</td>
                                              <td>Garen</td>
                                              <td>13:45:20 23-05-2023</td>
                                              <td>Terdistribusi</td>
                                              <td>No</td>
                                            </tr>
                  
                                              </tbody>
                                          </table>
                              </div>
                            </div>
                        </div>
    
                       
                            
          
                      
                      
                    </div>


                    <div class="flex flex-row items-center gap-x-4 px-6 ">
                        <img src="{{ asset('img/online-shop.png') }}" alt="logo" class=" w-8 ">
                        <div class="flex flex-col items-start p-2 ">
                            <h1 class="text-lg font-bold text-emerald-900">Monior Order Non Ecommerce</h1>
                            <p class="text-sm text-slate-400">Order Non Ecommerce yang belum selesai cetak</p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-y-1 w-full">
                        <div class="flex flex-col items-start gap-y-2 md:px-6 py-2 ">
                            <div class="flex flex-col p-4 bg-white w-full border md:rounded-lg overflow-x-scroll scrollbar-thin scrollbar-thumb-slate-400">
                                
                                <div id="tableCom" class="display nowrap" style="width:100%">
                                    <table id="nonEcom" class=" display nowrap text-xs" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Diinput Oleh</th>
                                                <th>Nama Konsumen</th>
                                                <th>Konsumen</th>
                                                <th>Nama File</th>
                                                <th>Bahan</th>
                                                <th>Laminasi</th>
                                                <th>Mesin</th>
                                                <th>Jumlah</th>
                                                <th>Lebar</th>
                                                <th>Panjang</th>
                                                <th>Distribusi</th>
                                                <th>Tambahan</th>
                                                <th>Status</th>
                                                <th>Print Oleh</th>
                                                <th>Print Selesai</th>
                                                <th>Waktu Produksi</th>
                                                <th>Catatan</th>
                                                <th>Return</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td >1</td>
                                                <td>Vladimir</td>
                                                <td>Sulnain</td>
                                                <td>ONLINE</td>
                                                <td> (SUPRIADI) - ORAJET - SUPERGLOSY - EPSON (CETAK RGB)</td>
                                                <td>Quantac</td>
                                                <td>LAMINASI DOFF 100MC</td>
                                                <td>EPSON</td>
                                                <td>1</td>
                                                <td>120</td>
                                                <td>61</td>
                                                <td>KURIR</td>
                                                <td>Plastik</td>
                                                <td>Diambil</td>
                                                <td>Jean</td>
                                                <td>2011-04-25</td>
                                                <td>3 jam 45 mnt</td>
                                                <td>Diambil</td>
                                                <td>No</td>
                                            </tr>
                                            <tr>
                                              <td >2</td>
                                              <td>Vladimir</td>
                                              <td>Gusmat</td>
                                              <td>OFFLINE</td>
                                              <td> (SUPRIADI) - ORAJET - SUPERGLOSY - EPSON (CETAK RGB)</td>
                                              <td>Quantac</td>
                                              <td>LAMINASI DOFF 100MC</td>
                                              <td>EPSON</td>
                                              <td>1</td>
                                              <td>120</td>
                                              <td>61</td>
                                              <td>KURIR</td>
                                              <td>Plastik</td>
                                              <td>Diambil</td>
                                              <td>Jean</td>
                                              <td>2011-04-25</td>
                                              <td>3 jam 45 mnt</td>
                                              <td>Diambil</td>
                                              <td>No</td>
                                          </tr>
                                          <tr>
                                            <td >3</td>
                                            <td>Vladimir</td>
                                            <td>Snejder</td>
                                            <td>OFFLINE</td>
                                            <td> (SUPRIADI) - ORAJET - SUPERGLOSY - EPSON (CETAK RGB)</td>
                                            <td>Quantac</td>
                                            <td>LAMINASI DOFF 100MC</td>
                                            <td>EPSON</td>
                                            <td>1</td>
                                            <td>120</td>
                                            <td>61</td>
                                            <td>KURIR</td>
                                            <td>Plastik</td>
                                            <td>Diambil</td>
                                            <td>Jean</td>
                                            <td>2011-04-25</td>
                                            <td>3 jam 45 mnt</td>
                                            <td>Diambil</td>
                                            <td>No</td>
                                        </tr>
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
<script>


      $(document).ready(function () {
        $('#example').DataTable({
            "pageLength": 25,
           
        });

        $('#nonEcom').DataTable({
            "pageLength": 25,
           
        });
});



</script>
<script src="{{ asset('js/header.js') }}"></script>


</html>