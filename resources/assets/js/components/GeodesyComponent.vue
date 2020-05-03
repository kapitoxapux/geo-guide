<style>

</style>
<template>
    <div>
        <nav-component></nav-component>
        <main>
            <div class="main">
                <article class="zadacha" :for="(zadacha,i) in zadachas" :id="zadacha.id" @click="routeZadacha">
                    <div class="zadacha_1">
                        <div class="part_1">
                            <ul class="uslovia">
                                <li class="uslovia_1">{{zadacha.introtext}}</li>
                                <li class="uslovia_2">{{zadacha.description}}</li>
                            </ul>
                        </div>
                        <div class="part_2">
                            <!-- <img src="{{zadacha.img}}" alt="img"> -->
                            <img src="" alt="img">
                        </div>
                    </div>
                </article>
            </div>
        </main>
        <footer class="footer">
            <div class="mini-footer-content">© <a href="https://kapx-portfolio.tmweb.ru/" target="_blank">Powered by Kapx</a>, 2014</div>
            <div class="mini-footer-content-vk">
                <div>
                    <a href="https://vk.com/club83059811" target="blank" title="Я Вконтакте">VK</a>
                </div>
            </div>
        </footer>
    </div>
</template>

<script>
    import Nav from "./NavComponent";

    export default {
        data: function(){
            return {
                'message_type': 'Фильм'
            }
        },
        computed: {
            zadachas: {}
        },
        props: [
            //'push_id',
            //'genres'
        ],
        components: {
            'nav-component': Nav
        },
        mounted() {
            this.update();
        },
        methods: {
            update: function(){
                console.log('GeodesyComponent mounted!');
                this.$root.$options.methods.postRequest(
                    '/zadacha',
                    {
                        'parent': 2,
                    }).then(
                        (response) =>
                        {
                            if(response.status==='OK') return response.body;
                        }
                    ).then(
                        (myJson) =>
                        {
                            if(myJson.exception==='ErrorException') console.dir(myJson);
                            else this.zadachas=myJson;
                        }
                    );
            },
            routeZadacha: function(){
                console.dir();
            }
        }
    }
</script>
