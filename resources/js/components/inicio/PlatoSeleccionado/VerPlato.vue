<template>
    <div>
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-four-fifths">
                    <div class="box">
                        <div class="columns">
                            <div class="column">
                                <div class="title has-text-centered is-capitalized">
                                    {{ restaurante.nombre }}
                                    <p class="has-text-centered is-size-6 has-text-grey">
                                        <span class="icon"><i class="fas fa-phone"></i></span>{{ restaurante.telefono }}  
                                        <a class="has-text-grey" v-bind:href="direccionMaps" target="_alt"><span class="icon"><i class="fas fa-map-marker-alt"></i></span>{{ restaurante.direccion }}</a>
                                        <span class="icon"><i class="fas fa-map-marker-alt"></i></span>{{ restaurante.ciudad }}
                                    </p>
                                </div>
                                <div class="has-text-centered" v-if="datosSector.tipo">
                                    <info-general-sector
                                        :restaurante="restaurante" 
                                        :sector="datosSector"
                                        v-on:mostrar-sector="MostrarSector"
                                    >
                                    </info-general-sector>
                                    <router-link class="is-size-6" :to="{name:'sector', params:{sectorId:datosSector.id}}">Más lugares en este sector</router-link>
                                </div>
                                
                                
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
                                <p class="title has-text-centered is-size-5  has-text-grey-dark">
                                    <span class="icon is-small">
                                        <i class="fas fa-utensils"></i>
                                    </span>
                                    Platos del día en <span class="is-capitalized">{{ restaurante.nombre }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="columns is-centered">
                            <div class="column is-6">
                                <ul v-if="otrosPlatosDia.length > 0">
                                    <li v-for="otroPlato in otrosPlatosDia">
                                        <div class="columns is-vcentered">
                                            <div class="column is-8">
                                                <div>{{otroPlato.nombre}}</div>
                                                <div class="is-size-7">{{otroPlato.descripcion}}</div>    
                                            </div>
                                            <div class="column">
                                                <a class="button is-success is-small" v-on:click="VerOtroPlato(otroPlato,restaurante)">Ver más</a>
                                            </div>    
                                        </div>
                                    </li>
                                </ul>
                                <p v-else class="has-text-centered">No existen más platos del día para mostrar</p>
                            </div>
                        </div>
                        <div class="columns is-centered is-mobile">
                            <div class="column has-text-right">
                                <a class="button is-danger" v-bind:href="direccionMaps" target="_alt">
                                    <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                                    <span>Como Llegar</span>
                                </a>
                            </div>
                            <div class="column has-text-left">
                                <router-link class="button is-link" :to="{name:'restaurante',params:{restaurante:restaurante}}">
                                    <span class="icon"><i class="fas fa-list"></i></span>
                                    <span>Menu Completo</span>
                                </router-link>
                            </div>
                        </div>
                    </div> 
                </div>    
            </div>
            <div class="columns is-centered">
                <div class="column is-four-fifths">
                    <div class="box">
                        <otros-restaurantes
                            :restaurante = "restaurante"
                            :datosSector = "datosSector"
                            :otrosRestaurantesSector="otrosRestaurantesSector"
                            :flagOrigen = "'VerPlato'"
                        >
                        </otros-restaurantes>    
                        <div class="columns is-centered has-text-centered" v-if="datosSector.tipo">
                            <router-link class="is-size-6" :to="{name:'sector', params:{sectorId:datosSector.id}}">Más lugares en este sector</router-link>
                        </div>
                    </div>
                </div>    
            </div>
            
        </div>    
    </div>
</template>

<script>
    import axios from "axios"
    import OtrosRestaurantes from './OtrosRestaurantes.vue';
    import InfoGeneralSector from '@/js/components/inicio/Sectores/InfoGeneral.vue';
    //import RestaurantesSector from '@/js/components/inicio/Sectores/MostrarSector.vue';

    export default {
        mounted() {
        },
        components: {
            otrosRestaurantes   : OtrosRestaurantes,
            infoGeneralSector   : InfoGeneralSector,
            //restaurantesSector  : RestaurantesSector  
        },
        created(){
            this.OtrosPlatosDelDia(),
            this.OtrosRestaurantesDelSector(),
            this.scrollToTop()
        },
        data(){
            return{
                flagRestaurantesSector:0,
                idMostrarSector:0,
                otrosPlatosDia:{},
                otrosRestaurantesSector:{},
                datosSector:{},
                direccionMaps:'https://www.google.com.co/maps/place/'+this.restaurante.direccion+','+this.restaurante.ciudad+'?hl=es'
            }
        },
        methods:{
            scrollToTop() {
                window.scrollTo(0,0);
            },

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
            },
            
            /*VisitarOtroRestaurante(restaurante){
                this.$emit('visitar-restaurante',restaurante);
            },*/
            

            MostrarSector(id){
                this.idMostrarSector = id;
                this.flagRestaurantesSector = 1;
            },
            
            VerOtroPlato(platoSeleccionado, restaurante){
                alert("hola");
                this.platoSeleccionado = platoSeleccionado;
                this.restaurante = restaurante;
                this.OtrosPlatosDelDia(),
                this.OtrosRestaurantesDelSector(),
                this.scrollToTop()
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
