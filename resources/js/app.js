require('./bootstrap');
import './plugins/http/index.js'
import Vue from 'vue'
import App from './AppBase.vue'
import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";

import VueRouter from 'vue-router';
import router from '@/router';
import store from '@/store';

Vue.use(VueRouter);

import dateFilter from "./filters/date.filter";
Vue.filter("date", dateFilter);

new Vue({
    router,
    store,
    render: h => h(App),
}).$mount('#app')
