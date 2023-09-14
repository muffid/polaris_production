
flatpickr("#tanggal_order", {

    dateFormat: "Y-m-d",

});

var tableDataEcom = new DataTable('#data_ecomm',{
    "pageLength":50,
});

function callAjaxDataEcomm(id_akun){
    //tampilkan loader

        tableDataEcom.clear().draw();

    // var tanggal = $("#tanggal_order").val();

    // var loader = $("#loader");
    // var table = $("#table_data");

    // loader.removeClass("hidden");
    // loader.addClass("flex");
    // table.addClass("hidden");

    // $.ajax({
    //     url: '/get_ecomm_by_date/'+id_akun+'/'+tanggal,
    //     type: 'GET',
    //     dataType: 'json',
    //     success: function (response) {
    //         $('#data_ecomm tbody').empty();
    //         $('#data_ecomm').DataTable().clear().draw();
    //         if(response !== '[]'){
    //             var tdEmpty = $(".dataTables_empty");
    //             tdEmpty.addClass("hidden");
    //             console.log("empty");
    //         }
    //         loader.addClass("hidden");
    //         loader.removeClass("flex");
    //         table.removeClass("hidden");
    //         var jsonData = JSON.parse(response);
    //         var i = 1;

    //         jsonData.forEach(item => {
    //         const { status,no_urut, order_time, time, nama_akun_ecom, nama_akun_order,nama_penerima, nomor_order,
    //             sku,
    //             nama_ekspedisi,
    //             warna,
    //             qty_order,
    //             nama_bahan_cetak,
    //             nama_laminasi,
    //             nama_mesin_cetak,lebar_bahan,panjang_bahan } = item;



    //         var isOdd = i % 2 !== 0;
    //         var $tr = $('<tr>' +
    //             '<td><div class="rounded-full py-1 px-2" id="kolom'+i+'">'+status+'</div></td>' +
    //             '<td>' + no_urut+ '</td>' +
    //             '<td>' + order_time+ '</td>' +
    //             '<td>' +  time+ '</td>' +
    //             '<td>' + nama_akun_ecom+ '</td>' +
    //             '<td>' + nama_akun_order+ '</td>' +
    //             '<td>' + nama_penerima+ '</td>' +
    //             '<td>' +  nomor_order+ '</td>' +
    //             '<td>' + sku+ '</td>' +
    //             '<td>' + nama_ekspedisi+ '</td>' +
    //             '<td>' +  warna+ '</td>' +
    //             '<td>' + qty_order+ '</td>' +
    //             '<td>' + nama_bahan_cetak+ '</td>' +
    //             '<td>' +  nama_laminasi+ '</td>' +
    //             '<td>' + nama_mesin_cetak+ '</td>' +
    //             '<td>' + panjang_bahan +'x'+lebar_bahan+ '</td>'
    //         );
    //         if (isOdd) {
    //             $tr.addClass("odd");
    //         }else{
    //             $tr.addClass("even");
    //         }

    //         $('#data_ecomm tbody').append($tr);
    //         let kolomStatus = $("#kolom"+i);
    //         let teksStatus = $("#kolom"+i).text();
    //         if(teksStatus=="Belum Setting"){
    //             kolomStatus.addClass("bg-orange-200 text-orange-700");
    //         }
    //         if(teksStatus=="Proses Setting"){
    //             kolomStatus.addClass("bg-blue-200 text-blue-700");
    //         }
    //         if(teksStatus=="Sudah Setting"){
    //             kolomStatus.addClass("bg-green-200 text-green-700");
    //         }
    //         i++;
    //     });

    //     },
    //     error: function (xhr, status, error) {
    //         console.error(error);
    //     }
    // });
}
