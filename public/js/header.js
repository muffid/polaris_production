
    let count = 0;
    var menu = document.getElementById("menu");

    var btnMenu = document.getElementById("btnMenu");
    function togleMenu(){
        count++;
        if (count % 2 === 1) {
            
            openMenu();
        } else {
            closeMenu();
        }
        
    }

    function openMenu() {
        menu.classList.remove('-ml-72');
        menu.classList.add('ml-0');

        btnMenu.classList.remove('left-0');
        btnMenu.classList.add('left-72');
    }

    function closeMenu() {
        menu.classList.remove('ml-0');
        menu.classList.add('-ml-72');
        
        btnMenu.classList.remove('left-72');
        btnMenu.classList.add('left-0');
     
    }

    

   