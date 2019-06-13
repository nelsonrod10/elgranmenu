<template>
    <div class="column">
        <div v-if="!agregarPlato" class="box">
            <div class="columns">
                <div class="column">
                    <p class="title is-size-4 has-text-centered">Menu {{ restaurante['nombre'] }}</p>
                </div>
            </div>
            <div class="columns has-text-centered">
                <div class="column">
                    <label class="label">Nombre </label>
                </div>
                <div class="column">
                    <label class="label">Menu </label>
                </div>
                <div class="column">
                    <label class="label">Tipo </label>
                </div>
                <div class="column">
                    <label class="label">Precio </label>
                </div>
                <div class="column  is-3"></div>
            </div>
            
            <span v-if="cartaVacia">
                <!--<listado-platos v-for="plato in carta" v-bind:plato="plato" :key:"plato"></listado-platos>-->
                <div v-for="plato in carta" class="columns has-text-centered">
                    <div class="column">
                        {{plato.nombre}}
                    </div>
                    <div class="column">
                        {{plato.tipo_menu}}
                    </div>
                    <div class="column">
                        {{plato.tipo_plato}}
                    </div>
                    <div class="column">
                        $ {{plato.precio}}
                    </div>
                    <div class="column is-3">
                        <div class="buttons is-centered ">
                            <a class="button is-success is-small" href="">
                                <span class="icon is-small">
                                    <i class="fas fa-pen"></i>
                                </span>
                                <span>Editar</span>
                            </a>
                            <a class="button is-danger is-small" onclick="$('#eliminar-plato').addClass('is-active')">
                                <span class="icon is-small">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span>Eliminar</span>
                            </a>
                        </div>
                    </div>
                </div>
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
            
            <div class="columns has-text-centered">
                <div class="column ">
                    <a class="button" v-on:click="AgregarNuevoPlato" >Agrear Nuevo Plato</a>
                </div>
            </div>
        </div>
        
            <nuevo-plato 
                v-else-if="agregarPlato" 
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
                agregarPlato:false,
            }
        },
        methods:{
            VerificarCartaVacia(){
                this.cartaVacia = true;//(Object.keys(carta).length > 0);
            },

            AgregarNuevoPlato(){
                this.agregarPlato = true;
            },
            GetListadoPlatos(){
                axios.get('platos/'+this.restaurante['id'])
                .then(response => {
                    this.agregarPlato = false,
                    this.carta = response.data
                })    
                .catch(error => {
                    console.log(error)
                })
            }
        },
        props: {
            restaurante: {
                type: Object,
                required: true
            },
            carta: {
                type: Object,
                required: true
            }
            
        },
    }
</script>
