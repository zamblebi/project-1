/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
import VCalendar from 'v-calendar';
import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css';
import * as VueGoogleMaps from "vue2-google-maps";

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
import DeliverableComponent from './components/DeliverableComponent';
import SlotsComponent from './components/SlotsComponent';
import AdressComponent from './components/AdressComponent';
import ValidateComponent from './components/ValidateComponent';


// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const routes = [
    {path: '/', component: ClothingComponent },
    {path: '/order-deliverable', component: DeliverableComponent },
    {path: '/order-slots', component: SlotsComponent },
    {path: '/maps-order', component: AdressComponent },
    {path: '/order-validate', component: ValidateComponent },

]

const router = new VueRouter({
    routes
})


const app = new Vue({
    router,
    el: '#app',
    components: {
       'clothing-component': ClothingComponent,
       'deliverable-component': DeliverableComponent,
       'slots-component': DeliverableComponent,
       'adress-component': AdressComponent,
    }
});
