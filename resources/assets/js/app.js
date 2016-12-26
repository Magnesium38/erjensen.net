import axios from "axios"
import Vue from "vue"

import App from "./components/App.vue"

Vue.prototype.$http = axios;
axios.defaults.headers.common["X-CSRF-TOKEN"] = document.querySelector("#csrfToken").getAttribute("content");

Vue.component("my-app", App);

new Vue({
    el: '#app'
});
