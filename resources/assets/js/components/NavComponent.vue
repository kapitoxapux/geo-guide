<style>

</style>
<template>
    <header class="header container-fluid d-flex justify-content-between p-0">
        <a class="logo" href="/">
            <img src="/images/logo.png" alt="Logo">
        </a>
        <div class="page">
            <ul class="d-flex">
                <li class="flex-item">
                    <router-link to="/" class="d-flex align-items-center justify-content-center">Главная</router-link>
                </li>
                <li class="flex-item">
                    <router-link to="/geodesy" class="d-flex align-items-center justify-content-center">Геодезия</router-link>
                </li>
                <li class="flex-item">
                    <router-link to="/geology" class="d-flex align-items-center justify-content-center">Геология</router-link>
                </li>
                <li class="flex-item">
                    <router-link to="/hydraulics" class="d-flex align-items-center justify-content-center">Гидравлика</router-link>
                </li>
                <li class="flex-item">
                    <router-link to="/basket" class="d-flex align-items-center justify-content-center">Купить</router-link>
                </li>
            </ul>
        </div>
    </header>
</template>

<script>
    export default {
        mounted() {
            this.update();
        },
        methods: {
            update: function(){
                console.log('NavComponent mounted!');
            }
        }
    }
</script>
