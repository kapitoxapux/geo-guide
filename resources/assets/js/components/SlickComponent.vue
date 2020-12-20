<style>

</style>
<template>
    <article>
        <transition name="fade">
            <slick ref="slick" :options="slickOptions">
                <img src="/images/aerofotosemka_3.jpg" alt="img01"/>
                <img src="/images/kartogramma_zemlyanykh_mass_5.jpg" alt="img02"/>
                <img src="/images/kontur_kotlovana_6.jpg" alt="img03"/>
                <img src="/images/topograficheskiy_plan_13.jpg" alt="img04"/>
                <img src="/images/seti_sgushcheniya_4.jpg" alt="img05"/>
            </slick>
        </transition>
    </article>
</template>

<script>
    import Slick from 'vue-slick';
    export default {
        data: function(){
            return {
                slickOptions: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 5000,
                    dots: true,
                    infinite: true,
                    speed: 2000,
                    fade: true,
                    cssEase: 'linear'
                }
            }
        },
        components: {
            Slick
        },
        mounted() {
            this.update();
        },
        methods: {
            update: function(){
                console.log('SlickComponent mounted!');
            }
        }
    }
</script>
