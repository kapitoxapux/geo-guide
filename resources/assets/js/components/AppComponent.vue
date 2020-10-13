<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0;
    }
    .pg-canvas {
        position: absolute;
        background-color: paleturquoise;
    }
</style>
<template>
    <!-- <transition name="fade">
        <router-view></router-view>
    </transition> -->
    <div>
        <main-component></main-component>
    </div>
</template>
<script>
    import Particle from "particleground-light";
    //import MainComponent from './MainComponent.vue';
    import 'bootstrap/dist/css/bootstrap.css';
    import 'bootstrap-vue/dist/bootstrap-vue.css';

    export default {
        name: 'App',
        mounted() {
            this.update();
        },
        components: {
            Particle
            //'main-component': MainComponent
        },
        methods: {
            update: function(){
                console.log('App mounted!');
                new Particle(document.getElementById('particleground'), {
                    dotColor: '#5cbdaa',
                    lineColor: '#A261CD'
                });
            },
        }
    }
</script>
