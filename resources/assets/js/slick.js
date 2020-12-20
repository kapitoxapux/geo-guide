//require('./bootstrap');

import Vue from 'vue';
import SlickComponent from './components/SlickComponent.vue';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

new Vue({
    el: ".slider-3",
    components: {
        'slick-component': SlickComponent
    }
});
