import './bootstrap.js';
import App from "./components/App.vue"
//import Endpoint from "./components/Endpoint.vue"

Vue.component("my-app", App);
//Vue.component("my-endpoint", Endpoint);

new Vue({
    el: '#app',
});
