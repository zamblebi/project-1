import axios from 'axios'

export const getProducts = ({commit}) => {
    axios.get('/clothing-lists')
    .then(response => commit("SET_PRODUCT", response.data))
    .catch(error => console.log(error))
}
