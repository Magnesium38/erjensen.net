<template>
    <div>
        <h3>{{ header }}</h3>
        <slot name="subtext"></slot>
        <table class="code">
            <source-code :language="language">
                <slot name="code"></slot>
            </source-code>
        </table>
    </div>
</template>

<style lang="scss">
</style>

<script>
    import Code from '../Code.vue'

    export default {
        name: 'endpoint-header',

        components: {
            'source-code': Code,
        },

        computed: {
            header: function () {
                switch (this.exampleType) {
                    case "request":
                        return "Example Request";
                        break;
                    case "response":
                        return "Example Response";
                        break;
                    default:
                        return "Example";
                        break;
                }
            }
        },

        props: [
            'exampleType',
            'language'
        ]
    }
</script>