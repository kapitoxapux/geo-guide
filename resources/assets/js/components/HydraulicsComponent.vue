<style>

</style>
<template>
    <div>
        <nav-component></nav-component>
    </div>
</template>

<script>
    import Nav from "./NavComponent";

    export default {
        data: function(){
            return {
                //'message_type': 'Фильм'
            }
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
                console.log('HydraulicsComponent mounted!');
            }
        }
    }
</script>