<template>
    <div>
        <div class="columns is-centered" v-if="datosSector.tipo">
            <div class="column">
                <p class="title has-text-centered is-size-5 has-text-success">
                    <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                    Lugares que te pueden interesar en <span v-if="datosSector.tipo !== 'Zona o Sector'">{{datosSector.tipo}}</span> {{datosSector.nombre}}
                </p>
            </div>
        </div>
        <div class="columns is-centered">
            <div class="column is-6">
                <ul v-if="otrosRestaurantesSector.length > 0">
                    <li v-for="otroRestaurante in otrosRestaurantesSector">
                        <div v-if="otroRestaurante.id !== restaurante.id" class="columns is-vcentered" >
                            <div class="column is-8">
                                <div><b>{{otroRestaurante.nombre}}</b></div>
                                <div class="is-size-7">
                                    <span class="icon"><i class="fas fa-phone"></i></span>{{ otroRestaurante.telefono }}  
                                    <span class="icon"><i class="fas fa-map-marker-alt"></i></span>{{ otroRestaurante.direccion }}
                                    <span class="icon"><i class="fas fa-map-marker-alt"></i></span>{{ otroRestaurante.ciudad }}
                                </div>    
                                <a v-if="flagOrigen == 'Restaurante'" class="button is-info is-small" v-on:click="$emit('visitar-otro-restaurante',otroRestaurante)">Visitar</a>
                                <router-link v-if="flagOrigen == 'VerPlato'" class="button is-info is-small" :to="{name:'restaurante',params:{restaurante:otroRestaurante}}">Visitar</router-link>
                            </div>
                        </div>
                    </li>
                </ul>
                <p v-else class="has-text-centered">No existen más lugares en este sector</p>
            </div>
        </div>
    </div>
    

</template>

<script>
    import axios from "axios"

    export default {
        mounted() {
        },
        components: {
        },
        created(){
        },
        data(){
            return{
            }
        },
        methods:{
        },
        props:{
            restaurante:{
                required:true
            },
            datosSector:{
                required:true
            },
            otrosRestaurantesSector:{
                required:true
            },
            flagOrigen:{
                /*Origen = VerPlato.vue || Origen == Restaurante.vue*/
                required:true
            }
            
        }
    }
</script>
