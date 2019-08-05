<template>
    <section class="section">
        <div class="container">
            <div class="columns is-centered">
                <div v-if="!flagRestaurantesSector" class="column is-four-fifths">
                    <div class="columns">
                        <div class="column">
                            <p class="title has-text-centered is-capitalized">{{ restaurante.nombre }}</p>
                            <div class="columns is-centered" v-if="datosSector.tipo">
                                <info-general-sector
                                    :restaurante="restaurante" 
                                    :sector="datosSector"
                                    v-on:mostrar-sector="MostrarSector"
                                >
                                </info-general-sector>
                            </div>
                            <div class="columns is-centered has-text-centered" v-if="datosSector.tipo">
                                <router-link class="" :to="{name:'sector', params:{sectorId:datosSector.id}}">Ver Sector</router-link>
                            </div>
                            <p class="has-text-centered is-size-6 has-text-grey">
                                <span class="icon"><i class="fas fa-phone"></i></span>{{ restaurante.telefono }}  
                                <a class="has-text-grey" v-bind:href="direccionMaps" target="_alt"><span class="icon"><i class="fas fa-map-marker-alt"></i></span>{{ restaurante.direccion }}</a>
                                <span class="icon"><i class="fas fa-map-marker-alt"></i></span>{{ restaurante.ciudad }}
                            </p>
                        </div>
                    </div>
                    <div class="columns is-centered">
                        <div class="column is-8">
                            <p class="title is-size-4">Platos del día</p>
                        </div>
                    </div>
                    <div class="columns is-centered">
                        <div class="column is-8">
                            <ul v-if="menu.delDia.length > 0">
                                <li v-for="platoDia in menu.delDia">
                                    <div class="columns is-vcentered">
                                        <div class="column is-9">
                                            <div><b>{{platoDia.nombre}}</b></div>
                                            <div class="is-size-7">{{platoDia.descripcion}}. <b>$ {{platoDia.precio}}</b></div>    
                                            <div class="has-text-danger is-capitalized is-italic help">Plato {{platoDia.tipo_plato}}</div>
                                            <router-link class="button is-success is-small" :to="{name:'plato-restaurante',params:{platoSeleccionado:platoDia, restaurante:restaurante}}">Ver más</router-link>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <p v-else class="has-text-centered">No existen platos del día para mostrar</p>
                        </div>
                    </div>

                    <div class="columns is-centered">
                        <div class="column is-8">
                            <p class="title is-size-4">Menu Completo</span></p>
                        </div>
                    </div>
                    <div class="columns is-centered">
                        <div class="column is-8">
                            <ul v-if="menu.carta.length > 0">
                                <li v-for="platoCarta in menu.carta">
                                    <div class="columns is-vcentered">
                                        <div class="column is-8">
                                            <div><b>{{platoCarta.nombre}}</b></div>
                                            <div class="is-size-7">{{platoCarta.descripcion}}. <b>$ {{platoCarta.precio}}</b></div>    
                                            <div class="has-text-danger is-capitalized is-italic help">Plato {{platoCarta.tipo_plato}}</div>
                                            <router-link class="button is-success is-small" :to="{name:'plato-restaurante',params:{platoSeleccionado:platoCarta, restaurante:restaurante}}">Ver más</router-link>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <p v-else class="has-text-centered">No existe una carta para mostrar</p>
                        </div>
                    </div>
                    <div class="columns is-centered">
                        <div class="column is-6 has-text-centered">
                            <a class="button is-danger" v-bind:href="direccionMaps" target="_alt">
                                <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                                <span>Como Llegar</span>
                            </a>
                        </div>
                    </div>
                    <otros-restaurantes
                        :restaurante = "restaurante"
                        :datosSector = "datosSector"
                        :otrosRestaurantesSector="otrosRestaurantesSector"
                        :flagOrigen = "'Restaurante'"
                        v-on:visitar-otro-restaurante="VisitarOtroRestaurante"   
                    >
                    </otros-restaurantes>    
                    <div class="columns is-centered has-text-centered" v-if="datosSector.tipo">
                        <router-link class="" :to="{name:'sector', params:{sectorId:datosSector.id}}">Ver Sector</router-link>
                    </div>
                </div>
                
            </div>
        </div>    
    </section>
</template>

<script>
    import axios from "axios"
    import OtrosRestaurantes from './OtrosRestaurantes.vue';
    import InfoGeneralSector from '@/js/components/inicio/Sectores/InfoGeneral.vue';
    import RestaurantesSector from '@/js/components/inicio/Sectores/MostrarSector.vue';

    export default {
        mounted() {
        },
        components: {
            otrosRestaurantes : OtrosRestaurantes,
            infoGeneralSector   : InfoGeneralSector,
            restaurantesSector  : RestaurantesSector
        },
        created(){
            this.VerMenu(),
            this.OtrosRestaurantesDelSector(),
            this.scrollToTop()
        },
        data(){
            return{
                flagRestaurantesSector:0,
                idMostrarSector:0,
                menu:{},
                otrosRestaurantesSector:{},
                datosSector:{},
                direccionMaps:'https://www.google.com.co/maps/place/'+this.restaurante.direccion+','+this.restaurante.ciudad+'?hl=es',
            }
        },
        methods:{
            scrollToTop() {
                window.scrollTo(0,0);
            },
            VerMenu(){
                axios.get('ver-menu-restaurante/'+this.restaurante.id)
                .then(response => {
                    this.menu = response.data;
                    this.datosSector = response.data.sector;
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

            VisitarOtroRestaurante(restaurante){
                this.restaurante = restaurante;
                this.VerMenu();
                this.OtrosRestaurantesDelSector();
                this.scrollToTop();
            },

            MostrarSector(id){
                this.idMostrarSector = id;
                this.flagRestaurantesSector = 1;
            }
        },
        props:{
            restaurante:{ 
                Type: Object,
                Required:true    
            }

        }
    }
</script>
