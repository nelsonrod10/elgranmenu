<template>
    <div>
            <div v-if="!flagPlatoSeleccionado && !flagVisitarRestaurante" class="container">
                <div class="columns is-centered">
                    <div class="column is-title is-size-4  has-text-centered is-capitalized">
                        Menus {{ tipoMenu }}.
                    </div>
                </div>
                <div class="columns is-centered">
                    <div class="column is-9">
                        <ul>
                            <li v-for="item in listado">
                                <div class="columns is-vcentered">
                                    <div class="column is-8">
                                        <div v-if="item.plato"><b>{{item.plato.nombre}}</b></div>
                                        <div class="is-size-7">{{item.plato.descripcion}}. <b>$ {{item.plato.precio}}</b></div>    
                                        <div class="has-text-danger is-capitalized is-italic help">Plato {{item.plato.tipo_plato}}</div>
                                        <a class="button is-success is-small" v-on:click="VerPlato(item.restaurante,item.plato)">Ver más</a>
                                    </div>
                                </div>
                                
                            </li>
                            <infinite-loading @infinite="InfiniteHandler">
                                <div slot="no-more">No hay mas resulados</div>
                                <div slot="no-results">Lo sentimos, no tenemos resultados.</div>
                            </infinite-loading>
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
            :restaurante="visitarRestaurante"
            v-on:visitar-restaurante="VisitarRestaurante"
            :key="keyVerOtroRestaurante"
        > 
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
            
        },
        data(){
            return{
                page: 1,
                //list: [],
                listado:[],
                flagPlatoSeleccionado:false,
                flagVisitarRestaurante:false,
                keyVerOtroPlato:0,
                keyVerOtroRestaurante:0,
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

            InfiniteHandler($state) {
                axios.get('ver-menu-general/'+this.tipoMenu, {
                  params: {
                    page: this.page,
                  },
                }).then(response => {
                    if (response.data.data.length) {
                        this.page += 1;
                        this.listado=this.listado.concat(response.data.data);
                        $state.loaded();
                    } else {
                        $state.complete();
                    }
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
                this.keyVerOtroRestaurante += 1;
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
