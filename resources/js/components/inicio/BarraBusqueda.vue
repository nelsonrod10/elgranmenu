<template>
    <div class="container">
        <section class="section">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column has-text-centered">
                        <a :href="routehome" class="is-size-1 is-size-3-mobile has-text-dark">
                            ¿Qué almorzamos hoy?
                            <!--<img :src="imglovecorrientazo"/>-->
                        </a>
                    </div>
                </div>   
                <div class="columns is-centered">
                    <div class="column is-three-fifths">
                        <div class="columns is-mobile is-vcentered">
                            <div class="column is-1">
                                <span class="icon is-large has-text-danger has-text-left-mobile">
                                    <i class="fas fa-lg fa-search"></i>
                                </span>
                            </div>
                            <div class="column is-3">
                                <span class=" is-size-6 is-size-7-mobile has-text-right-mobile">
                                    Realizas la búsqueda
                                </span>
                            </div>
                            <div class="column is-1">
                                <span class="icon is-large has-text-success has-text-left-mobile">
                                    <i class="fas fa-lg fa-mouse-pointer"></i>
                                </span>
                            </div>
                            <div class="column is-3">
                                <span class=" is-size-6 is-size-7-mobile has-text-right-mobile">
                                    Seleccionas tú favorito
                                </span>
                            </div>
                            <div class="column is-1">
                                <span class="icon is-large  has-text-info has-text-left-mobile">
                                    <i class="fas fa-lg fa-map-marker-alt"></i>
                                </span>
                            </div>
                            <div class="column is-3">
                                <span class="is-size-6 is-size-7-mobile has-text-right-mobile">
                                    Te indicamos como llegar
                                </span>
                            </div>
                        </div>
                        
                    </div>
                </div>   
                <div class="columns is-centered">
                    <div class="column is-three-fifths">
                        <div class="field">
                            <div class="control">
                                <label class="label has-text-centered">Busca el plato, ingrediente que deseas; y encuentra el sitio más cercano</label>
                            </div>
                        </div>
                        <div class="field has-addons">
                            <div class="control is-expanded">
                                <input list="nombres-platos" class="input" type="text" placeholder="nombre del plato o ingrediente que buscas" v-on:keyup="BuscarPlato" v-model="buscarPlato">
                                <datalist id="nombres-platos">
                                    <option v-for="platoCarta in nombresPlatosCarta" :value="platoCarta.nombre"></option>
                                    <option v-for="platoDia in nombresPlatosDia" :value="platoDia.nombre"></option>    
                                </datalist>                     
                            </div>
                            <div class="control">
                                <router-link class="button is-info" :to="{name:'listado-restaurantes',params:{platoBuscado:buscarPlato}}">Buscar</router-link>
                            </div>
                        </div>
                        <div class="">
                            <span><b>Buscar en </b></span>
                            <a v-for="(item, index) in listadoCiudades" v-on:click="SectoresPorCiudad(index)">{{index}} | </a> 
                        </div>
                    </div>
                    
                </div>
                <router-view  name="busquedaMenus"></router-view>
                <router-view></router-view>
            </div>
        </section>
    </div>    
</template>

<script>
    import axios from "axios";

    export default {
        props:{
            routehome:{
                type:String
            },
            imglovecorrientazo:{
                type:String
            }
        },
        mounted() {
        },
        components: {
        },
        created(){
            this.ListadoCiudades()
        },
        data(){
            return{
                btnBuscar:false,
                nombresPlatosCarta    : [],
                nombresPlatosDia      : [],
                buscarPlato           : '',
                listadoCiudades       : {},
            }
        },
        methods:{
            BuscarPlato(){
                axios.get('buscar-plato-del-dia/'+this.buscarPlato)
                .then(response => {
                    this.nombresPlatosCarta = response.data.platosCarta;
                    this.nombresPlatosDia = response.data.platosDia;
                    this.btnBuscar=true;
                })    
                .catch(error => {
                    console.log(error)
                })
            },

            ListadoCiudades(){
                axios.get('ciudades-sectores')
                .then(response => {
                    this.listadoCiudades = response.data;
                })    
                .catch(error => {
                    console.log(error)
                })
            },

            SectoresPorCiudad(ciudad){
                this.$router.push({name:'sectores-ciudad',params:{ciudad:ciudad}});
            }
        },
    }
</script>
