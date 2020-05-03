<style>

</style>
<template>
    <div class="fade">
        Купить
    </div>
</template>

<script>
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
        mounted() {
            this.update();
        },
        methods: {
            update: function(){
                console.log('BasketComponent mounted!');
            }
        }
    }
</script>