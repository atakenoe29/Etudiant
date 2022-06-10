/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

 window.Vue = require('vue');
 import Vue from 'vue'
 import VueRouter from 'vue-router';

 //Vue.component ('pagination', require('laravel-vue-pagination').default);
 /*import LaravelVuePagination from 'laravel-vue-pagination';
 export default {
    components: {
        'Pagination': LaravelVuePagination
    }
 }*/

 Vue.use(VueRouter);

 Vue.component('add-filiere', require('./components/filiere/AddComponent.vue').default);
 Vue.component('edit-filiere', require('./components/filiere/EditComponent.vue').default);
 
 Vue.component('add-etudiant', require('./components/etudiant/AddComponent.vue').default);
 Vue.component('edit-etudiant', require('./components/etudiant/EditComponent.vue').default);

 Vue.component('filtre-etudiant', require('./components/FiltreComponent.vue').default);
 
 import Home from './components/HomeComponent.vue';
 import Filiere from './components/FiliereComponent.vue';
 import Etudiant from './components/EtudiantComponent.vue';
 import Filtrer from './components/filtre/FiltrerComponent.vue';
 //Vue.component('example-component', require('./components/HomeComponent.vue').default);
 
 const routes =  [
    {
        path: '/',
        component: Home
    },

    {
        path: '/filieres',
        component: Filiere
    },

    {
        path: '/etudiants',
        component: Etudiant
    },

    {
        path: '/filtrer',
        component: Filtrer
    },
 ];
 
 const router = new VueRouter({routes});
 
 
 const app = new Vue({
     el: '#app',
 
     router: router
 }); 