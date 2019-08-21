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
//Vue.component('buscar-platos-del-dia', require('./components/inicio/BuscarPlatoDelDia.vue').default);
//Vue.component('listado-restaurantes', require('./components/inicio/ListadoRestaurantes.vue').default);
Vue.component('platos-menu', require('./components/restaurantes/PlatosMenu.vue').default);
Vue.component('eliminar-plato', require('./components/restaurantes/EliminarPlato.vue').default);
Vue.component('editar-plato', require('./components/restaurantes/EditarPlato.vue').default);
Vue.component('crear-restaurante', require('./components/restaurantes/CrearRestaurante.vue').default);
Vue.component('editar-restaurante', require('./components/restaurantes/EditarRestaurante.vue').default);
Vue.component('sectores', require('./components/SuperAdmin/Sectores/Index.vue').default);
Vue.component('inscritos', require('./components/SuperAdmin/Inscritos/Index.vue').default);

/*Vue.component('buscar-platos-del-dia', require('./components/inicio_prueba/BuscarPlatoDelDia.vue').default);*/

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router: Routes,
    datePicker: DatePicker
});
