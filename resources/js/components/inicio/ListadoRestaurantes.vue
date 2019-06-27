<template>
    <div>
        <section v-if="!flagVerPlatoSeleccionado" class="section">
            <div class="container">
                <div class="columns">
                    <div class="column">
                        <p class="title has-text-centered"></p>
                        <p class="title has-text-centered">Restaurantes que hoy ofrecen "{{ platoSeleccionado }}"</p>
                    </div>
                </div>    
                <div class="columns is-centered">
                    <div class="column is-four-fifths">
                        <div class="box" v-for="data in listaResultados">
                            <div class="columns is-vcentered">
                                <div class="column is-three-fifths">
                                    <h1 class="title is-4">{{ data.restaurante.nombre }}</h1>
                                    <p class="title is-5">{{ data.plato.nombre }}</p>
                                    <p class="subtitle is-6">{{ data.plato.descripcion }}</p>
                                    <div><a>{{ data.restaurante.direccion }} - {{ data.restaurante.ciudad }}</a> | <a>{{ data.restaurante.telefono }} </a></div>
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
                    </div>
                </div>
            </div>
        </section>
        <ver-plato-seleccionado 
            v-else-if="flagVerPlatoSeleccionado" 
            :restaurante="detallesRestaurante" 
            :platoSeleccionado="detallesPlato">
        </ver-plato-seleccionado>
    </div>
</template>

<script>
    import axios from "axios"
    import PlatoSeleccionado from './PlatoSeleccionado/DetallesRestaurante.vue'

    export default {
        props: {
            platoSeleccionado: {
                type: String,
                required: true
            }
        },
        data(){
            return{
                flagVerPlatoSeleccionado:false,
                listaResultados:{},
                detallesRestaurante:{},
                detallesPlato:{}
            }
        },
        mounted(){
            
        },
        created(){
            this.ListaRestaurantes();
        },
        components: {
            verPlatoSeleccionado: PlatoSeleccionado,
        },
        methods:{
            ListaRestaurantes(){
                
                axios.get('restaurantes-plato-del-dia/'+this.platoSeleccionado)
                .then(response => {
                    this.listaResultados = response.data;
                })    
                .catch(error => {
                    console.log(error)
                })
                
            },

            PlatoSeleccionado(restaurante,plato){
                this.flagVerPlatoSeleccionado = true,
                this.detallesRestaurante = restaurante,
                this.detallesPlato = plato
            }
        },
    }
</script>
