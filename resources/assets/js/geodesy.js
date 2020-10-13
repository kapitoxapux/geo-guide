
import Vue from 'vue';
import GeodesyComponent from './components/GeodesyComponent.vue';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

new Vue({
    el: ".wrapper",
    components: {
        'geodesy-component': GeodesyComponent
    }
});
