import './bootstrap.js';
import App from "./components/App.vue"

Vue.component("my-app", App);

new Vue({
    el: '#app',
});
