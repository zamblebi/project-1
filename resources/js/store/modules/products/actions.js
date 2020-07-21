import axios from 'axios'
import products from '.'

export const getProducts = ({commit}) => {
    axios.get('/clothing-lists')
    .then(response => commit("SET_PRODUCT", response.data))
    .catch(error => console.log(error))
}
