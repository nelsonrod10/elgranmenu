import Vue from 'vue'
import VueRouter from 'vue-router'
import CrearRestaurante from '@/js/components/restaurantes/CrearRestaurante.vue'

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path:'/elgranmenu/public/administrador/gestion-restaurantes/:id',
            name:'gestion-restaurantes.show',
            component : CrearRestaurante 
        },
        {
            path:'/ver-sectores/',
            name:'ver-sectores'
        }
    ]
});

export default router

