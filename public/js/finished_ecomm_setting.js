// console.log("yes");

flatpickr("#tanggal_setting", {

    dateFormat: "Y-m-d",

});

var tableDataEcom = new DataTable('#table_task_ecomm',{
    "pageLength":100,
});

document.addEventListener("DOMContentLoaded", function () {

    callAjaxDataEcomm();

});


function callAjaxDataEcomm(){

var loader = $("#loader");
var table = $("#table_data_ecomm");
var fileName = '';

$.ajax({
    url:"get_finished_setting_today",
    type: 'GET',
    dataType: 'json',
    success:function(response){
    console.log("data: "+response);
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
            '<h1 class="text-emerald-700 py-1 px-2 bg-emerald-200 text-center rounded-full">Setting Selesai</h1>',

            jsonData[i].tanggal_order_formatted,
            jsonData[i].tanggal_selesai_setting_formatted,
            fileName,
            ]).draw();
    }
    }
});


}
function callAjaxDataEcommByDate(){

    // console.log("i clicked");
    let date = $("#tanggal_setting").val()
    var loader = $("#loader");
    var table = $("#table_data_ecomm");
    var fileName = '';
    loader.removeClass("hidden");
    loader.addClass("flex");
    table.addClass("hidden");

    $.ajax({
        //response kurang time_finnish
        url:"get_finished_setting_by_date/"+date,
        type: 'GET',
        dataType: 'json',
        success:function(response){
        console.log("data: "+response);
        tableDataEcom.clear().draw();
        loader.removeClass("flex");
        loader.addClass("hidden");
        table.removeClass("hidden");
        var jsonData = JSON.parse(response);
        console.log(jsonData);
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
                '<h1 class="text-emerald-700 py-1 px-2 bg-emerald-200 text-center rounded-full">Setting Selesai</h1>',
                jsonData[i].tanggal_order_formatted,
                jsonData[i].tanggal_selesai_setting_formatted,
                fileName,
                ]).draw();
        }
        }
    });


}




// function updateTable(className){

//     tableDataEcom.rows().every(function() {
//         var row = this.node();
//         var tdWithToDelete = $(row).find('td:has(div.container_'+className+')');
//         if (tdWithToDelete.length > 0) {
//             this.remove();
//         }
//     });
//      tableDataEcom.draw();

// }
