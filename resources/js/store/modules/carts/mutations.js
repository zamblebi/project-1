

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


// incrementer la quantiter
export const INCREMENT = (state, n) => {
    state.carts[n].quantity++
    // debugger
    state.carts[n].price = state.carts[n].product.prix * state.carts[n].quantity  
}

// decrementer la quantiter
export const DECREMENT = (state, n) => {
    if(state.carts[n].quantity != 1){
        state.carts[n].quantity--
        state.carts[n].price -= state.carts[n].product.prix
    }
}

//calculer le prix total
export const COUNT_ALL = (state) => {
    // console.log(state.carts)
    var total = 0;
    state.carts.forEach(element => {
        console.log(total += element.price)
    });
    state.allPrice = total
}