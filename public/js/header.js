
var isOpen = false;
    document.addEventListener('click', function(event) {

        var buttonShow = document.getElementById('btnMenu');
        var buttonMenu = document.getElementById('iconMenu');
        var menu = document.getElementById("menu");

        if(event.target == buttonShow && !isOpen){
            menu.classList.remove('-ml-72');
            menu.classList.add('ml-0');
            isOpen = true;

        }

        if(event.target !== buttonMenu && event.target !== buttonShow ){
            console.log("click");
            if(isOpen){
                menu.classList.remove('ml-0');
                menu.classList.add('-ml-72');
                isOpen = false;
            }
        }


        if(event.target == buttonMenu && isOpen){
            menu.classList.remove('ml-0');
            menu.classList.add('-ml-72');
            isOpen = false;
        }






    });





