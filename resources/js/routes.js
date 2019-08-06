import Vue from 'vue'
import VueRouter from 'vue-router'
import CrearRestaurante from '@/js/components/restaurantes/CrearRestaurante.vue'
import BarraBusqueda from '@/js/components/inicio/BarraBusqueda.vue'
import BusquedaMenusPrincipal from '@/js/components/inicio/BusquedaMenusPrincipal.vue'
import BusquedaMenusSecundaria from '@/js/components/inicio/BusquedaMenusSecundaria.vue'
import MenuSeleccionado from '@/js/components/inicio/menuSeleccionado/BusquedaPorMenus.vue'
import ListadoRestaurantes from '@/js/components/inicio/ListadoRestaurantes/Show.vue'
import VerPlato from '@/js/components/inicio/PlatoSeleccionado/VerPlato.vue'
import Restaurante from '@/js/components/inicio/PlatoSeleccionado/Restaurante.vue'
import Sector from '@/js/components/inicio/Sectores/MostrarSector.vue'
import SectoresCiudad from '@/js/components/inicio/Sectores/SectoresCiudad.vue'

Vue.use(VueRouter);

const router = new VueRouter({
    //mode: 'history',
    routes: [
        {
            path:'/elgranmenu/public/administrador/gestion-restaurantes/:id',
            name:'gestion-restaurantes.show',
            component : CrearRestaurante 
        },
        {
                path:'',
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
                    path: 'listado-restaurantes',
                    name: 'listado-restaurantes',
                    props : {default:true},
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
                },
                {
                    path:'plato-restaurante',
                    name:'plato-restaurante',
                    props : {default:true},
                    components : {
                        busquedaMenus : BusquedaMenusSecundaria,
                        default       : VerPlato
                    }
                },
                {
                    path:'restaurante',
                    name:'restaurante',
                    props : {default:true},
                    components : {
                        busquedaMenus : BusquedaMenusSecundaria,
                        default       : Restaurante
                    }
                },
                {
                    path:'sector',
                    name:'sector',
                    props : {default:true},
                    components : {
                        busquedaMenus : BusquedaMenusSecundaria,
                        default       : Sector
                    }
                },
                {
                    path:'sectores-ciudad/:ciudad',
                    name:'sectores-ciudad',
                    components : {
                        busquedaMenus : BusquedaMenusSecundaria,
                        default       : SectoresCiudad
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

