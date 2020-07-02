require('./bootstrap');
window.Vue = require('vue');

import Axios from "axios";
import App from "./App";
import routes from './routes/index'
import vuetify from "./plugins/vuetify";
import store from './store/index';

Vue.prototype.$http = Axios;

const app = new Vue({
    el: '#app',
    render: h => h(App),
    routes,
    store,
    vuetify
});

Vue.config.productionTip = false
