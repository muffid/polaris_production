
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
                    '   <div  class="container_'+ jsonData[i].id_order_ecom+' flex items-center justify-center"><div class="'+ jsonData[i].id_order_ecom+' flex items-center gap-x-1 justify-center  rounded-sm px-2 py-2 bg-yellow-200 text-yellow-700 text-sm cursor-pointer text-center" onclick=handleRecycle("'+jsonData[i].id_order_ecom+'")>Barang Return<i class="bi bi-box-seam"></i></div></div>',
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

function handleRecycle(text){
    $('#pop_up_edit').removeClass('hidden')
}

function handleClosePopUp(){
    $('#pop_up_edit').addClass('hidden')
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

function ubahFormatTanggal() {

    let tanggalInput = $("#tanggal_order").val()
    let tanggalObj;
    const formatDMMYYYY = /^\d{2}\/\d{2}\/\d{4}$/;

    if (formatDMMYYYY.test(tanggalInput)) {
        const [tanggal, bulan, tahun] = tanggalInput.split('/');
        tanggalObj = new Date(`${tahun}-${bulan}-${tanggal}`);
    } else {
        try {
            tanggalObj = new Date(tanggalInput);
        } catch (error) {
            console.error("Format tanggal tidak dikenali.");
            return null;
        }
    }


    const tahun = tanggalObj.getFullYear();
    const bulan = ('0' + (tanggalObj.getMonth() + 1)).slice(-2);
    const tanggal = ('0' + tanggalObj.getDate()).slice(-2);


    const jam = ('0' + tanggalObj.getHours()).slice(-2);
    const menit = ('0' + tanggalObj.getMinutes()).slice(-2);


    const hasilFormat = `${tahun}-${bulan}-${tanggal} ${jam}:${menit}`;
    console.log(hasilFormat);
    $("#tanggal_order").val(hasilFormat)

}

