
$(window).on("load", function() {
    var pilihanTerpilih = $("#bahan_cetak option:selected");
    var nilaiLebar = pilihanTerpilih.data("lebar");
    $("#lebar_bahan").val(nilaiLebar);

});

    function onChangeBahanCetak(){
        var pilihanTerpilih = $("#bahan_cetak option:selected");
        var nilaiLebar = pilihanTerpilih.data("lebar");
        $("#lebar_bahan").val(nilaiLebar);
    }

    // flatpickr("#tanggal_order", {
    //     // Opsi-opsi konfigurasi di sini
    //     enableTime: true,
    //     dateFormat: "Y-m-d H:i",
    //     time_24hr: true,
    // });

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

    function callAjax() {
        var myTable = $('#example').DataTable();
        var btnContainer = document.getElementById("button_container");
        showBtnProcess();
        var popUp = document.getElementById("popup");
        btnContainer.classList.remove('flex');
        btnContainer.classList.add('hidden');
        var id = idToDelete;
        $.ajax({
            url:'delete_order_ecom/'+id,
            type: 'GET',
            dataType: 'json',
            success:function(response){
                console.log(response);

                if (!response.message == 'ok') {
                    throw new Error('Respon jaringan tidak berhasil');
                }else{
                    btnContainer.classList.remove('hidden');
                    btnContainer.classList.add('flex');
                    var row = myTable.row($('[data-id="' + idRowToDelete + '"]'));
                    row.remove().draw();
                    closeDeleteDialog();
                    iziToast.success({
                        title: 'Deleted',
                        message: 'Data Berhasil Dihapus',
                        position: 'topRight',
                        theme: 'dark',
                        color: 'dark',
                    });
                }
                console.log(response.message);
            }
        });
    }
    var idToDelete = "";
    var idRowToDelete = "";
    function showDeleteDialog(id,nomor,idRow){
        idToDelete = id;
        idRowToDelete = idRow;
        var popUp = document.getElementById("popup");
        var data_hapus = document.getElementById("data_hapus");
        popUp.classList.remove('hidden');
        popUp.classList.add('flex');
        data_hapus.innerHTML = "nomor order : "+nomor;
    }

    function closeDeleteDialog(){
        var popUp = document.getElementById("popup");
        var btnProcess = document.getElementById("button_process");
        btnProcess.classList.remove('flex');
        btnProcess.classList.add('hidden');
        popUp.classList.remove('flex');
        popUp.classList.add('hidden');
    }

    function showBtnProcess(){
        var btnProcess = document.getElementById("button_process");
        btnProcess.classList.remove('hidden');
        btnProcess.classList.add('flex');
    }

    var tableDataNew = new DataTable('#example',{

    });



    function copyText(text) {
        navigator.clipboard.writeText(text)
            .then(() => {
            console.log('Teks berhasil di-copy ke clipboard.');
            iziToast.info({
                    title: 'Copied',
                    message: 'Teks Berhasil Di copy',
                    position: 'topRight',
                    theme: 'dark',
                    color: 'black',
                });
            })
            .catch((error) => {
            console.error('Gagal menyalin teks ke clipboard:', error);
            });
    }
    function copyTextDirect(text) {
        navigator.clipboard.writeText(text)
            .then(() => {
            console.log('Teks berhasil di-copy ke clipboard.');
            // iziToast.info({
            //         title: 'Copied',
            //         message: 'Teks Berhasil Di copy',
            //         position: 'topRight',
            //         theme: 'dark',
            //         color: 'black',
            //     });
            })
            .catch((error) => {
            console.error('Gagal menyalin teks ke clipboard:', error);
            });
    }

    function updateTable(){
        tableDataNew.clear().draw();
    }
