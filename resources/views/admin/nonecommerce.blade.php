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
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

    {{-- HIGHCHART --}}
   <!-- Highcharts Core -->
<script src="https://code.highcharts.com/highcharts.js"></script>

<!-- Highcharts Modules (opsional) -->
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<style>
    .highcharts-credit{
        visibility: hidden;
    }
</style>
    

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
              
                @include('template.header')
                <div class="flex flex-row items-center gap-x-4 px-6 mt-24 ">
                  <img src="{{ asset('img/smartphone.png') }}" alt="logo" class=" w-8 ">
                  <div class="flex flex-col items-start p-2 ">
                      <h1 class="text-lg font-bold text-emerald-900">Order Non Ecommerce</h1>
                      <p class="text-sm text-slate-400">Data Sepanjang waktu</p>
                  </div>
              </div>
    
                <div class="flex flex-col gap-y-1 w-full">
                    <div class="flex flex-col items-start gap-y-2 md:px-6 py-2 w-full ">
                        <div class="flex flex-col p-4 bg-white border w-full overflow-x-scroll scrollbar-thin scrollbar-thumb-slate-400 md:rounded-xl ">
                            <div class="flex flex-row gap-x-4">
                              
                            </div>
                            <div id="tableCom" class="display nowrap" style="width:100%">
                                <table id="example" class=" display nowrap text-xs" style="width:100%">
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

                    <div class="flex flex-col items-start gap-y-2 md:px-6 py-2 w-full">
                   
                    <div class="flex flex-col items-start justify-start gap-y-2 md:px-6 py-2 bg-white border md:rounded-xl w-full overflow-x-scroll scrollbar-thin ">
                        <div class="flex flex-col items-end justify-start   p-6 relative gap-y-4">
                            <div class="flex flex-row gap-x-4 font-nunito text-sm pr-4">
                                <div class="relative inline-block ">
                                    <select class=" cursor-pointer block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded-md leading-tight focus:outline-none focus:border-indigo-500">
                                      <option disabled selected>Pilih Bulan</option>
                                      <option >Januari</option>
                                      <option>Februari</option>
                                      <option>Maret</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                      <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19 9l-7 7-7-7"></path>
                                      </svg>
                                    </div>
                                  </div>
                                  

                                  <div class="relative inline-block ">
                                    <select class=" cursor-pointer block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded-md leading-tight focus:outline-none focus:border-indigo-500">
                                      <option disabled selected>Pilih Tahun</option>
                                      <option >2023</option>
                                      <option>2024</option>
                                      <option>2025</option>
                                      <option>2026</option>
                                      <option>2027</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                      <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19 9l-7 7-7-7"></path>
                                      </svg>
                                    </div>
                                  </div>

                                  <div class="bg-emerald-800 rounded px-4 py-2 text-white cursor-pointer">Terapkan</div>
                            </div>
                            <div id="chartContainer">
                               
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
          </div>
        </main>
</body>
<script>

$(document).ready(function() {

  var initialCategoryData = ['1','2','3','4','5','6','7','8','9','10','11','12'];
  var initialSeriesData1 = [63, 38, 30,45,34,69,52,61,45,48,23];
  var initialSeriesData2 = [45, 67, 55,78,67,54,87,75,89];

  drawChart(initialCategoryData, initialSeriesData1, initialSeriesData2);
});

       $(document).ready(function () {
        $('#example').DataTable({
            "pageLength": 25,
            dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf'
        ]
        });
});


function drawChart(categoryData, seriesData1, seriesData2) {
  Highcharts.chart('chartContainer', {
    chart: {
      type: 'line',
      width: 1000
    },
    title: {
      text: ''
    },
    xAxis: {
      categories: categoryData
    },
    yAxis: {
      title: {
        text: 'Total Order'
      }
    },
    series: [{
      name: 'Online',
      data: seriesData1
    }, {
      name: 'Offline',
      data: seriesData2
    }]
  });
}

function updateChart() {
  $.ajax({
    url: '/chart-data',
    type: 'GET',
    success: function(response) {
      var chart = Highcharts.charts[0]; // Mendapatkan referensi ke grafik yang ada

      // Memperbarui data seri pada grafik
      chart.series[0].setData(response.seriesData1);
      chart.series[1].setData(response.seriesData2);

      // Memperbarui tampilan grafik
      chart.redraw();
    }
  });
}


</script>
<script src="{{ asset('js/header.js') }}"></script>


</html>