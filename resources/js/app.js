require('./bootstrap');

import Vue from 'vue';
window.Vue = require('vue').default;

import VueRouter from 'vue-router';
import axios from 'axios';
import {routs} from './rout';
import navbar from './navbar.vue';

Vue.use(VueRouter);
Vue.prototype.axios = axios;



const routr = new VueRouter({
    mode: 'history',
    routes: routs
})

const navbarr = new Vue({
    el: '#navbar',
    router: routr,
    render: h => h(navbar),
})


