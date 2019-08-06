<template>
    <div class="container">
        <section class="section">
            <router-view></router-view>
            <br/>
            <router-view  name="busquedaMenus"></router-view>
            <!--<router-view  name="resultadoBusqueda"></router-view>-->
            <!--<busqueda-por-menu 
                v-if="flagBusquedaPorMenu"
                :tipoMenu="tipoBusquedaPorMenu"
                :key="keyBuscarPorMenus"
            >
            </busqueda-por-menu>-->
        </section>
    </div>

</template>

<script>
    import axios from "axios";
    //import BarraBusqueda from './BarraBusqueda.vue';
    //import ListadoRestaurantes from './ListadoRestaurantes.vue';
    //import BusquedaPorMenu from './menuSeleccionado/BusquedaPorMenus.vue';

    export default {
        mounted() {
            console.log('Component mounted.')
        },
        components: {
            //barraBusqueda : BarraBusqueda,
            //listadoRestaurantes :   ListadoRestaurantes,
            //busquedaPorMenu     :   BusquedaPorMenu,          
        },
        created(){
        },
        data(){
            return{
                keyActivarView:0,
                btnBuscar:false,
                //flagPlatoSeleccionado : false,
                //flagBusquedaPorMenu   : false,
                tipoBusquedaPorMenu   : '',
                keyBuscarPorMenus     : 0, 
                nombresPlatosCarta    : [],
                nombresPlatosDia      : [],
                buscarPlato           : '',
            }
        },
        methods:{
            
            BuscarPorMenu(tipoMenu){
                this.ResetearFlags();
                this.keyBuscarPorMenus += 1;
                this.flagBusquedaPorMenu = true;
                this.tipoBusquedaPorMenu = tipoMenu;
            },    
            
            ResetearFlags(){
                this.flagPlatoSeleccionado = false;
                this.flagBusquedaPorMenu = false;
                return;
            }
        },
        
    }
</script>
