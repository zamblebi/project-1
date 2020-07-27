import axios from 'axios'

export const getProducts = ({commit}) => {
    axios.get('/clothing-lists')
    .then(response => commit("SET_PRODUCT", response.data))
    .catch(error => console.log(error))
}


export const getCategories = ({commit}) => {
    axios.get('/category-lists')
    .then(response => commit("SET_CATEGORY", response.data))
    .catch(error => console.log(error))
}