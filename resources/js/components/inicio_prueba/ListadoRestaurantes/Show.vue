<template>
    <div>
        <div class="container">
            <div class="columns">
                <div class="column">
                    <p class="title has-text-centered"></p>
                    <p class="title has-text-centered is-size-5">Restaurantes que hoy ofrecen "{{ platoSeleccionado }}"</p>
                </div>
            </div>    
            <div class="columns is-centered">
                <listado-restaurantes
                    :platoSeleccionado = "platoSeleccionado"
                    :key="keyActualizar"
                />
            </div>
        </div>
        <!--<ver-plato-seleccionado 
            v-else-if="flagVerPlatoSeleccionado" 
            :restaurante="detallesRestaurante" 
            :platoSeleccionado="detallesPlato"
            v-on:ver-otro-plato="PlatoSeleccionado"
            v-on:visitar-restaurante="VisitarRestaurante"
            :key="keyVerOtroPlato">
        </ver-plato-seleccionado>
        
        <visitar-restaurante 
            v-if="flagVisitarRestaurante" 
            v-on:ver-otro-plato="PlatoSeleccionado"
            v-on:visitar-restaurante="VisitarRestaurante"
            :restaurante="visitarRestaurante"
            :key="keyVerOtroRestaurante"> 
        </visitar-restaurante>-->
    </div>
</template>

<script>
    import axios from "axios";
    //import PlatoSeleccionado from './PlatoSeleccionado/DetallesRestaurante.vue';
    //import VisitarRestaurante from './PlatoSeleccionado/Restaurante.vue';
    import ListadoRestaurantes from '@/js/components/inicio_prueba/ListadoRestaurantes/Listado.vue';

    export default {
        props: {
            
        },
        watch: {
            '$route' (to, from) {
              this.GetPlatoSeleccionado();
            }
        },
        data(){
            return{
                keyActualizar:0,
                platoSeleccionado:'',
                detallesRestaurante:{},
                detallesPlato:{},   
                visitarRestaurante:{}    
            }
        },
        mounted(){
            
        },
        created(){
            this.GetPlatoSeleccionado();
        },
        components: {
            //verPlatoSeleccionado: PlatoSeleccionado,
            //visitarRestaurante  : VisitarRestaurante,
            listadoRestaurantes   : ListadoRestaurantes
        },
        
        methods:{
            GetPlatoSeleccionado(){
                this.platoSeleccionado = this.$route.params.platoBuscado;
                this.keyActualizar +=1;
            },

            

            PlatoSeleccionado(restaurante,plato){
                this.keyVerOtroPlato += 1;
                this.flagVerPlatoSeleccionado = true;
                this.flagVisitarRestaurante = false;
                this.detallesRestaurante = restaurante;
                this.detallesPlato = plato;
            },

            VisitarRestaurante(restaurante){
                this.keyVerOtroRestaurante +=1;
                this.flagVerPlatoSeleccionado = false;
                this.flagVisitarRestaurante = true;
                this.visitarRestaurante = restaurante;
            }
        }
        
    }
</script>
