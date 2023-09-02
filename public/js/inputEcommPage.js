
    flatpickr("#tanggal_order", {
        // Opsi-opsi konfigurasi di sini
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        time_24hr: true,
    });

    function callAjax() {
        var myTable = $('#example').DataTable();
        var btnContainer = document.getElementById("button_container");
        showBtnProcess();
        var popUp = document.getElementById("popup");
        btnContainer.classList.add('hidden');
        var id = idToDelete;
        fetch('/delete_order_ecom/'+id)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Respon jaringan tidak berhasil');
                }
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
            })
            .catch(error => {
                console.error('Error:', error);
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
        popUp.classList.remove('flex');
        popUp.classList.add('hidden');
    }

    function showBtnProcess(){
        var btnProcess = document.getElementById("button_process");
        btnProcess.classList.remove('hidden');
        btnProcess.classList.add('flex');
    }

    var tableDataNew = new DataTable('#example');
    var tableOnProgress = new DataTable('#onProgress');


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

    function updateTable(){
        tableDataNew.clear().draw();
    }
