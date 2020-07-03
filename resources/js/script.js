// burger menu

var menu = document.querySelector('#menu-burger')

var stateNav = false
// ajouter un evenement click qui detectera l'evenement au moment du click
menu.addEventListener("click",(e) =>{
    if(stateNav == false){
        let nav = document.querySelector('.navbar-nav')
        nav.style.display = "flex"
        stateNav = true
    }else{
        let nav = document.querySelector('.navbar-nav')
        nav.style.display = "none"
        stateNav = false
    }
}, false)

// Slider app

