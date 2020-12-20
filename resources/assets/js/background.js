require('./bootstrap');

import BackgroundComponent from './components/BackgroundComponent.vue';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

new Vue({
    components: {
        'background-component': BackgroundComponent
    },
    router
}).$mount('#particleground');
