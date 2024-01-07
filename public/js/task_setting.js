var tableDataEcom = new DataTable('#table_task_ecomm',
{
    "pageLength":100,
});

setTimeout(function() {
    callAjaxDataEcomm('{{session("id")}}');
}, 1000);

function callAjaxDataEcomm(id_akun){

var loader = $("#loader");
var table = $("#table_data_ecomm");
var fileName = '';

$.ajax({
    url:"get_ecomm_on_proses/"+id_akun,
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

        fileName = jsonData[i]['no_sc']+'-'+ jsonData[i]['nama_akun_ecom']+'-'+ jsonData[i]['nomor_order']+'-'+ jsonData[i]['nama_akun_order']+
        '-'+ jsonData[i]['nama_penerima']+'-'+ jsonData[i]['sku']+'-'+jsonData[i]['warna']+
       '-'+jsonData[i]['order_time'].substring(0,jsonData[i]['order_time'].length - 6)+'-'+jsonData[i]['panjang_bahan']+'x'+jsonData[i]['lebar_bahan']

        tableDataEcom.row.add([
            '<div class="flex items-center"><input id="myCheckbox" name="myCheckbox" type="checkbox" class="myCheckbox form-checkbox h-5 w-5 text-indigo-600"><label for="myCheckbox" class="ml-2 text-gray-700">Copy Text</label></div>',
           '<h1 class="text-blue-700 "> <i class="bi bi-hourglass-split"></i> <span> Proses Seting</span></h1>',
            jsonData[i].no_urut,
            jsonData[i].order_time,
            timeStamp,
            fileName,
            ]).draw();
    }
    }
});

// <div class="'+ jsonData[i].id_order_ecom+' flex items-center gap-x-1 justify-center  rounded-sm px-2 py-2 bg-blue-200 text-blue-700 text-sm cursor-pointer text-center" onclick=handleSelesaiSetting("'+ jsonData[i].id_order_ecom+'")>tandai selesai <i class="bi bi-check-all"></i></div>
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

$(document).ready(function () {
    const dataTable = $('#table_task_ecomm').DataTable();

    // Memantau perubahan pada checkbox
    $('#table_task_ecomm').on('change', '.myCheckbox', function () {
      let combinedText = '';

      // Iterasi setiap checkbox untuk mengumpulkan teks
      $('.myCheckbox').each(function () {
        const row = dataTable.row($(this).closest('tr'));
        console.log('ere');
        if (this.checked) {
          const data = row.data(); // Mendapatkan data dari baris
          combinedText += data[5] + '\n'; // Mengambil data dari kolom ke-4
        }
      });

      // Mengganti teks atau melakukan sesuatu dengan hasilnya
      console.log('Teks Gabungan: ' + combinedText);
      navigator.clipboard.writeText(combinedText)
    });

    // Tombol untuk menyalin teks yang dikumpulkan
    $('#copyButton').on('click', function () {
      // Logika untuk menyalin teks yang telah dikumpulkan
      // Misalnya, menggunakan Clipboard API atau menampilkan dalam elemen HTML
    });
  });
