<template>
    <div>
            <div v-if="!flagPlatoSeleccionado && !flagVisitarRestaurante" class="container">
                <div class="columns is-centered">
                    <div class="column is-title is-size-4  has-text-centered is-capitalized">
                        Menus {{ tipoMenu }}.
                    </div>
                </div>
                <div class="columns is-centered">
                    <div class="column is-8">
                        <ul>
                            <li v-for="item in listado">
                                <div class="columns is-vcentered">
                                    <div class="column is-8">
                                        <div><b>{{item.plato.nombre}}</b></div>
                                        <div class="is-size-7">{{item.plato.descripcion}}. <b>$ {{item.plato.precio}}</b></div>    
                                        <div class="has-text-danger is-capitalized is-italic help">Plato {{item.plato.tipo_plato}}</div>
                                    </div>
                                    <div class="column">
                                        <a class="button is-success is-small" v-on:click="VerPlato(item.restaurante,item.plato)">Ver más</a>
                                    </div>    
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>    
        <ver-plato
            v-if="flagPlatoSeleccionado"
            :platoSeleccionado = "dataPlato"
            :restaurante = "dataRestaurante"
            v-on:ver-otro-plato="VerPlato"
            v-on:visitar-restaurante="VisitarRestaurante"
            :key="keyVerOtroPlato"
        >
        </ver-plato>
        <visitar-restaurante 
            v-if="flagVisitarRestaurante" 
            v-on:ver-otro-plato="VerPlato"
            :restaurante="visitarRestaurante"> 
        </visitar-restaurante>
    </div>
</template>

<script>
    import axios from "axios"
    import PlatoSeleccionado from '@/js/components/inicio/PlatoSeleccionado/DetallesRestaurante.vue';
    import VisitarRestaurante from '@/js/components/inicio/PlatoSeleccionado/Restaurante.vue';

    export default {
        mounted() {
        },
        components: {
            verPlato           : PlatoSeleccionado,
            visitarRestaurante : VisitarRestaurante,
        },
        created(){
            this.VerMenu();
        },
        data(){
            return{
                listado:{},
                flagPlatoSeleccionado:false,
                flagVisitarRestaurante:false,
                dataPlato:{},
                dataRestaurante:{}    
            }
        },
        methods:{
            VerMenu(){
                axios.get('ver-menu-general/'+this.tipoMenu)
                .then(response => {
                    this.listado = response.data;
                })    
                .catch(error => {
                    console.log(error)
                })
            },

            VerPlato(restaurante,plato){
                this.keyVerOtroPlato += 1;
                this.flagPlatoSeleccionado = true;
                this.flagVisitarRestaurante = false;
                this.dataRestaurante = restaurante;
                this.dataPlato = plato;
            },
            
            VisitarRestaurante(restaurante){
                this.flagPlatoSeleccionado = false;
                this.flagVisitarRestaurante = true;
                this.visitarRestaurante = restaurante;
            }
        },
        props:{
            tipoMenu:{
                type:String,
                required:true
            }
        }
    }
</script>
