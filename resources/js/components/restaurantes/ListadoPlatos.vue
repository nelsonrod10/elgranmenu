<template>
    <span>
        <div v-for="plato in carta" v-if="!flagEditarPlato && !flagPlatoDelDia">
            <div class="box">
                <div class="columns">
                    <div class="column is-6">
                        <ul>
                            <li><span class="title is-size-4">{{plato.nombre}}</span></li>
                            <li><span class="title is-size-6">Menu: </span>{{plato.tipo_menu}}</li>
                            <li><span class="title is-size-6">Comida: </span>{{plato.tipo_plato}}</li>
                            <li><span class="title is-size-6">Precio: </span>$ {{plato.precio}}</li>
                            <li><span class="title is-size-6">Descripción: </span>$ {{plato.descripcion}}</li>
                            <li><span class="title is-size-6">Ingredientes: </span></li>
                            <li><span class="is-size-7">
                                <listado-ingredientes
                                    :platoIngredientes="plato"
                                    :key="keyIngredientes"
                                    v-on:cancelar-crud-plato="CargarListadoPlatos"
                                ></listado-ingredientes></span>
                            </li>
                        </ul>
                    </div>
                    <div class="column">
                        <div class="columns">
                            <div class="column">
                                <verificar-plato-del-dia
                                    :verificarPlato="plato"
                                    v-on:seleccionar-plato-del-dia="PlatoDelDia(plato)"
                                    v-on:eliminar-plato-del-dia="EliminarPlatoDelDia(plato)"
                                    :key="keyVerificarPlatoDelDia"
                                ></verificar-plato-del-dia>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="buttons">
                            <a class="button is-warning is-small" v-on:click="AgregarIngrediente(plato)">
                                <span class="icon is-small">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span>Ingredientes</span>
                            </a>
                            <a class="button is-success is-small" v-on:click="ActualizarPlato(plato)">
                                <span class="icon is-small">
                                    <i class="fas fa-pen"></i>
                                </span>
                                <span>Ver y Editar</span>
                            </a>
                            <a class="button is-danger is-small" v-on:click="EliminarPlato(plato)">
                                <span class="icon is-small">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span>Eliminar</span>
                            </a>
                        </div>
                    </div>
                </div>    
            </div>
        </div>

        <agregar-ingrediente
            v-if="flagAgregarIngrediente" 
            :platoCarta="datosPlato"
            v-on:cancelar-crud-plato="CargarListadoPlatos"
        ></agregar-ingrediente>

        <eliminar-plato
            v-if="flagEliminarPlato" 
            :plato="datosPlato"
            v-on:cancelar-crud-plato="CargarListadoPlatos"
        ></eliminar-plato>
        
        <editar-plato
            v-if="flagEditarPlato" 
            :plato="datosPlato"
            v-on:cancelar-crud-plato="CargarListadoPlatos"
        ></editar-plato>

        <plato-del-dia
            v-if="flagPlatoDelDia" 
            :plato="datosPlato"
            v-on:cancelar-crud-plato="CargarListadoPlatos"
        ></plato-del-dia>

        <eliminar-plato-del-dia
            v-if="flagEliminarPlatoDelDia" 
            :platoDelDia="datosPlato"
            v-on:cancelar-crud-plato="CargarListadoPlatos"
        ></eliminar-plato-del-dia>
    </span>
    
</template>

<script>
    import axios from "axios";
    import EliminarPlato from './EliminarPlato.vue';
    import NuevoIngrediente from './NuevoIngrediente.vue';
    import ListadoIngredientes from './ListadoIngredientes.vue';
    import EditarPlato from './EditarPlato.vue';
    import PlatoDelDia from './PlatoDelDia.vue';
    import VerificarPlatoDelDia from './VerificarPlatoDelDia.vue';
    import EliminarPlatoDelDia from './EliminarPlatoDelDia.vue';

    export default {
        props: {
            carta: {
                required: true
                // default: 'Lucas'
            },
        },
        data(){
            return{
                flagAgregarIngrediente:false,
                flagEliminarPlato:false,
                flagEliminarPlatoDelDia:false,
                flagEditarPlato:false,
                flagPlatoDelDia:false,
                keyVerificarPlatoDelDia: 0,
                keyIngredientes: 0,
                datosPlato:{},
                
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        components: {
            eliminarPlato:EliminarPlato,
            editarPlato:EditarPlato,
            platoDelDia:PlatoDelDia,
            verificarPlatoDelDia:VerificarPlatoDelDia,    
            eliminarPlatoDelDia:EliminarPlatoDelDia,
            agregarIngrediente:NuevoIngrediente,
            listadoIngredientes:ListadoIngredientes,
        },
        created(){
        },
          
        methods:{
            
            AgregarIngrediente(plato){
                this.flagAgregarIngrediente = true;
                this.datosPlato = plato;    
            },

            EliminarPlato(plato){
                this.flagEliminarPlato = true;
                this.datosPlato = plato;    
            },
            
            ActualizarPlato(plato){
                this.flagEditarPlato = true;
                this.datosPlato = plato;
            },
            
            PlatoDelDia(plato){
                this.flagPlatoDelDia = true;
                this.datosPlato = plato;    
            },
            
            EliminarPlatoDelDia(plato){
                this.flagEliminarPlatoDelDia = true;
                this.datosPlato = plato;    
            },
            
            CargarListadoPlatos(){
                this.$emit('cargar-listado-plato');
                this.flagAgregarIngrediente = false,
                this.flagEliminarPlato = false;
                this.flagEditarPlato = false;
                this.flagPlatoDelDia = false;    
                this.flagEliminarPlatoDelDia = false;   
                this.keyVerificarPlatoDelDia += 1;
                this.keyIngredientes += 1;
            },
        },
        
    }
</script>
