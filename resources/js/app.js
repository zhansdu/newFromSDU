require('./bootstrap');
window.Vue = require('vue');

import Axios from "axios";
import App from "./App";
import router from "./router";
import vuetify from "./components/plugins/vuetify";
import store from './store'

Vue.prototype.$http = Axios;

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router,
    store,
    vuetify
});

Vue.config.productionTip = false

