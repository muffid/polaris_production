
$(document).ready(function() {
    setTimeout(function() {
      // Fungsi atau kode yang ingin dieksekusi setelah 3 detik
      console.log("Eksekusi setelah 3 detik");
      var loader = $("#loader")
      loader.addClass("hidden")
      var container = $("#container_order")
      container.removeClass("hidden")

      // Misalnya, Anda ingin melakukan sesuatu dengan elemen tertentu setelah waktu tertentu:
      // $('#elemenID').addClass('highlight'); // Contoh menambah kelas 'highlight' pada elemen dengan ID 'elemenID'
    }, 1000); // 3000 milidetik = 3 detik
  });



var tableDataEcom = new DataTable('#order_tuntas',{
    "pageLength":50,

});

jSuites.calendar(document.getElementById('tanggal_order'), {
    type: 'year-month-picker',
    format: 'YYYY-MM',
});


function callAjaxDataEcomm(){

    var tanggal = $("#tanggal_order").val();

    var loader = $("#loader");
    var table = $("#container_order");

    loader.removeClass("hidden");
    loader.addClass("flex");
    table.addClass("hidden");

    $.ajax({
        url:'order_tuntas_bulan/'+tanggal,
        type: 'GET',
        dataType: 'json',
        success:function(response){
            // console.log(response);
            tableDataEcom.clear().draw();
            loader.addClass("hidden");
            table.removeClass("hidden");
            var jsonData = JSON.parse(response);
            console.log(jsonData);

            for (var i = 0; i < jsonData.length; i++) {

                tableDataEcom.row.add([

                    i+1,
                    '   <div  class="container_'+ jsonData[i].id_order_ecom+' flex items-center justify-center"><div class="'+ jsonData[i].id_order_ecom+' flex items-center gap-x-1 justify-center  rounded-sm px-2 py-2 bg-yellow-200 text-yellow-700 text-sm cursor-pointer text-center" onclick=handleReturn("'+jsonData[i].id_order_ecom+'")>Barang Return<i class="bi bi-box-seam"></i></div></div>',
                    jsonData[i].nama_desainer,
                    jsonData[i].nama_penyetting,
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

function handleReturn(id_order){
    // console.log(id_order);
    var btn = $('.'+id_order);
    var divElement = $('<div>', {
        class: 'spinner-4',
    });
    btn.remove()
    var container = $('.container_'+id_order)
    container.append(divElement)
    $.ajax({
        url:'set_return/'+id_order,
        type: 'GET',
        dataType: 'json',
        success:function(response){
            var jsonData = JSON.parse(response);
            console.log(jsonData);
            if(jsonData.message =="ok"){
                updateTable(id_order);
                iziToast.success({
                    title: 'Berhasil',
                    message: 'Order Ditambahakan Ke Stok Return',
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

