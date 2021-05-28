require('./bootstrap');

import Vue from 'vue'
import App from './AppBase.vue'
import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";

import VueRouter from 'vue-router';
import router from '@/router';

Vue.use(VueRouter);

new Vue({
    router,
    render: h => h(App),
}).$mount('#app')
