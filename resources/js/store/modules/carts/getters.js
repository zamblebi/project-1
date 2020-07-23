import products from "../products"


export const clothingQty = (state) => {
   return state.carts.length
}


export const priceClt = (state) => cart  => {
   
   
    if(cart.price){
        return cart.price 
    } 
    
}

// export const totalPrice = (state, getters, rootState) => {
//     // debugger
//      state.carts.reduce((total, cart) => {
//        return console.log(total + cart.price)
//        }, 0)
//         // console.log(state.)

//     // }
//     // console.log(state.carts) 
// }


// export const getAllCarts = (state, getters, rootState) => {
//     return state.carts.map((id) => {
//         const cart = rootState.carts.carts.find(cart => cart.id == id)
//         return console.log(cart)
        
//     })
// }