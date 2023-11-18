$(window).on("load", function() {
    var pilihanTerpilih = $("#bahan_cetak option:selected");
    var nilaiLebar = pilihanTerpilih.data("lebar");
    $("#lebar").val(nilaiLebar);

    setTimeout(function() {
      var loader = $("#loader")
      var container = $("#table_cust_container")

      loader.addClass("hidden")
      container.removeClass("hidden")
      }, 2000); // 3000 milidetik = 3 detik

});




var tableDataNew = new DataTable('#table_cust',{
    "select":true,

});

$('#table_cust tbody').on('click', 'tr', function () {
    // Mendapatkan data dari baris yang diklik
    var data = tableDataNew.row(this).data();

    // Menampilkan data dari kolom ke-2 dan ke-3
    if (data) {
        let nama = data[1]; // Nilai kolom ke-2
        let alamat = data[3]; // Nilai kolom ke-3
        let jenis = data[2];

        $('#nama_cust').val(nama)
        $('#jenis').val(jenis)
        console.log("clicked");
    }
});

function onChangeBahanCetak(){
    console.log("changed");
    var pilihanTerpilih = $("#bahan_cetak option:selected");
    var nilaiLebar = pilihanTerpilih.data("lebar");
    $("#lebar").val(nilaiLebar);
}
