/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/*window.Vue = require('vue');*/

import Vue from 'vue';
import VueRouter from 'vue-router';
import router from './router';
import Vuetify from 'vuetify';
import VueTheMask from 'vue-the-mask';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('header-component', require('./components/HeaderComponent.vue').default);

Vue.component('resister-page', require('./components/pages/UserResistPage.vue').default);

Vue.component('resister-page2', require('./components/pages/UserResistPage2.vue').default);

Vue.component('reserve-page', require('./components/ReservePage.vue').default);

Vue.component('complete-page', require('./components/CompletePage.vue').default);

Vue.component('confirmation-page', require('./components/ConfirmationPage.vue').default);

Vue.component('sample-page', require('./components/SamplePage.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 window.Vue = Vue;
 Vue.use(VueRouter);
 Vue.use(Vuetify);
 Vue.use(VueTheMask);

// const app = new Vue({
//     el: '#app',
// });


const reserve = new Vue({
    el: '#reserve',
});
const app = new Vue({
    el: '#app',
    router,
    vuetify: new Vuetify(),
});
