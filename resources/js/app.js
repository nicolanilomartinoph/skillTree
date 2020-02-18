/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('programmer', require('./components/Programmer.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import store from './store.js';
import programmer from './components/Programmer/Programmer.vue';
import vueRouter from 'vue-router'
import test from './testRoute.vue'

Vue.use(vueRouter);

const router = new vueRouter({
    routes: [
        { path: '/', component: programmer }
        , { path: '/test', component: test }
    ],
    mode: 'history'
})

const app = new Vue({
    el: '#appVue',
    store,
    router,
    data: {
        test: "TEST"
    },
    template: `
    <div class="row">
        <router-link to="/" >TEST 1</router-link>
        <router-link to="/test" >TEST 2</router-link>
    </div2>
    <router-view></router-view>
    `
});





