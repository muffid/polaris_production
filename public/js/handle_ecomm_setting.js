document.addEventListener("DOMContentLoaded", function () {

callAjaxDataEcomm();


});

var tableDataEcom = new DataTable('#data_ecomm',{

});


function callAjaxDataEcomm(){
    var loader = $("#loader");
    var table = $("#table_data_ecomm");
    var fileName = '';

    $.ajax({
        url:'/get_ecomm_unapprove',
        type: 'GET',
        dataType: 'json',
        success:function(response){
            tableDataEcom.clear().draw();
            loader.removeClass("flex");
            loader.addClass("hidden");
            table.removeClass("hidden");
            var jsonData = JSON.parse(response);
            console.log(jsonData);
            for (var i = 0; i < jsonData.length; i++) {

                fileName = jsonData[i]['no_urut']+'-'+ jsonData[i]['nama_akun_ecom']+'-'+ jsonData[i]['nama_akun_order']+
                            '-'+ jsonData[i]['nama_penerima']+'-'+ jsonData[i]['sku']+'-'+jsonData[i]['warna']+'-'+jsonData[i]['panjang_bahan']+
                            '-'+jsonData[i]['nama_ekspedisi']+'-'+jsonData[i]['order_time'];

                tableDataEcom.row.add([
                   '<h1 class="rounded-full px-2 py-1 bg-green-200 text-green-700 text-sm cursor-pointer text-center" onclick=handleSetting("'+ jsonData[i].id_order_ecom+'")>Kerjakan</h1>',
                    jsonData[i].no_urut,
                    jsonData[i].order_time,
                    jsonData[i].time,
                    fileName,
                  ]).draw();
            }
        }
    });


}

function handleSetting(id_ecomm){
    alert(id_ecomm);
}
