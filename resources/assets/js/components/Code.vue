<template>
    <div>
        <pre ref="source" v-bind:class="languageClass"><code><slot></slot></code></pre>
    </div>
</template>

<style>

</style>

<script>
    export default{
        name: 'source-code',

        computed: {
            languageClass: function () {
                return "language-" + this.language;
            }
        },

        props: [
            'language'
        ]
    }
</script>
