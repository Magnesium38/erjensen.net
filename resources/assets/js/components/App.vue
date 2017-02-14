<template>
    <div>
        <h1>{{ msg }}</h1>
        <button @click="makeRequest">Make request</button>
        <form action="/test" method="post">
            <input type="text" name="firstName" />
            <input type="text" name="lastName" />
            <input type="hidden" name="_token" :value="csrfToken">
            <input type="submit" />
        </form>
    </div>
</template>

<script>
    export default {
        name: 'my-app',
        data: function () {
            return {
                msg: 'Welcome to Your Vue.js App',
                csrfToken: "",
            }
        },
        mounted: function() {
            this.csrfToken = document.querySelector("#csrfToken").getAttribute("content");
        },
        methods: {
            makeRequest: function () {
                let vm = this;
                this.$http.request({
                    url: "/test",
                    method: "post",
                    data: {
                        "firstName": "Fred",
                    }
                }).then(function (response) {
                    console.log(response);
                    vm.msg = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
            },
        }
    }
</script>