<template>
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
                        <router-link class="button is-info" :to="{name:'listado-restaurantes',params:{platoBuscado:buscarPlato}}">Buscar</router-link>
                    </div>
                </div>
            </div>
        </div>
        <router-view  name="busquedaMenus"></router-view>
        <router-view></router-view>
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
        },
        data(){
            return{
                btnBuscar:false,
                nombresPlatosCarta    : [],
                nombresPlatosDia      : [],
                buscarPlato           : '',
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
        },
    }
</script>
