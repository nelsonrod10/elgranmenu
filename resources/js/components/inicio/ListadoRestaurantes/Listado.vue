<template>
    <div class="column is-four-fifths">
        <div class="box" v-for="data in listaResultados">
            <div class="columns is-vcentered">
                <div class="column is-three-fifths">
                    <h1 class="title is-4 is-capitalized">{{ data.restaurante.nombre }}</h1>
                    <p class="title is-5 is-capitalized">{{ data.plato.nombre }}</p>
                    <p class="subtitle is-6">{{ data.plato.descripcion }} <span class="has-text-danger is-italic help"> ( Plato {{data.plato.tipo_plato}} ) </span></p>
                    <div><a class="has-text-dark">{{ data.restaurante.direccion }} - {{ data.restaurante.ciudad }}</a> | <a class="has-text-dark">{{ data.restaurante.telefono }} </a></div>
                    <div v-if="data.sector && data.sector.tipo">
                        <info-general-sector
                            :restaurante="data.restaurante" 
                            :sector="data.sector"
                        >
                        </info-general-sector>
                    </div>
                </div>
                <div class="column">
                    <div>
                        <span class="icon has-text-danger is-size-6">
                            <i class="fas fa-dollar-sign"></i>
                        </span>
                        <span class="has-text-danger is-size-5">
                            <b>{{ data.plato.precio }} COP</b>
                        </span>
                    </div>

                    <!--<div>
                        <span class="icon has-text-success  is-size-6">
                            <i class="fas fa-star"></i>
                        </span>
                        <span class=" has-text-success  is-size-5">
                            <b>4.8</b>
                        </span>    
                    </div>-->
                </div>            

                <div class="column">
                    <div class="has-text-centered"> 
                        <router-link class="button is-info" :to="{name:'plato-restaurante',params:{platoSeleccionado:data.plato, restaurante:data.restaurante}}">Ver más</router-link>
                    </div>
                </div>
            </div>    
        </div>
        <infinite-loading @infinite="InfiniteHandler">
            <div slot="no-more">No hay mas resulados</div>
            <div slot="no-results">Lo sentimos, no tenemos resultados.</div>
        </infinite-loading>    
    </div>    
</template>

<script>
    import axios from "axios"
    import InfoGeneralSector from '@/js/components/inicio/Sectores/InfoGeneral.vue';

    export default {
        components:{
            infoGeneralSector   : InfoGeneralSector
        },
        created(){
            this.GetPlatoBuscado()
        },
        updated(){
            
        },
        data(){
            return{
                page: 0,
                platoBuscado:{},
                listaResultados:[],
            }
        },
        methods:{
            GetPlatoBuscado(){
                this.platoBuscado = this.$route.params.platoBuscado;
            },
            
            InfiniteHandler($state) {
                this.page += 1;
                axios.get('restaurantes-plato-del-dia/'+this.platoBuscado, {
                  params: {
                    page: this.page,
                  },
                }).then(response => {
                    if (response.data.data.length) {
                        this.listaResultados=this.listaResultados.concat(response.data.data);
                        $state.loaded();
                    } else {
                        $state.complete();
                    }
                })    
                .catch(error => {
                    console.log(error)
                })
            },
        }
    }
</script>
