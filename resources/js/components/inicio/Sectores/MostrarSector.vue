<template>
    <div class="columns is-centered">
        <div class="column is-four-fifths">
            <div class="columns is-centered has-text-centered is-title is-size-3">
                <div class="column">
                    <span>Restaurantes  </span>
                    <span v-if="listado.sector.tipo !== 'Zona o Sector'">{{listado.sector.tipo}}</span> {{listado.sector.nombre}}
                </div>
            </div>
            <div class="columns is-centered has-text-centered title is-size-5">
                <div class="column">
                    {{listado.sector.direccion}} | {{listado.sector.ciudad}}
                </div>
            </div>
            <div v-for="item in listado.restaurantes" class="columns is-centered">
                <div class="column">
                    <div class="box">
                        <div class="columns is-vcentered">
                            <div class="column is-7">
                                <p class="is-capitalized is-size-4">{{ item.nombre }}</p>
                                <p class="is-size-6 has-text-grey">
                                    <span class="icon"><i class="fas fa-phone"></i></span>{{ item.telefono }}  
                                    <a class="has-text-grey" v-bind:href="direccionMaps" target="_alt"><span class="icon"><i class="fas fa-map-marker-alt"></i></span>{{ item.direccion }}</a>
                                    |  {{ item.ciudad }}
                                </p>
                            </div>
                            <div class="column has-text-centered">
                                <router-link class="button is-link is-small" :to="{name:'restaurante',params:{restaurante:item}}">
                                    <span class="icon"><i class="fas fa-list"></i></span>
                                    <span>Menu Completo</span>
                                </router-link>
                            </div>    
                            <div class="column has-text-centered">
                                <a class="button is-danger is-small" v-on:click="ComoLlegar(item)" v-bind:href="direccionMaps" target="_alt">
                                    <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                                    <span>Como Llegar</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>    
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        mounted() {
        },
        components: {
        },
        created(){
            this.GetListado()
        },  
        data(){
            return{
                listado:{},
                direccionMaps:'',
                visitarRestaurante:{},
            }
        },
        methods:{
            GetListado(){
                axios.get('ver-sectores/'+this.sectorId)
                .then(response => {
                    this.listado = response.data;
                })    
                .catch(error => {
                    console.log(error)
                })
            },
            
            ComoLlegar(restaurante){
                this.direccionMaps = 'https://www.google.com.co/maps/place/'+restaurante.direccion+','+restaurante.ciudad+'?hl=es';
            },
            
            VisitarRestaurante(restaurante){
            }
        },
        props:{
            sectorId:{
                required:true,
            },
        }
    }
</script>
