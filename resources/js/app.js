require('./bootstrap');
window.Vue = require('vue');

import Axios from "axios";
import App from "./components/App";
import VueRouter from "vue-router";
import Vuex from "vuex";
import storeData from './store/index';
import {routes} from "./routes";
import vuetify from "./plugins/vuetify";

Vue.use(Vuex);
Vue.use(VueRouter);
Vue.prototype.$http = Axios;

const store = new Vuex.Store(storeData);
const router = new VueRouter({
    mode: 'history',
    routes
});

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router,
    store,
    vuetify
});
