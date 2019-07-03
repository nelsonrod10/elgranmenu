<template>
    <div>
        <section v-if="!flagMenuTradicional && !flagMenuVegetariano && !flagMenuVegano" class="section">
            <div class="container">
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
                                        <a class="button is-dark" v-on:click="BuscarPorMenu('Tradicional')">Seleccionar</a>
                                    </div>

                                </div>
                            </div>
                            <div class="column">
                                <div class="notification is-info">
                                    <h1 class="title is-4 has-text-centered">Menu Vegetariano</h1>
                                    <p class="has-text-justified">Las mejores opciones vegetarianas las puedes encontrar en esta sección</p>
                                    <div class="has-text-centered">
                                        <a class="button is-dark" v-on:click="BuscarPorMenu('Vegetariano')">Seleccionar</a>
                                    </div>

                                </div>
                            </div>
                            <div class="column">
                                <div class="notification is-success">
                                    <h1 class="title is-4 has-text-centered">Menu Vegano</h1>
                                    <p class="has-text-justified">Encuentre en esta sección los restaurantes con los mejores platos veganos.</p>
                                    <div class="has-text-centered">
                                        <a class="button is-dark" v-on:click="BuscarPorMenu('Vegano')">Seleccionar</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <menu-tradicional 
            v-if="flagMenuTradicional"
            v-on:ver-otro-menu = "BuscarPorMenu"
            v-on:ver-plato=""
            v-on:visitar-restaurante=""
            :key="keyPlato">
        </menu-tradicional>
        <menu-vegetariano 
            v-if="flagMenuVegetariano" 
            v-on:ver-otro-menu = "BuscarPorMenu"
            v-on:ver-plato=""
            v-on:visitar-restaurante=""
            :key="keyPlato">
        </menu-vegetariano>
        <menu-vegano 
            v-if="flagMenuVegano" 
            v-on:ver-otro-menu = "BuscarPorMenu"
            v-on:ver-plato=""
            v-on:visitar-restaurante=""
            :key="keyPlato">
        </menu-vegano>
    
    </div>
    
</template>

<script>
    import axios from "axios";
    import ListadoRestaurantes from './ListadoRestaurantes.vue';
    import MenuTradicional from './menuSeleccionado/Tradicional.vue';
    import MenuVegetariano from './menuSeleccionado/Vegetariano.vue';
    import MenuVegano from './menuSeleccionado/Vegano.vue';

    export default {
        mounted() {
            console.log('Component mounted.')
        },
        components: {
            listadoRestaurantes :   ListadoRestaurantes,
            menuTradicional     :   MenuTradicional,
            menuVegetariano     :   MenuVegetariano,
            menuVegano          :   MenuVegano,
        },
        created(){
        },
        data(){
            return{
                flagMenuTradicional :false,
                flagMenuVegetariano :false,
                flagMenuVegano      :false,
                btnBuscar           :false,
                platoSeleccionado   :false,
                nombresPlatos       : [],
                buscarPlato         : [],
                platoBuscado        :"",
            }
        },
        methods:{
            BuscarPlato(){
                axios.get('buscar-plato-del-dia/'+this.buscarPlato)
                .then(response => {
                    this.nombresPlatos = response.data;
                    this.btnBuscar=true;
                })    
                .catch(error => {
                    console.log(error)
                })
            },
            ListaRestaurantes(){
                this.platoBuscado = this.nombresPlatos[0].nombre;
                this.platoSeleccionado = true;
                axios.get('restaurantes-plato-del-dia/'+this.nombresPlatos[0].id)
                .then(response => {
                    //this.nombresPlatos = response.data;
                })    
                .catch(error => {
                    console.log(error)
                })
                
            },
            
            BuscarPorMenu(tipoMenu){
                this.flagMenuTradicional =false;
                this.flagMenuVegetariano =false;
                this.flagMenuVegano      =false;
                if(tipoMenu === "Tradicional"){
                    this.flagMenuTradicional = true;
                }
                if(tipoMenu === "Vegetariano"){
                    this.flagMenuVegetariano = true;
                }
                if(tipoMenu === "Vegano"){
                    this.flagMenuVegano = true;
                }
                
            },

        },
        
    }
</script>
