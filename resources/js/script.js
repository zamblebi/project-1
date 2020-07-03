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


/*

ensuite je vais rajouter une classe a l'element en charge du de la list du menu


de base l'affichage du menu sera en display : none;

la classe ajouter permetra de modifier l'affichige avec un display

creer 2 methode avec une methode qui permetra d'ajouter la classe quand elle sera lancer et une seconde
qui permetra de faire disparaitre l'element une fois recliquer

*/