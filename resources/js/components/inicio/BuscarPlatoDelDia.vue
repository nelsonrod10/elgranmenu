<template>
    <div class="container">
        <section class="section">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column is-three-fifths">
                        <div class="field">
                            <div class="control">
                                <label class="label has-text-centered">Hoy quiero comer...</label>
                            </div>
                        </div>
                        <div class="field has-addons">
                            <div class="control is-expanded">
                                <input list="nombres-platos" class="input" type="text" placeholder="Que quieres comer, que restaurante buscas" v-on:keyup="BuscarPlato" v-model="buscarPlato">
                                <datalist id="nombres-platos">
                                    <option v-for="platoCarta in nombresPlatosCarta" :value="platoCarta.nombre"></option>
                                    <option v-for="platoDia in nombresPlatosDia" :value="platoDia.nombre"></option>    
                                </datalist>                     
                            </div>
                            <div class="control">
                                <a class="button is-info" v-on:click="ListaRestaurantes">Buscar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div v-if="flagPlatoSeleccionado || flagBusquedaPorMenu" class="container">
                <div class="columns is-centered">
                    <div class="column has-text-centered">
                        <p class="title is-size-5">Puedes hacer la busqueda por tipo de Menu</p>
                        <a class="button is-primary is-small" v-on:click="BuscarPorMenu('tradicional')">Tradicional</a>
                        <a class="button is-link is-small" v-on:click="BuscarPorMenu('vegetariano')">Vegetariano</a>
                        <a class="button is-success is-small" v-on:click="BuscarPorMenu('vegano')">Vegano</a>
                    </div>
                </div>
            </div>
            <br/>
            <div v-if="!flagPlatoSeleccionado && !flagBusquedaPorMenu" class="container">
                <div class="columns is-centered">
                    <div class="column">
                        <label class="label has-text-centered">¿No sabes que quieres?... Encuentra tu menu</label>
                    </div>
                </div>    
                <div class="columns is-centered">
                    <div class="column">
                        <div class="columns">
                            <div class="column">
                                <div class="notification is-primary">
                                    <h1 class="title is-4 has-text-centered">Menu Tradicional</h1>
                                    <p class="has-text-justified">Tu comida acompañada de carnes blancas o rojas en el restaurante de tu preferencia</p>
                                    <div class="has-text-centered">
                                        <a class="button is-dark" v-on:click="BuscarPorMenu('tradicional')">Seleccionar</a>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="notification is-info">
                                    <h1 class="title is-4 has-text-centered">Menu Vegetariano</h1>
                                    <p class="has-text-justified">Las mejores opciones vegetarianas las puedes encontrar en esta sección</p>
                                    <div class="has-text-centered">
                                        <a class="button is-dark" v-on:click="BuscarPorMenu('vegetariano')">Seleccionar</a>
                                    </div>

                                </div>
                            </div>
                            <div class="column">
                                <div class="notification is-success">
                                    <h1 class="title is-4 has-text-centered">Menu Vegano</h1>
                                    <p class="has-text-justified">Encuentre en esta sección los restaurantes con los mejores platos veganos.</p>
                                    <div class="has-text-centered">
                                        <a class="button is-dark" v-on:click="BuscarPorMenu('vegano')">Seleccionar</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        <listado-restaurantes 
            v-if="flagPlatoSeleccionado" 
            :platoSeleccionado="buscarPlato"
        >
        </listado-restaurantes>
        <busqueda-por-menu 
            v-if="flagBusquedaPorMenu"
            :tipoMenu="tipoBusquedaPorMenu"
            :key="keyBuscarPorMenus"
        >
        </busqueda-por-menu>   
        </section>
    </div>

</template>

<script>
    import axios from "axios";
    import ListadoRestaurantes from './ListadoRestaurantes.vue';
    import BusquedaPorMenu from './menuSeleccionado/BusquedaPorMenus.vue';

    export default {
        mounted() {
            console.log('Component mounted.')
        },
        components: {
            listadoRestaurantes :   ListadoRestaurantes,
            busquedaPorMenu     :   BusquedaPorMenu,          
        },
        created(){
        },
        data(){
            return{
                btnBuscar:false,
                flagPlatoSeleccionado : false,
                flagBusquedaPorMenu   : false,
                tipoBusquedaPorMenu   : '',
                keyBuscarPorMenus     : 0, 
                nombresPlatosCarta    : [],
                nombresPlatosDia      : [],
                buscarPlato           : '',
            }
        },
        methods:{
            BuscarPlato(){
                this.ResetearFlags();
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

            ListaRestaurantes(){
                this.ResetearFlags();
                this.flagPlatoSeleccionado  = true;
            },
            
            BuscarPorMenu(tipoMenu){
                this.ResetearFlags();
                this.keyBuscarPorMenus += 1;
                this.flagBusquedaPorMenu = true;
                this.tipoBusquedaPorMenu = tipoMenu;
            },    
            
            ResetearFlags(){
                this.flagPlatoSeleccionado = false;
                this.flagBusquedaPorMenu = false;
                return;
            }
        },
        
    }
</script>
