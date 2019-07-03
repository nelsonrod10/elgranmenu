<template>
    <section class="section">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-four-fifths box notification">
                    <div class="columns">
                        <div class="column">
                            <p class="title has-text-centered is-capitalized">{{ restaurante.nombre }}</p>
                            <p class="has-text-centered is-size-6 has-text-grey">
                                <span class="icon"><i class="fas fa-phone"></i></span>{{ restaurante.telefono }}  
                                <a v-bind:href="direccionMaps" target="_alt"><span class="icon"><i class="fas fa-map-marker-alt"></i></span>{{ restaurante.direccion }}</a>
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
                            <ul>
                                <li v-for="platoDia in menu.delDia">
                                    <div class="columns is-vcentered">
                                        <div class="column is-8">
                                            <div><b>{{platoDia.nombre}}</b></div>
                                            <div class="is-size-7">{{platoDia.descripcion}}. <b>$ {{platoDia.precio}}</b></div>    
                                            <div class="has-text-danger is-capitalized is-italic help">Plato {{platoDia.tipo_plato}}</div>
                                        </div>
                                        <div class="column">
                                            <a class="button is-success is-small" v-on:click="$emit('ver-otro-plato',restaurante,platoDia)">Ver más</a>
                                        </div>    
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="columns is-centered">
                        <div class="column is-8">
                            <p class="title is-size-4">Menu Completo</span></p>
                        </div>
                    </div>
                    <div class="columns is-centered">
                        <div class="column is-8">
                            <ul>
                                <li v-for="platoCarta in menu.carta">
                                    <div class="columns is-vcentered">
                                        <div class="column is-8">
                                            <div><b>{{platoCarta.nombre}}</b></div>
                                            <div class="is-size-7">{{platoCarta.descripcion}}. <b>$ {{platoCarta.precio}}</b></div>    
                                            <div class="has-text-danger is-capitalized is-italic help">Plato {{platoCarta.tipo_plato}}</div>
                                        </div>
                                        <div class="column">
                                            <a class="button is-success is-small" v-on:click="$emit('ver-otro-plato',restaurante,platoCarta)">Ver más</a>
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
            this.VerMenu()
        },
        data(){
            return{
                menu:{},
                direccionMaps:'https://www.google.com.co/maps/place/'+this.restaurante.direccion+','+this.restaurante.ciudad+'?hl=es',
            }
        },
        methods:{
            VerMenu(){
                axios.get('ver-menu-restaurante/'+this.restaurante.id)
                .then(response => {
                    this.menu = response.data;
                })    
                .catch(error => {
                    console.log(error)
                })
            },
        },
        props:{
            restaurante:{ 
                Type: Object,
                Required:true    
            }

        }
    }
</script>
