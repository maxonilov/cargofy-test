require('./bootstrap');
window.Vue = require('vue');

import Vue from 'vue';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.use(VueSweetalert2);


import FreightExchange from "./components/FreightExchange";

const app = new Vue({
    el: '#app',
    components: {FreightExchange}
});
