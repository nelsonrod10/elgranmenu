<template>
    <div class="column">
        <div v-if="!nuevoPlato" class="box">
            <div class="columns">
                <div class="column">
                    <p class="title is-size-4 has-text-centered">
                        <a v-bind:href="this.route">{{ restaurante['nombre'] }}</a>
                    </p>
                    <p class="title is-size-4 has-text-centered">Menu</p>
                </div>
            </div>
            <div class="columns has-text-centered">
                <div class="column ">
                    <a class="button" v-on:click="NuevoPlato" >Agrear Nuevo Plato</a>
                </div>
            </div>
            
            <span v-if="cartaVacia">
                <listado-platos 
                    :cartaDisponible = "cartaDisponible"
                    :cartaPorFecha   = "cartaPorFecha"
                    v-on:cargar-listado-plato="GetListadoPlatos">
                </listado-platos>
            </span>    

            <div v-else class="columns is-centered">
                <div class="column">
                    <div class="columns is-centered">
                        <div class="column is-4">
                            <div class="notification is-info">
                                <p class="has-text-centered">No se ha creado ningún plato</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <nuevo-plato 
            v-else-if="nuevoPlato" 
            :restaurante="restaurante"
            v-on:cancelar-nuevo-plato="GetListadoPlatos"
        ></nuevo-plato>
        </div>
    </div>

</template>

<script>
    import ListadoPlatos from './ListadoPlatos.vue';
    import NuevoPlato from './NuevoPlato.vue';

    export default {
        mounted() {
            console.log('Component mounted.')
        },
        components: {
            listadoPlatos:ListadoPlatos,
            nuevoPlato   :NuevoPlato
        },
        created(){
            this.GetListadoPlatos();
            this.VerificarCartaVacia();
            
        },
        data(){
            return{
                cartaVacia:false,
                nuevoPlato:false,
                cartaDisponible:{},
                cartaPorFecha:{},
            }
        },
        methods:{
            VerificarCartaVacia(){
                this.cartaVacia = true;//(Object.keys(carta).length > 0);
            },

            NuevoPlato(){
                this.nuevoPlato = true;
            },

            GetListadoPlatos(){
                axios.get('platos/'+this.restaurante['id'])
                .then(response => {
                    this.nuevoPlato = false;
                    this.cartaDisponible = response.data.disponible;
                    this.cartaPorFecha   = response.data.porFecha;
                })    
                .catch(error => {
                    console.log(error)
                })
            }
        },
        props:{
            restaurante: {
                type: Object,
                required: true
            },
            route:{
                type:String,
                required:true
            }
        },
    }
</script>
