console.log("yes");
var tableDataEcom = new DataTable('#table_task_ecomm',{
    "pageLength":100,
});

setTimeout(function() {
    callAjaxDataEcomm();
}, 1000);

function callAjaxDataEcomm(){

var loader = $("#loader");
var table = $("#table_data_ecomm");
var fileName = '';

$.ajax({
    url:"get_finished_setting_today",
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
            'selesai',

            jsonData[i].tanggal_order_formatted,
            jsonData[i].tanggal_input_formatted,
            fileName,
            ]).draw();
    }
    }
});


}

function handleSelesaiSetting(id_ecomm){
    var btn = $('.'+id_ecomm);
    var divElement = $('<div>', {
        class: 'spinner-4',
    });
    btn.remove()
    var container = $('.container_'+id_ecomm)
    container.append(divElement)


    $.ajax({
        url:'finnish_order/'+id_ecomm,
        type: 'GET',
        dataType: 'json',
        success:function(response){
            if(response.message === "ok"){
                updateTable(id_ecomm);
                iziToast.success({
                    title: 'Berhasil',
                    message: 'order berhasil diselesaikan',
                    position: 'topRight',
                    theme: 'green',
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
                    message: 'order berhasil dibatalkan',
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
