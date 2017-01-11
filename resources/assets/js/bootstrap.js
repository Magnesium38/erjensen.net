import axios from 'axios';
import Vue from 'vue';
import VueRouter from 'vue-router';

window.axios = axios;
axios.defaults.headers.common = {
    "X-Requested-With": "XMLHttpRequest",
    "X-CSRF-TOKEN": document.querySelector("#csrfToken").getAttribute("content"),
};

Vue.use(VueRouter);
Vue.prototype.$http = axios;

window.axios = axios;
window.Vue = Vue;