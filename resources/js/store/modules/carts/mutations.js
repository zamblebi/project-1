import state from "../products/state"

export const PUSH_PRODUCT_ON_CART = (state, product) => {
    state.carts.push({product, quantity: 1})
}

//change value quantity on the state
export const CHANGE_QUANTITY = (state, {cartIndex,cartQty}) => {
    state.carts[cartIndex].quantity = cartQty
}

export const DELETE_ON_CART = (state, cartIndex) => {
    state.carts.splice(cartIndex, 1);
}