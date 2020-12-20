<style>

</style>
<template>
    <div>
        <main>
            <!-- <div class="main" v-if="zadachas"> -->
                <article :for="(zadacha,i) in collection" :key='i' :id="zadacha.id" @click="routeZadacha">
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
            <!-- </div>
            <div class="main" v-else>
                <loading :active.sync="isLoading" :is-full-page="fullPage"></loading>
            </div> -->
        </main>
    </div>
</template>

<script>
    import Loading from 'vue-loading-overlay';
    import 'vue-loading-overlay/dist/vue-loading.css';

    export default {
        data: function(){
            return {
                //collection: null,
                isLoading: false,
                fullPage: true
            }
        },
        /* computed: {
            zadachas: this.collection
        }, */
        props: {
            collection: String
        },
        components: {
            Loading
        },
        mounted() {
            this.update();
        },
        methods: {
            update: function(){
                console.log('GeodesyComponent mounted!');
                //this.isLoading = true;

                /* this.postRequest(
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
                            //console.dir(this.collection);
                            if(myJson.exception==='ErrorException') console.dir(myJson);
                            else this.collection=myJson;
                            this.isLoading = false;
                        }
                    ); */
            },
            postRequest: function(link,data){
                const myHeaders=new Headers(
                    {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector("meta[name='csrf-token']").getAttribute("content")
                    }
                );

                let myInit={
                    method: 'POST',
                    headers: myHeaders,
                    body: JSON.stringify(data),
                    credentials: 'same-origin',
                    mode: 'cors',
                    cache: 'no-cache'
                };
                return new Promise(
                    (resolve,reject)=>{
                        fetch(link,myInit)
                            .then(
                                function(response)
                                {
                                    if(response.ok)
                                    {
                                        resolve({
                                                status: 'OK',
                                                body: response.json()
                                            }
                                        )
                                    } else {
                                        reject({
                                                status: 'Failed',
                                                message: 'Data Error!'
                                            }
                                        )
                                    }
                                }
                            );
                    }
                );
            },
            routeZadacha: function(){
                console.dir();
            }
        }
    }
</script>
