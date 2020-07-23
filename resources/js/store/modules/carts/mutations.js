import state from "../products/state"

export const PUSH_PRODUCT_ON_CART = (state, product) => {
    state.carts.push({product, quantity: 1, price: product.prix})
}

//change value quantity on the state
export const CHANGE_QUANTITY = (state, {cartIndex,cartQty}) => {
    // state.carts[cartIndex].quantity = 
 console.log(cartQty)
    // state.allPrice.push(state.carts[cartIndex].price)
}

export const DELETE_ON_CART = (state, cartIndex) => {
    state.carts.splice(cartIndex, 1);
}

export const INCREMENT = (state, n) => {
    state.carts[n].quantity++
    // debugger
    state.carts[n].price = state.carts[n].product.prix * state.carts[n].quantity  
}
export const DECREMENT = (state, n) => {
    if(state.carts[n].quantity != 1){
        state.carts[n].quantity--
        state.carts[n].price -= state.carts[n].product.prix
    }
}


export const COUNT_ALL = (state) => {
    // console.log(state.carts)
    // state.carts.forEach(element => {
        var singlePrice;

            // singlePrice = element.price * element.quantity
            // state.allPrice.push(singlePrice)
            for(var i = 0; i < state.carts.lengh; i++){
                console.log(carts[i])
            }
            // if
    //         console.log(state.allPrice)
    //    console.log(element.quantity, element.price) 
    // });
}