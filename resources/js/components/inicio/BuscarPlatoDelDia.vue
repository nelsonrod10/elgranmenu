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
                                    <option v-for="plato in nombresPlatos" :value="plato.nombre"></option>
                                </datalist>                     
                            </div>
                            <div class="control">
                                <a class="button is-info" v-on:click="ListaRestaurantes">Buscar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <listado-restaurantes v-if="FlagPlatoSeleccionado" :platoSeleccionado="buscarPlato"></listado-restaurantes>
        <busqueda-por-menus v-else></busqueda-por-menus>
        <!--<pre>{{ $data }}</pre>-->
    </div>

</template>

<script>
    import axios from "axios";
    import ListadoRestaurantes from './ListadoRestaurantes.vue';
    import BusquedaPorMenus from './BusquedaPorMenus.vue';

    export default {
        mounted() {
            console.log('Component mounted.')
        },
        components: {
            listadoRestaurantes: ListadoRestaurantes,
            busquedaPorMenus: BusquedaPorMenus,
        },
        created(){
        },
        data(){
            return{
                btnBuscar:false,
                FlagPlatoSeleccionado:false,
                nombresPlatos: [],
                buscarPlato: '',
            }
        },
        methods:{
            BuscarPlato(){
                this.FlagPlatoSeleccionado = false;
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
                this.FlagPlatoSeleccionado = true;
            }    
        },
        
    }
</script>
