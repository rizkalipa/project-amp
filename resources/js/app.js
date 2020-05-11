window.Vue = require('vue');

window.axios = require('axios');
window.axios.default.baseUrl = 'http://project-amp.local/';

import VueRouter from 'vue-router';
import Vuex from 'vuex';
import { routes } from './routes';
import stores from './store';

Vue.use(Vuex)
Vue.use(VueRouter);
let router = new VueRouter({
    mode: 'history',
    routes
})

let store = new Vuex.Store(stores)

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
    router,
    store
});
