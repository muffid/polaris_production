
flatpickr("#tanggal_order", {

    dateFormat: "Y-m-d",

});

var tableDataEcom = new DataTable('#data_ecomm',{
    "pageLength":50,

});

function callAjaxDataEcomm(id_akun){


    var tanggal = $("#tanggal_order").val();

    var loader = $("#loader");
    var table = $("#table_data");

    loader.removeClass("hidden");
    loader.addClass("flex");
    table.addClass("hidden");

    $.ajax({
        url:'get_ecomm_by_date/'+id_akun+'/'+tanggal,
        type: 'GET',
        dataType: 'json',
        success:function(response){
            // console.log(response);
            tableDataEcom.clear().draw();
            loader.removeClass("flex");
            loader.addClass("hidden");
            table.removeClass("hidden");
            var jsonData = JSON.parse(response);
            var classGiven = "";
            let iconGiven= "";
            console.log(jsonData);
            for (var i = 0; i < jsonData.length; i++) {
                if(jsonData[i].status=='Belum Setting'){
                    classGiven = " text-orange-700";
                    iconGiven = ' <i class="bi bi-exclamation-circle"></i>';
                }
                if(jsonData[i].status=='Proses Setting'){
                    classGiven = " text-blue-700";
                    iconGiven = ' <i class="bi bi-hourglass-split"></i>';
                }
               if(jsonData[i].status=='Setting Selesai'){
                    classGiven = "text-green-700";
                    iconGiven = ' <i class="bi bi-check-all"></i>';
                }
                tableDataEcom.row.add([
                   '<h1 class="rounded-full py-1 px-2 '+classGiven+' text-center">'+iconGiven+' '+jsonData[i].status+'</h1>',
                    jsonData[i].no_urut,
                    jsonData[i].no_sc,
                    jsonData[i].tanggal_order_formatted,
                    jsonData[i].tanggal_input_formatted,
                    jsonData[i].nama_akun_ecom,
                    jsonData[i].nama_akun_order,
                    jsonData[i].nama_penerima,
                    jsonData[i].nomor_order,
                    jsonData[i].sku,
                    jsonData[i].nama_ekspedisi,
                    jsonData[i].resi,
                    jsonData[i].warna,
                    jsonData[i].qty_order,
                    jsonData[i].nama_bahan_cetak,
                    jsonData[i].nama_laminasi,
                    jsonData[i].nama_mesin_cetak,
                    jsonData[i].panjang_bahan+' x '+jsonData[i].lebar_bahan+' cm',

                  ]).draw();
            }
        }
    });
}
