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
                        <div class="box">
                            <div class="columns is-centered">
                                <div class="column has-text-centered is-size-5 is-size-6-mobile">
                                    Te llevamos al restaurante que necesitas para tú almuerzo
                                </div>
                            </div>
                            <div class="columns is-mobile is-vcentered  has-text-centered">
                                <div class="column is-4">
                                    <div>
                                        <span class="icon is-large has-text-danger">
                                            <i class="fas fa-lg fa-search"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <span class=" is-size-6 is-size-7-mobile">
                                            Buscas
                                        </span>    
                                    </div>
                                </div>
                                <div class="column is-4">
                                    <div>
                                        <span class="icon is-large has-text-success">
                                            <i class="fas fa-lg fa-mouse-pointer"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <span class=" is-size-6 is-size-7-mobile">
                                            Seleccionas
                                        </span>
                                    </div>
                                </div>
                                <div class="column is-4">
                                    <div>
                                        <span class="icon is-large  has-text-info">
                                            <i class="fas fa-lg fa-map-marker-alt"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <span class="is-size-6 is-size-7-mobile">
                                            Disfrutas
                                        </span>
                                    </div>
                                </div>
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
                                <input list="nombres-platos" class="input" type="text" placeholder="nombre del plato o ingrediente que buscas" v-on:keyup="BuscarPlato" v-model="buscarPlato" autofocus>
                                <datalist id="nombres-platos">
                                    <option v-for="platoCarta in nombresPlatosCarta" :value="platoCarta.nombre"></option>
                                    <option v-for="platoDia in nombresPlatosDia" :value="platoDia.nombre"></option>    
                                </datalist>                     
                            </div>
                            <div class="control">
                                <router-link class="button is-danger" :to="{name:'listado-restaurantes',params:{platoBuscado:buscarPlato}}">Buscar</router-link>
                            </div>
                        </div>
                        <div class="">
                            <span class="tooltip is-tooltip-bottom is-tooltip-active " data-tooltip="¿Buscas algún sector?"><b>Buscar por sectores en </b></span>
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
                launchModal           : 'modal',
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
            },

            LaunchModalInfo(){
                this.launchModal = 'modal is-active'
            },

            CloseModalInfo(){
                this.launchModal = 'modal'
            }
            
        },
    }
</script>
