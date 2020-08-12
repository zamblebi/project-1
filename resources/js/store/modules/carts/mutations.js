import { expr } from "jquery"
import store from "../../../store"


export const PUSH_PRODUCT_ON_CART = (state, product) => {
    state.carts.push({product, quantity: 1, price: product.prix})
    // console.log(state.allPrice)
    var total = 0;
    state.carts.forEach(element => {
        total += element.price
        // console.log('ceci est le prix total avant : ' ,total += element.price)
    });
    state.allPrice = total

}

//change value quantity on the state
export const CHANGE_QUANTITY = (state, {cartIndex,cartQty}) => {
    // if(cartQty == ''){
    //     state.carts[cartIndex].quantity = 1;
    //     console.log('ok')
    // }else{

        state.carts[cartIndex].quantity = cartQty 
        // console.log(cartQty)
        state.carts[cartIndex].price = state.carts[cartIndex].product.prix * state.carts[cartIndex].quantity  
        // state.allPrice.push(state.carts[cartIndex].price)
        var total = 0;
        state.carts.forEach(element => {
            total += element.price
            // console.log('ceci est le prix total avant : ' ,total += element.price)
        });
        state.allPrice = total
    // }   
}

export const DELETE_ON_CART = (state, cartIndex) => {
    state.carts.splice(cartIndex, 1);

    var total = 0;
    state.carts.forEach(element => {
        total += element.price
        // console.log(total += element.price)
    });
    state.allPrice = total

}


// incrementer la quantiter
export const INCREMENT = (state, n) => {
    // debugger
    state.carts[n].quantity++
    state.carts[n].price = state.carts[n].product.prix * state.carts[n].quantity 
    
    
    var total = 0;
    state.carts.forEach(element => {
        total += element.price
        // console.log('ceci est le prix total avant : ' ,total += element.price)
    });
    state.allPrice = total
}

// decrementer la quantiter
export const DECREMENT = (state, n) => {
    if(state.carts[n].quantity != 1){
        state.carts[n].quantity--
        state.carts[n].price -= state.carts[n].product.prix
        var total = 0;
            state.carts.forEach(element => {
                total += element.price
                // console.log('ceci est le prix total avant : ' ,total += element.price)
            });
            state.allPrice = total

    }
}

//calculer le prix total
// export const COUNT_ALL = (state) => {
//     // console.log(state.carts)
//     var total = 0;
//     state.carts.forEach(element => {
//         console.log(total += element.price)
//     });
//     state.allPrice = total
// }


export const INITIALISE_STORE = (state) => {
    var self = this
    if(localStorage.getItem('store')){
        // debugger
        store.replaceState(
            Object.assign(state, JSON.parse(localStorage.getItem('store')))
        )
    }
    console.log([JSON.parse(localStorage.getItem('store')).carts])
}