/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

import SuccesComponent from "./components/SuccesComponent";

window.Vue = require('vue');
import VueRouter from 'vue-router'
import VCalendar from 'v-calendar';
import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css';
import * as VueGoogleMaps from "vue2-google-maps";



import axios from 'axios'


Vue.use(VueRouter)
Vue.use(VCalendar, {
  componentPrefix: 'vc',
});

Vue.use(VueGoogleMaps, {
  load: {
    key: "AIzaSyDD96yZ7ysQwWIpzGuOqXecQMBbjjziyhk",
    libraries: "places" // necessary for places input
  }
});



Vue.component('VueCtkDateTimePicker', VueCtkDateTimePicker);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import ClothingComponent from './components/ClothingComponent';
import CartComponent from './components/CartComponent';
import DeliverableComponent from './components/DeliverableComponent';
import SlotsComponent from './components/SlotsComponent';
import AdressComponent from './components/AdressComponent';
import ValidateComponent from './components/ValidateComponent';
import UserProfilComponent from './components/profils/UserProfilComponent';
import EditProfilComponent from './components/profils/EditProfilComponent';
import EditPasswordComponent from './components/profils/EditPasswordComponent';
import OrderProfilComponent from './components/profils/OrderProfilComponent';
import GlobalOrderComponent from "./components/GlobalOrderComponent";
import LoaderComponent from "./components/LoaderComponent";



import store from './store'
import state from "./store/modules/carts/state";
import mutation from "./store/modules/carts/mutations";
import { method } from "lodash";

// debugger
store.subscribe((mutation,state) => {
  localStorage.setItem('store', JSON.stringify(state))
})
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const routes = [
    {path: '/order', component: ClothingComponent },
    // {path: '/order-cart', component: CartComponent },
    {path: '/order-deliverable', component: DeliverableComponent },
    {path: '/order-slots', component: SlotsComponent },
    {path: '/order-maps', component: AdressComponent },
    {path: '/order-validate', component: ValidateComponent },
    {path: '/order-success', component: SuccesComponent },
    {path: '/home/profil', component: ValidateComponent },
    {path: '/home/edit-profil', component: EditProfilComponent },
    {path: '/home/edit-password', component: EditPasswordComponent },
    {path: '/home/my-order-list', component: OrderProfilComponent },

]

const router = new VueRouter({
    mode: 'history',
    routes
})

// Vue.component('loader-component',LoaderComponent)

const app = new Vue({
    router,
    el: '#app',
    store,
    beforeCreate(){
      // debugger
      this.$store.commit('carts/INITIALISE_STORE')
      

    },
    components: {
       'clothing-component': ClothingComponent,
       'cart-component': CartComponent,
       'deliverable-component': DeliverableComponent,
       'slots-component': DeliverableComponent,
       'adress-component': AdressComponent,
       'user-profil': UserProfilComponent,
       'global-order': GlobalOrderComponent,
       'LoaderComponent': LoaderComponent,
    },
    mounted(){
      // this.enableInterceptor()
    //   // console.log(axios.interceptors.request.use)
    },
    data(){
      return{
      isLoading: false,
      axiosInterceptor: null,
    }
  },
    methods: {
      enableInterceptor(){
        this.axiosInterceptor = axios.interceptors.request.use((config) => {
          this.isLoading = true
          console.log(config);
          return config
        }, (error) => {
          this.isLoading = false
          console.log('axios');
          return Promise.reject(error)
        }
        )

        axios.interceptors.response.use((respone) => {
          this.isLoading = false 
          console.log('axios');
          return response

        }, function(error) {
          this.isLoading = false
          console.log('axios');
          return Promise.reject(error)
        }, 
        )
      },

      disableInterceptor(){
        axios.interceptors.request.reject(this.axiosInterceptor)
      }



    }
});
