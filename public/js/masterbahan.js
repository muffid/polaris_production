var tableDataEcom = new DataTable('#data_master_bahan',{"pageLength":50,});

function handleEdit(nama_bahan, lebar_bahan, id_bahan){
    $('#pop_up_edit').removeClass('hidden')
    $('#nama_bahan').val(nama_bahan)
    $('#lebar_bahan').val(lebar_bahan)
    $('#id_bahan').val(id_bahan)
}

function handleClosePopUp(){
    $('#pop_up_edit').addClass('hidden')
}
