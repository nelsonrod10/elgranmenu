import Vue from 'vue'
import VueRouter from 'vue-router'
import CrearRestaurante from '@/js/components/restaurantes/CrearRestaurante.vue'
import BarraBusqueda from '@/js/components/inicio_prueba/BarraBusqueda.vue'
import BusquedaMenusPrincipal from '@/js/components/inicio_prueba/BusquedaMenusPrincipal.vue'
import BusquedaMenusSecundaria from '@/js/components/inicio_prueba/BusquedaMenusSecundaria.vue'
import MenuSeleccionado from '@/js/components/inicio_prueba/menuSeleccionado/BusquedaPorMenus.vue'
import ListadoRestaurantes from '@/js/components/inicio_prueba/ListadoRestaurantes/Show.vue'

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
            path:'/elgranmenu/public/',
            components : {
                default : BarraBusqueda
            },
            children:[
                {
                    path : '',
                    components : {
                        busquedaMenus : BusquedaMenusPrincipal
                    }
                },
                {
                    path: 'listado-restaurantes/:platoBuscado',
                    name: 'listado-restaurantes',
                    components : {
                        busquedaMenus : BusquedaMenusSecundaria,
                        default       : ListadoRestaurantes
                    }
                },
                {
                    path: 'menu/:tipoMenu',
                    name: 'menu',
                    props : true,
                    components : {
                        busquedaMenus : BusquedaMenusSecundaria,
                        default       : MenuSeleccionado
                    }
                }
            ]
                
        }
        /*{
            path:'/elgranmenu/public/',
            components : {
                default         : BarraBusqueda
               // busquedaMenus   : BusquedaMenusPrincipal    
            },
            children:[
                {
                    path: '/listado-restaurantes',
                    components : {
                        default         : ListadoRestaurantes
                       // busquedaMenus   : BusquedaMenusPrincipal    
                    }   
                }
            ]
                
        },
        {
            path:'/listado-restaurantes',
            name:'listado-restaurantes',
            components :  {
                default           : BarraBusqueda,      
                
                resultadoBusqueda : ListadoRestaurantes
            }
        }*/
        
    ]
});

export default router

