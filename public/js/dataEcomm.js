
flatpickr("#tanggal_order", {

    dateFormat: "Y-m-d",

});

var tableDataEcom = new DataTable('#data_ecomm',{
    "pageLength":50,
});

function callAjaxDataEcomm(id_akun){
    //tampilkan loader

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
            console.log(response);
            tableDataEcom.clear().draw();
            loader.removeClass("flex");
            loader.addClass("hidden");
            table.removeClass("hidden");
            var jsonData = JSON.parse(response);
            var classGiven = "";
            console.log(jsonData);
            for (var i = 0; i < jsonData.length; i++) {
                if(jsonData[i].status=='Belum Setting'){
                    classGiven = "bg-orange-200 text-orange-700";
                }
                if(jsonData[i].status=='Proses Setting'){
                    classGiven = "bg-blue-200 text-blue-700";
                }
                if(jsonData[i].status=='Sudah Setting'){
                    classGiven = "bg-green-200 text-green-700";
                }
                tableDataEcom.row.add([
                   '<h1 class="rounded-full py-1 px-2 '+classGiven+' text-center">'+jsonData[i].status+'</h1>',
                    jsonData[i].no_urut,
                    jsonData[i].tanggal_order_formatted,
                    jsonData[i].tanggal_input_formatted,
                    jsonData[i].nama_akun_ecom,
                    jsonData[i].nama_akun_order,
                    jsonData[i].nama_penerima,
                    jsonData[i].nomor_order,
                    jsonData[i].sku,
                    jsonData[i].nama_ekspedisi,
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
