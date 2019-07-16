<template>
    <section class="section">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-four-fifths">
                    <div class="columns">
                        <div class="column">
                            <p class="title has-text-centered is-capitalized has-text-link">{{ restaurante.nombre }}</p>
                            <p class="title has-text-centered is-capitalized is-size-5 has-text-link">
                                <span v-if="datosSector.tipo !== 'Zona o Sector'">
                                    {{datosSector.tipo}}
                                </span> 
                                    {{datosSector.nombre}}
                            </p>
                            <p class="has-text-centered is-size-6 has-text-grey">
                                <span class="icon"><i class="fas fa-phone"></i></span>{{ restaurante.telefono }}  
                                <a v-bind:href="direccionMaps" target="_alt"><span class="icon"><i class="fas fa-map-marker-alt"></i></span>{{ restaurante.direccion }}</a>
                                <span class="icon"><i class="fas fa-map-marker-alt"></i></span>{{ restaurante.ciudad }}</p>
                        </div>
                    </div>
                    <div class="columns is-centered">
                        <div class="column is-6">
                            <article class="message is-info">
                                <div class="message-header">
                                  <p class="is-size-5">{{ platoSeleccionado.nombre }}</p>
                                </div>
                                <div class="message-body">
                                    <p class="is-capitalized"><b>Tipo: </b>{{ platoSeleccionado.tipo_plato }}</p>
                                    <p><b>Descripción: </b>{{ platoSeleccionado.descripcion }}</p>
                                    <p><b>Precio: </b>$ {{ platoSeleccionado.precio }}</p>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="columns is-centered">
                        <div class="column">
                            <p class="title has-text-centered is-size-4 has-text-info">
                                <span class="icon is-small">
                                    <i class="fas fa-utensils"></i>
                                </span>
                                Platos del día en <span class="is-capitalized">{{ restaurante.nombre }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="columns is-centered">
                        <div class="column is-6">
                            <ul>
                                <li v-for="otroPlato in otrosPlatosDia">
                                    <div class="columns is-vcentered">
                                        <div class="column is-8">
                                            <div><b>{{otroPlato.nombre}}</b></div>
                                            <div class="is-size-7">{{otroPlato.descripcion}}</div>    
                                        </div>
                                        <div class="column">
                                            <a class="button is-success is-small" v-on:click="$emit('ver-otro-plato',restaurante,otroPlato)">Ver más</a>
                                        </div>    
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="columns is-centered">
                        <div class="column is-6 has-text-centered">
                            <a class="button is-danger" v-bind:href="direccionMaps" target="_alt">
                                <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                                <span>Como Llegar</span>
                            </a>
                            <a class="button is-link" v-on:click="$emit('visitar-restaurante',restaurante)">
                                <span class="icon"><i class="fas fa-list"></i></span>
                                <span>Menu Completo</span>
                            </a>
                        </div>
                    </div>

                    <div class="columns is-centered" v-if="datosSector.tipo">
                        <div class="column">
                            <p class="title has-text-centered is-size-5 has-text-success">
                                <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                                Lugares que te pueden interesar en <span v-if="datosSector.tipo !== 'Zona o Sector'">{{datosSector.tipo}}</span> {{datosSector.nombre}}
                            </p>
                        </div>
                    </div>
                    <div class="columns is-centered">
                        <div class="column is-6">
                            <ul>
                                <li v-for="otroRestaurante in otrosRestaurantesSector">
                                    <div v-if="otroRestaurante.id !== restaurante.id" class="columns is-vcentered" >
                                        <div class="column is-8">
                                            <div><b>{{otroRestaurante.nombre}}</b></div>
                                            <div class="is-size-7">
                                                <span class="icon"><i class="fas fa-phone"></i></span>{{ otroRestaurante.telefono }}  
                                                <span class="icon"><i class="fas fa-map-marker-alt"></i></span>{{ otroRestaurante.direccion }}
                                                <span class="icon"><i class="fas fa-map-marker-alt"></i></span>{{ otroRestaurante.ciudad }}
                                            </div>    
                                        </div>
                                        <div class="column">
                                            <a class="button is-info is-small" v-on:click="$emit('visitar-restaurante',otroRestaurante)">Visitar</a>
                                        </div>    
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>    
    </section>
</template>

<script>
    import axios from "axios"

    export default {
        mounted() {
        },
        components: {
        },
        created(){
            this.OtrosPlatosDelDia(),
            this.OtrosRestaurantesDelSector()
        },
        data(){
            return{
                otrosPlatosDia:{},
                otrosRestaurantesSector:{},
                datosSector:{},
                direccionMaps:'https://www.google.com.co/maps/place/'+this.restaurante.direccion+','+this.restaurante.ciudad+'?hl=es'
            }
        },
        methods:{
            OtrosPlatosDelDia(){
                axios.get('otros-platos-del-dia/'+this.restaurante.id+'/'+this.platoSeleccionado.id)
                .then(response => {
                    this.otrosPlatosDia = response.data;
                })    
                .catch(error => {
                    console.log(error)
                })
            },

            OtrosRestaurantesDelSector(){
                axios.get('otros-restaurantes-del-sector/'+this.restaurante.sector_id)
                .then(response => {
                    this.otrosRestaurantesSector = response.data.restaurantes;
                    this.datosSector = response.data.sector;
                })    
                .catch(error => {
                    console.log(error)
                })
            }

        },
        props:{
            platoSeleccionado:{ 
                Type: Object,
                Required:true    
            },
            restaurante:{ 
                Type: Object,
                Required:true    
            }

        }
    }
</script>
