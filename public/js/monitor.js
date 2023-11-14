var tableDataMonitor = new DataTable('#data_monitor',{
    "ordering" :false,
    "pageLength":100,
});

document.addEventListener("DOMContentLoaded", function () {

    callAjaxDataEcomm();

});

setInterval(callAjaxDataEcomm,15000);


function callAjaxDataEcomm(){

  var loader = $("#loader")
  var table = $("#table_data_monitor")
  var fileName = ''

  $.ajax({
      url:'get_monitor_data',
      type: 'GET',
      dataType: 'json',
      success:function(response){
        tableDataMonitor.clear().draw()
        loader.removeClass("flex")
        loader.addClass("hidden")
        table.removeClass("hidden")
        let jsonData = JSON.parse(response)
        let timeOrder = ''
        let timeInput = ''
        let timeMulaiSetting=''
        let timeSelesaiSetting = ''
        let penyetigColumn = ''
        let ketWaktuSetting = ''
        let timeStamp = "beberaapa saat yang lalu"
        let DesainerColumn = ''
        let statusColumn = ''
        for (var i = 0; i < jsonData.length; i++) {
            penyetigColumn=''
            timeOrder = "'"+jsonData[i].order_time+"'"
            timeInput = "'"+jsonData[i].time+"'"
            timeMulaiSetting = "'"+jsonData[i].mulai_setting+"'"
            timeSelesaiSetting = "'"+jsonData[i].selesai_setting+"'"
            statusColumn = ''
            fileName = jsonData[i]['no_urut']+'-'+ jsonData[i]['nama_akun_ecom']+'-'+ jsonData[i]['nama_akun_order']+
                        '-'+ jsonData[i]['nama_penerima']+'-'+ jsonData[i]['sku']+'-'+jsonData[i]['warna']+'-'+jsonData[i]['panjang_bahan']+
                        '-'+jsonData[i]['nama_ekspedisi']+'-'+jsonData[i]['order_time']

            if(!(jsonData[i]['note'] == '-')){
                fileName = fileName+(' ('+jsonData[i]['note']+')')
            }

            if(jsonData[i].status == "Proses Setting"){
                ketWaktuSetting = 'disetting '+countTimeElapsed(timeMulaiSetting)
            }
            if(jsonData[i].status == "Belum Setting"){
                ketWaktuSetting = ''
            }
            if(jsonData[i].status == "Setting Selesai"){
                ketWaktuSetting = 'diselesaikan '+countTimeElapsed(timeSelesaiSetting)
            }


            DesainerColumn = '<div class="flex flex-row items-center gap-x-2"><i class="bi bi-person-circle text-slate-600 text-xl"></i><div class ="flex flex-col  gap-y-1"><h1 class="font-bold text-green-800">'+jsonData[i].nama_desainer+'</h1><h1 class="text-xs text-slate-500">'+
                           countTimeElapsed(timeInput)+'</h1></div></div>'
            if(!(jsonData[i].status == "Belum Setting")){
                penyetigColumn = '<div class="flex flex-row items-center gap-x-2"><i class="bi bi-person-circle text-slate-600 text-xl"></i><div class ="flex flex-col  gap-y-1"><h1 class="font-bold text-green-800">'+jsonData[i].nama_penyetting+'</h1><h1 class="text-xs text-slate-500">'+
                ketWaktuSetting+'</h1></div></div>'
            }

            if(jsonData[i].status == "Belum Setting"){
                statusColumn = '<h1 class="text-red-700 py-1 px-2 bg-red-200 text-center rounded-full">Belum Setting</h1>'
            }
            if(jsonData[i].status == "Proses Setting"){
                statusColumn = '<h1 class="text-yellow-700 py-1 px-2 bg-yellow-200 text-center rounded-full">Proses Setting</h1>'
            }
            if(jsonData[i].status == "Setting Selesai"){
                statusColumn = '<h1 class="text-emerald-700 py-1 px-2 bg-emerald-200 text-center rounded-full">Setting Selesai</h1>'
            }

            tableDataMonitor.row.add([
                i+1,
                '<h1 class="text-xs text-slate-700">'+countTimeElapsed(timeOrder)+'</h1>',
                jsonData[i].nama_akun_order,
                jsonData[i].qty_order+" pcs",
                fileName,
                DesainerColumn,
                statusColumn,
                penyetigColumn
            ]).draw()

        }

        tableDataMonitor.rows().every(function() {
            var data = this.data();
            console.log(data[4]);
            if (data[2].includes('urgent')) {
                $(this.node()).find('td').addClass('bg-yellow-300');

            }

        });
      }
    });
}


function countTimeElapsed(inputString){
    let time = '';
    let dateTime = moment(inputString, "YYYY-MM-DD HH:mm");
            let formattedDateTime = dateTime.format("YYYY-MM-DD HH:mm");
            let now = moment();
            let minutesDiff = now.diff(dateTime, 'minutes');
            // console.log(minutesDiff);

            if(minutesDiff == 0 ){
                    time = "beberapa detik yang lalu";
            }

            if(minutesDiff < 60 && minutesDiff > 0){
                    time = minutesDiff+"m yang lalu";
            }

            if(minutesDiff >= 60 && minutesDiff < 1440 ){

                let hour = Math.round(minutesDiff/60)
                time = hour+"j yang lalu"
            }

            if(minutesDiff >= 1440 && minutesDiff < 2880){
                    time = "1H yang lalu"
            }

            if(minutesDiff >=2880 && minutesDiff < 4320){
                    time = "2H yang lalu"
            }

            if(minutesDiff >=4320 && minutesDiff < 5760){
                    time = "3H yang lalu"
            }
            if(minutesDiff >=5760){
                    time = "lebih dari 3H yang lalu"
            }
            // console.log(time);
    return time
}
