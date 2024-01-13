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
    <title>Polaris Adv - Rekap Bahan Cetak</title>
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
                  <img src="{{ asset('img/paper.png') }}" alt="logo" class=" w-8 ">
                  <div class="flex flex-col items-start p-2 ">
                      <h1 class="text-lg font-bold text-emerald-900">Bahan Cetak</h1>
                      <p class="text-sm text-slate-400">Data Sepanjang waktu</p>
                  </div>
              </div>
                </div>

                <div class="flex flex-col gap-y-1 w-full">
                    <div class="flex flex-col items-start gap-y-2 md:px-6 py-2 w-full">
                        <div class="flex flex-col items-center lg:items-start justify-start gap-y-2 md:px-6 py-2 bg-white border md:rounded-xl w-full overflow-x-scroll scrollbar-thin ">
                          <div class="flex flex-row gap-x-4 font-nunito text-sm pr-4 items-end mt-4">

                            <div class="relative inline-block ">
                                <select class=" cursor-pointer block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded-md leading-tight focus:outline-none focus:border-indigo-500">
                                  <option disabled selected>Pilih Bahan</option>
                                  <option >China</option>
                                  <option>Orajet</option>
                                  <option>Maxdecal</option>

                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                  <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19 9l-7 7-7-7"></path>
                                  </svg>
                                </div>
                              </div>

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

                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                  <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19 9l-7 7-7-7"></path>
                                  </svg>
                                </div>
                              </div>

                              <div class="bg-emerald-800 rounded px-4 py-2 text-white cursor-pointer">Terapkan</div>
                        </div>
                          <div class="flex flex-col relative gap-y-4">
                            <div id="chart"></div>
                            <div id="chartContainer"></div>
                            </div>
                        </div>
                    </div>



                    <div class="flex flex-col items-start gap-y-2 md:px-6 py-2 w-full ">
                        <div class="flex flex-col gap-y-4 items-center lg:items-end p-4 bg-white border w-full overflow-x-scroll scrollbar-thin md:rounded-xl ">
                          <div class="flex flex-row gap-x-4 font-nunito text-sm pr-4 items-end">

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

                              <div class="bg-emerald-800 rounded px-4 py-2 text-white cursor-pointer">Terapkan</div>
                        </div>
                            <div id="tableCom" class="display nowrap" style="width:100%">
                                <table id="example" class=" display nowrap text-sm" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Bahan</th>
                                                    <th>Total Penggunaan</th>
                                                    <th>Jumlah Pembeli</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td>1</td>
                                                <td>China</td>
                                                <td>23</td>
                                                <td>5</td>
                                              </tr>
                                              <tr>
                                                <td>1</td>
                                                <td>China</td>
                                                <td>23</td>
                                                <td>5</td>
                                              </tr>
                                              <tr>
                                                <td>1</td>
                                                <td>China</td>
                                                <td>23</td>
                                                <td>5</td>
                                              </tr>
                                              <tr>
                                                <td>1</td>
                                                <td>China</td>
                                                <td>23</td>
                                                <td>5</td>
                                              </tr>
                                              <tr>
                                                <td>1</td>
                                                <td>China</td>
                                                <td>23</td>
                                                <td>5</td>
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

$(document).ready(function() {

  drawChartRank();
  drawChart();
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


function drawChartRank() {
  Highcharts.chart('chartContainer', {
  chart: {
    type: 'bar',
    width: 1200
  },
  title: {
    text: '10 Bahan paling banyak digunakan'
  },

  xAxis: {
    categories: [
      'Bulan ini'
    ],
    crosshair: true
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Panjang (Meter)'
    }
  },


  series: [{
    name: 'China',
    data: [123.9]

  }, {
    name: 'Orajet',
    data: [110.6]

  }, {
    name: 'BMW',
    data: [106.9]

  }, {
    name: 'Maxdecal White',
    data: [95.4]

  }, {
    name: 'Infleck',
    data: [89.4]

  }, {
    name: 'Quantac',
    data: [80.4]

  }, {
    name: 'Aurocal',
    data: [75.4]

  }, {
    name: 'Ritrama',
    data: [59.4]

  }, {
    name: 'Bahan 9',
    data: [40.4]

  }, {
    name: 'Bahan 10',
    data: [38.4]

  }]
});
}

function drawChart() {
  Highcharts.chart('chart', {
  chart: {
    type: 'line',
    width: 1200
  },
  title: {
    text: 'Bahan Harian'
  },

  xAxis: {
    title:{
      text:'tanggal'
    },
   min:1,
   tickInterval:1,
    crosshair: true
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Panjang (Meter)'
    }
  },

  series: [{
    name: 'China',
    data: [123,120,99,130,150,45,67,35,78,89,34,89,130,206,134,120,134,90,104,115,127]

  },]
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
