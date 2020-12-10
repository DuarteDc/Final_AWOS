require('./bootstrap');
window.Vue = require('vue');
import axios from 'axios';
axios.defaults.baseURL = 'http://127.0.0.1:8000/api/'; 
Vue.component('Usuarios', require('./components/UComponent.vue').default);
Vue.component('Productos', require('./components/PComponent.vue').default);
Vue.component('Ventas', require('./components/VComponent.vue').default);
const app = new Vue({
    el: '#app',
});
