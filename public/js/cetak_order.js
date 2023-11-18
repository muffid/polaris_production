var tableDataEcom = new DataTable('#table_to_cetak',{
    "pageLength":100,
    "ordering" :false,
});

setTimeout(function() {
    callAjaxDataEcomm();
}, 1000);

function callAjaxDataEcomm(){

var loader = $("#loader");
var table = $("#div_to_cetak");
var fileName = '';

$.ajax({
    url:"get_allsetting_onproses/",
    type: 'GET',
    dataType: 'json',
    success:function(response){
    // console.log(response);
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

        fileName = jsonData[i]['no_sc']+'-'+ jsonData[i]['nama_akun_ecom']+'-'+ jsonData[i]['nomor_order']+'-'+ jsonData[i]['nama_akun_order']+
                        '-'+ jsonData[i]['nama_penerima']+'-'+ jsonData[i]['sku']+'-'+jsonData[i]['warna']+
                       '-'+jsonData[i]['order_time'].substring(0,jsonData[i]['order_time'].length - 6)+'-'+jsonData[i]['panjang_bahan']+'x'+jsonData[i]['lebar_bahan']

        tableDataEcom.row.add([
            '<div class="container_'+ jsonData[i].id_order_ecom+' flex items-center  gap-x-2"><div class="'+ jsonData[i].id_order_ecom+' flex items-center gap-x-1 justify-center  rounded-sm px-2 py-2 bg-blue-200 text-blue-700 text-sm cursor-pointer text-center" onclick=handleSelesaiSetting("'+ jsonData[i].id_order_ecom+'")>validasi <i class="bi bi-check-all"></i></div><div class="'+ jsonData[i].id_order_ecom+' flex items-center justify-center gap-x-1  rounded-sm px-2 py-2 bg-orange-200 text-orange-700 text-sm cursor-pointer text-center" onclick=handleCancelSetting("'+ jsonData[i].id_order_ecom+'")>batalkan <i class="bi bi-arrow-return-right"></i></div></div>',
            jsonData[i].nama_akun_order,
            jsonData[i].nama_ekspedisi,
            jsonData[i].nama_mesin_cetak,
            jsonData[i].nama_bahan_cetak,
            jsonData[i].nama_laminasi,
            jsonData[i].qty_order,
            timeStamp,
            fileName,
            ]).draw();
    }
    }
});

// <div class="'+ jsonData[i].id_order_ecom+' flex items-center gap-x-1 justify-center  rounded-sm px-2 py-2 bg-blue-200 text-blue-700 text-sm cursor-pointer text-center" onclick=handleSelesaiSetting("'+ jsonData[i].id_order_ecom+'")>mulai cetak<i class="bi bi-printer-fill"></i></div>
}

function handleSelesaiSetting(id_ecomm){
    var btn = $('.'+id_ecomm);
    var divElement = $('<div>', {
        class: 'spinner-4',
    });
    btn.remove()
    var container = $('.container_'+id_ecomm)
    container.append(divElement)

    console.log(id_ecomm);
    $.ajax({
        url:'finnish_order/'+id_ecomm,
        type: 'GET',
        dataType: 'json',
        success:function(response){
            console.log(response);
            if(response.message === "ok"){
                updateTable(id_ecomm);
                iziToast.success({
                    title: 'Berhasil',
                    message: 'silahkan cetak order',
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
