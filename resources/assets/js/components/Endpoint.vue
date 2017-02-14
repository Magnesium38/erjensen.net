<template>
    <div>
        <endpoint-header></endpoint-header>
        <endpoint-authentication></endpoint-authentication>
        <endpoint-url></endpoint-url>
        <endpoint-options></endpoint-options>
        <endpoint-example exampleType="request" language="bash">
            <p slot="subtext">This is my subtext.</p>
            <div slot="code">
                curl -H 'Accept: application/vnd.twitchtv.v5+json' \
                -H 'Client-ID: uo6dggojyb8d6soh92zknwmi5ej1q2' \
                -H 'Authorization: OAuth cfabdegwdoklmawdzdo98xt2fo512y' \
                -X GET 'https://api.twitch.tv/kraken/channel'
            </div>
        </endpoint-example>
        <endpoint-example exampleType="response" language="json">
            <div slot="code">
                {
                    "_id": 44322889,
                    "broadcaster_language": "en",
                    "created_at": "2013-06-03T19:12:02Z",
                    "display_name": "dallas",
                    "email": "email-address@provider.com",
                    "followers": 40,
                    "game": "Final Fantasy XV",
                    "language": "en",
                    "logo": "https://static-cdn.jtvnw.net/jtv_user_pictures/dallas-profile_image-1a2c906ee2c35f12-300x300.png",
                    "mature": true,
                    "name": "dallas",
                    "partner": false,
                    "profile_banner": null,
                    "profile_banner_background_color": null,
                    "status": "The Finalest of Fantasies.",
                    "stream_key": "live_44322889_nCGwsCl38pt21oj4UJJZbFQ9nrVIU5",
                    "updated_at": "2016-12-08T03:01:37Z",
                    "url": "https://www.twitch.tv/dallas",
                    "video_banner": null,
                    "views": 239
                }
            </div>
        </endpoint-example>
    </div>
</template>

<style>
    h1 {
        background-color: #00ee00;
        color: #2e2e2e;
    }
</style>

<script>
    import Header from './endpoint/Header.vue'
    import Authentication from './endpoint/Authentication.vue'
    import Url from './endpoint/Url.vue'
    import Options from './endpoint/Options.vue'
    import Example from './endpoint/Example.vue'

    export default {
        name: 'my-endpoint',
        components: {
            'endpoint-header': Header,
            'endpoint-authentication': Authentication,
            'endpoint-url': Url,
            'endpoint-options': Options,
            'endpoint-example': Example,
        }
    }
</script>