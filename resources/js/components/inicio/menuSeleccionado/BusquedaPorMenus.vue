<template>
    <div>
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-title is-size-4  has-text-centered is-capitalized">
                    Menus {{ tipoMenu }}.
                </div>
            </div>
            <div class="columns is-centered">
                <div class="column is-9">
                    <listado-menu
                        :tipoMenu = "tipoMenu"
                        :key="keyActualizar"
                    />
                </div>
            </div>
        </div>    
        <!--<ver-plato
            v-if="flagPlatoSeleccionado"
            :platoSeleccionado = "dataPlato"
            :restaurante = "dataRestaurante"
            v-on:ver-otro-plato="VerPlato"
            v-on:visitar-restaurante="VisitarRestaurante"
            :key="keyVerOtroPlato"
        >
        </ver-plato>
        <visitar-restaurante 
            v-if="flagVisitarRestaurante" 
            v-on:ver-otro-plato="VerPlato"
            :restaurante="visitarRestaurante"
            v-on:visitar-restaurante="VisitarRestaurante"
            :key="keyVerOtroRestaurante"
        > 
        </visitar-restaurante>-->
    </div>
</template>

<script>
    import axios from "axios"
    import ListadoMenu from '@/js/components/inicio/menuSeleccionado/Listado.vue';
    //import PlatoSeleccionado from '@/js/components/inicio/PlatoSeleccionado/DetallesRestaurante.vue';
    //import VisitarRestaurante from '@/js/components/inicio/PlatoSeleccionado/Restaurante.vue';
    
    export default {
        mounted() {
        },
        props:{
            
        },
        watch: {
            '$route' (to, from) {
              this.TipoMenu();
              
            }
        },
        components: {
            listadoMenu        : ListadoMenu, 
            //verPlato           : PlatoSeleccionado,
            //visitarRestaurante : VisitarRestaurante,
        },
        created(){
            this.TipoMenu()
        },
        data(){
            return{
                page: 0,
                tipoMenu:'',
                keyActualizar:0,
                listado:[],
                flagPlatoSeleccionado:false,
                flagVisitarRestaurante:false,
                
                keyVerOtroPlato:0,
                keyVerOtroRestaurante:0,
                dataPlato:{},
                dataRestaurante:{}    
            }
        },
        methods:{
            TipoMenu(){
                this.tipoMenu = this.$route.params.tipoMenu;
                this.keyActualizar +=1;    
            },

            /*VerPlato(restaurante,plato){
                this.keyVerOtroPlato += 1;
                this.flagPlatoSeleccionado = true;
                this.flagVisitarRestaurante = false;
                this.dataRestaurante = restaurante;
                this.dataPlato = plato;
            },
            
            VisitarRestaurante(restaurante){
                this.keyVerOtroRestaurante += 1;
                this.flagPlatoSeleccionado = false;
                this.flagVisitarRestaurante = true;
                this.visitarRestaurante = restaurante;
            }*/
        }
    }
</script>
