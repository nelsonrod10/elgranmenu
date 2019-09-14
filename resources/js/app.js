
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import Routes from '@/js/routes.js'
import DatePicker from '@/js/datePicker.js'

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
Vue.component('InfiniteLoading', require('vue-infinite-loading').default);
Vue.component('platos-menu', require('./components/restaurantes/PlatosMenu.vue').default);
Vue.component('eliminar-plato', require('./components/restaurantes/EliminarPlato.vue').default);
Vue.component('editar-plato', require('./components/restaurantes/EditarPlato.vue').default);
Vue.component('crear-restaurante', require('./components/restaurantes/CrearRestaurante.vue').default);
Vue.component('editar-restaurante', require('./components/restaurantes/EditarRestaurante.vue').default);
Vue.component('sectores', require('./components/SuperAdmin/Sectores/Index.vue').default);
Vue.component('inscritos', require('./components/SuperAdmin/Inscritos/Index.vue').default);


const app = new Vue({
    el: '#app',
    router: Routes,
    datePicker: DatePicker
});

// Bulma NavBar Burger Script
document.addEventListener('DOMContentLoaded', function () {
    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
    
    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {
        
        // Add a click event on each of them
        $navbarBurgers.forEach(function ($el) {
            $el.addEventListener('click', function () {
                
                // Get the target from the "data-target" attribute
                let target = $el.dataset.target;
                let $target = document.getElementById(target);
                
                // Toggle the class on both the "navbar-burger" and the "navbar-menu"
                $el.classList.toggle('is-active');
                $target.classList.toggle('is-active');
                
            });
        });
    }
});

require('./bulma-extensions');
