var inputElement = document.getElementById("resi")
var totalQueue = 0

window.addEventListener("load", function() {
  inputElement.focus()
})
window.addEventListener("click", function() {
  inputElement.focus()
})

var typingTimer
var doneTypingInterval = 250

function callFunction() {
    const inputValue = inputElement.value.trim()
    if(inputValue !== ''){
        addNewQueue()
        inputElement.value = ''
    }
}

let btnRemove = $(".remove-all")
btnRemove.click(function(){
    $("#containerQueue > div:not(.resi-div)").remove()
    totalQueue = 0
})


inputElement.addEventListener("input", function() {
  clearTimeout(typingTimer)
  typingTimer = setTimeout(callFunction, doneTypingInterval)
})

function addNewQueue(){

    totalQueue++
    var taskText = $("#resi").val()
    var container = $("#containerQueue")
    $.ajax({
        url:'get_order_ecomm_by_resi/'+taskText,
        type: 'GET',
        dataType: 'json',
        success:function(response,status){
            if(status === 'success'){
                let jsonData = JSON.parse(response)
                if(jsonData.length>0){
                    console.log(jsonData);
                    let newQueue = ' <div id="container_'+totalQueue+'_'+taskText+'" class="order flex flex-row w-full p-4 bg-white rounded-xl items-center justify-between"><h1 class="text-slate-600 ">'+
                    getDetailInfo(jsonData[0])+'</h1><div class="order-info-'+taskText+' flex flex-row items-center justify-end gap-x-6"><h1 class="text-sm text-slate-500 italic text-right">diorder pada '
                    +jsonData[0].tanggal_order_formatted+'</h1></div></div>'
                    container.prepend(newQueue)
                    $(".order").find('.delete-order').click(function() {
                        $(this).closest(".order").remove()
                        totalQueue--
                    })
                    $("#container_"+totalQueue+'_'+taskText).find('.order-info-'+taskText).append('<div class="spinner-4"></div>')

                        callApi(totalQueue,jsonData[0].id_order_ecom,taskText)

                }else{
                    iziToast.error({
                        title: 'Invalid',
                        message: 'Tidak menemukan Data',
                        position: 'topRight',
                    })
                }
            }
        }
    })
}

function getDetailInfo(object){
    return object.no_urut+'-'+object.nama_akun_order+'-'+object.nama_penerima+'-'+object.sku+'-'+object.warna+'-'+object.nama_ekspedisi+'-'+object.resi
}

function callApi(totalQueue,id_order,taskText){
    $.ajax({
        url:'set_tuntas_ecomm/'+id_order,
        type: 'GET',
        dataType: 'json',
        success:function(response,status,jqXHR){
            if(jqXHR.status == 200){
                $("#container_"+totalQueue+'_'+taskText).find('.spinner-4').remove()
                $("#container_"+totalQueue+'_'+taskText).find('.order-info-'+taskText).append('<h1 class="text-sm text-green-700"><i class="bi bi-check-all"></i> sukses</h1>')
                iziToast.success({
                    title: 'Berhasil',
                    message: 'Order valid',
                    position: 'topRight',
                })
            }else{
                $("#container_"+totalQueue+'_'+taskText).find('.spinner-4').remove()
                $("#container_"+totalQueue+'_'+taskText).find('.order-info-'+taskText).append('<h1 class="text-sm text-red-700"><i class="bi bi-check-all"></i>Gagal</h1>')
                iziToast.error({
                    title: 'Gagal',
                    message: 'Order valid',
                    position: 'topRight',
                })
            }
        }
    })

}



