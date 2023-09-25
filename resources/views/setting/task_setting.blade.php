<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/utils.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="{{asset('css/iziToast.min.css')}}">
    <script src="{{asset('js/iziToast.min.js')}}" type="text/javascript"></script>

    <link rel="icon" href="{{ asset('img/ico.png') }}" type="image/x-icon">
    <title>Polaris Adv - On Proses Setting</title>

    <script src="{{asset('js/moment.min.js')}}" type="text/javascript"></script>
</head>

<body class=" bg-slate-100 relative font-nunito ">

    @include('setting.globals.sidebar_setting')
        <main id="main" class=" w-full">
            <div class="flex flex-row justify-between w-full">
                <div class="flex flex-col w-full">
                    <div class="flex flex-col items-start justify-start">
                        @include('template/header')
                    </div>
                    <div class="mt-24 flex flex-col w-full px-8 gap-x-4">
                        <div class="flex flex-row items-center gap-x-4 mt-2">
                            <img src="{{ asset('img/performance.png') }}" alt="logo" class=" w-8 ">
                            <div class="flex flex-col p-2 items-start ">
                                <h1 class="text-lg font-bold text-emerald-900">Data Order Ecommerce</h1>
                                <p class="text-sm text-slate-400">Data inputan anda </p>
                            </div>
                        </div>
                        <div class="flex w-full items-center justify-between bg-white rounded p-4">

                            <div id="loader" class="flex flex-col items-center justify-center w-full gap-y-4">
                                <div class="spinner-3"></div>
                                <h1 class="font-semibold text-teal-600">Loading Data</h1>
                            </div>

                            <div id="table_data_ecomm" class="hidden w-full overflow-x-scroll scrollbar-thin scrollbar-thumb-slate-400 text-xs py-4">
                                <table id="table_task_ecomm" class="cell-border w-full display nowrap text-left text-[0.8rem]" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Aksi</th><th>No Urut</th><th>Tanggal Order</th><th>Keterangan Order</th>
                                                <th>Nama File</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>

    <script src="{{ asset('js/header.js') }}"></script>
    {{-- <script src="{{ asset('js/task_setting.js') }}"></script> --}}
    <script>
        var tableDataEcom = new DataTable('#table_task_ecomm',{
        });

        setTimeout(function() {
            callAjaxDataEcomm('{{session("id")}}');
        }, 1000);

        function callAjaxDataEcomm(id_akun){

        var loader = $("#loader");
        var table = $("#table_data_ecomm");
        var fileName = '';

        $.ajax({
            url:"{{ route('get_ecomm_on_proses', [':parameter1']) }}"
            .replace(':parameter1',id_akun),
            type: 'GET',
            dataType: 'json',
            success:function(response){
            // console.log(response);
            tableDataEcom.clear().draw();
            loader.removeClass("flex");
            loader.addClass("hidden");
            table.removeClass("hidden");
            var jsonData = JSON.parse(response);
            // console.log(jsonData);
            var timeStamp = "beberaapa saat yang lalu";

            for (var i = 0; i < jsonData.length; i++) {

                let inputString = "'"+jsonData[i].order_time+"'";
                let dateTime = moment(inputString, "YYYY-MM-DD HH:mm");
                let formattedDateTime = dateTime.format("YYYY-MM-DD HH:mm");

                let now = moment();
                let minutesDiff = now.diff(dateTime, 'minutes');
                // console.log(minutesDiff);

                if(minutesDiff == 0 ){
                        timeStamp = "beberapa detik yang lalu";
                }

                if(minutesDiff < 60 && minutesDiff > 0){
                        timeStamp = minutesDiff+"m yang lalu";
                }

                if(minutesDiff >= 60 && minutesDiff < 1440 ){

                    let hour = Math.round(minutesDiff/60)
                    timeStamp = hour+"j yang lalu"
                }

                if(minutesDiff >= 1440 && minutesDiff < 2880){
                        timeStamp = "1H yang lalu"
                }

                if(minutesDiff >=2880 && minutesDiff < 4320){
                        timeStamp = "2H yang lalu"
                }

                if(minutesDiff >=4320 && minutesDiff < 5760){
                        timeStamp = "3H yang lalu"
                }
                if(minutesDiff >=7200){
                        timeStamp = "lebih dari 3H yang lalu"
                }

                fileName = jsonData[i]['no_urut']+'-'+ jsonData[i]['nama_akun_ecom']+'-'+ jsonData[i]['nama_akun_order']+
                            '-'+ jsonData[i]['nama_penerima']+'-'+ jsonData[i]['sku']+'-'+jsonData[i]['warna']+'-'+jsonData[i]['panjang_bahan']+
                            '-'+jsonData[i]['nama_ekspedisi']+'-'+jsonData[i]['order_time'];

                tableDataEcom.row.add([
                    '<div  class="container_'+ jsonData[i].id_order_ecom+' flex items-center justify-center gap-x-2"><div class="'+ jsonData[i].id_order_ecom+' flex items-center justify-center  rounded-sm px-2 py-2 bg-blue-200 text-blue-700 text-sm cursor-pointer text-center" onclick=handleFinnishSetting("'+ jsonData[i].id_order_ecom+'")>tandai selesai</div><div class="'+ jsonData[i].id_order_ecom+' flex items-center justify-center  rounded-sm px-2 py-2 bg-orange-200 text-orange-700 text-sm cursor-pointer text-center" onclick=handleCancelSetting("'+ jsonData[i].id_order_ecom+'")>batalkan</div></div>',
                    jsonData[i].no_urut,
                    jsonData[i].order_time,
                    timeStamp,
                    fileName,
                    ]).draw();
            }
            }
        });


        }

        function handleCancelSetting(id_ecomm){
            var btn = $('.'+id_ecomm);
            var divElement = $('<div>', {
                class: 'spinner-4',
            });
            btn.remove()
            var container = $('.container_'+id_ecomm)
            container.append(divElement)


            $.ajax({
                url:'cancel_setting/'+id_ecomm,
                type: 'GET',
                dataType: 'json',
                success:function(response){
                    if(response.message === "ok"){
                        updateTable(id_ecomm);
                        iziToast.success({
                            title: 'Berhasil',
                            message: 'Tugas ditambahkan',
                            position: 'topRight',
                            theme: 'light',
                            color: 'dark',
                        });
                    }else if(response.message === "booked"){
                        updateTable(id_ecomm);
                        iziToast.warning({
                            title: 'Invalid',
                            message: 'Tugas sudah disetting ',
                            position: 'topRight',
                            theme: 'light',
                            color: 'dark',
                        });
                    }else{
                        iziToast.error({
                            title: 'Gagal',
                            message: 'Terjadi Kesalahan',
                            position: 'topRight',
                            theme: 'light',
                            color: 'dark',
                        });
                    }

                }
            });
        }


        function updateTable(className){

            tableDataEcom.rows().every(function() {
                var row = this.node();
                var tdWithToDelete = $(row).find('td:has(div.container_'+className+')');
                if (tdWithToDelete.length > 0) {
                    this.remove();
                }
            });
             tableDataEcom.draw();

        }
    </script>
</html>
