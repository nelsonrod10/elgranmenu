<template>
    <div>
        <div v-if="!flagVerPlatoSeleccionado && !flagVisitarRestaurante" class="container">
            <div class="columns">
                <div class="column">
                    <p class="title has-text-centered"></p>
                    <p class="title has-text-centered is-size-5">Restaurantes que hoy ofrecen "{{ platoSeleccionado }}"</p>
                </div>
            </div>    
            <div class="columns is-centered">
                <div class="column is-four-fifths">
                    <div class="box" v-for="data in listaResultados">
                        <div class="columns is-vcentered">
                            <div class="column is-three-fifths">
                                <h1 class="title is-4 is-capitalized">{{ data.restaurante.nombre }}</h1>
                                <p class="title is-5 is-capitalized">{{ data.plato.nombre }}</p>
                                <p class="subtitle is-6">{{ data.plato.descripcion }} <span class="has-text-danger is-italic help"> ( Plato {{data.plato.tipo_plato}} ) </span></p>
                                <div><a class="has-text-dark">{{ data.restaurante.direccion }} - {{ data.restaurante.ciudad }}</a> | <a class="has-text-dark">{{ data.restaurante.telefono }} </a></div>
                                <div v-if="data.sector && data.sector.tipo">
                                    <info-general-sector
                                        :restaurante="data.restaurante" 
                                        :sector="data.sector"
                                    >
                                    </info-general-sector>
                                </div>
                            </div>
                            <div class="column">
                                <div>
                                    <span class="icon has-text-danger is-size-6">
                                        <i class="fas fa-dollar-sign"></i>
                                    </span>
                                    <span class="has-text-danger is-size-5">
                                        <b>{{ data.plato.precio }} COP</b>
                                    </span>
                                </div>

                                <!--<div>
                                    <span class="icon has-text-success  is-size-6">
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span class=" has-text-success  is-size-5">
                                        <b>4.8</b>
                                    </span>    
                                </div>-->
                            </div>            

                            <div class="column">
                                <div class="has-text-centered">
                                    <a class="button is-info" v-on:click="PlatoSeleccionado(data.restaurante, data.plato)">Ver más</a>
                                </div>
                            </div>
                        </div>    
                    </div>
                    <infinite-loading @infinite="InfiniteHandler">
                        <div slot="no-more">No hay mas resulados</div>
                        <div slot="no-results">Lo sentimos, no tenemos resultados.</div>
                    </infinite-loading>    
                </div>
            </div>
        </div>
        <ver-plato-seleccionado 
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
        </visitar-restaurante>
    </div>
</template>

<script>
    import axios from "axios";
    import PlatoSeleccionado from './PlatoSeleccionado/DetallesRestaurante.vue';
    import VisitarRestaurante from './PlatoSeleccionado/Restaurante.vue';
    import InfoGeneralSector from '@/js/components/inicio/Sectores/InfoGeneral.vue';

    export default {
        props: {
            platoSeleccionado: {
                type: String,
                required: true
            }
        },
        data(){
            return{
                page: 0,
                flagVerPlatoSeleccionado:false,
                flagVisitarRestaurante:false,
                keyVerOtroPlato:0,
                keyVerOtroRestaurante:0,
                listaResultados:[],
                detallesRestaurante:{},
                detallesPlato:{},   
                visitarRestaurante:{}    
            }
        },
        mounted(){
            
        },
        created(){
            
        },
        components: {
            verPlatoSeleccionado: PlatoSeleccionado,
            visitarRestaurante  : VisitarRestaurante,
            infoGeneralSector   : InfoGeneralSector   
        },
        methods:{

            ListaRestaurantes(){
                axios.get('restaurantes-plato-del-dia/'+this.platoSeleccionado)
                .then(response => {
                    this.listaResultados = response.data.data;
                })    
                .catch(error => {
                    console.log(error)
                })
                
            },

            InfiniteHandler($state) {
                this.page += 1;
                axios.get('restaurantes-plato-del-dia/'+this.platoSeleccionado, {
                  params: {
                    page: this.page,
                  },
                }).then(response => {
                    if (response.data.data.length) {
                        this.listaResultados=this.listaResultados.concat(response.data.data);
                        $state.loaded();
                    } else {
                        $state.complete();
                    }
                })    
                .catch(error => {
                    console.log(error)
                })
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
        },
    }
</script>
