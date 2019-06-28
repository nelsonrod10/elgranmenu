<template>
    <span>
        <div v-if="!flagEditarPlato && !flagPlatoDelDia" class="has-text-centered">
            <div class="title is-size-4 has-text-centered">
                Platos que se ofrecen ocasionalmente
                <div class="help">(Debe escogerlos como plato del día para que los clientes los puedan ver)</div>
            </div>
            
        </div>
        <hr/>
        <div v-for="platoPorFecha in cartaPorFecha" v-if="!flagEditarPlato && !flagPlatoDelDia">
            <div class="columns">
                <div class="column is-6">
                    <ul>
                        <li><span class="title is-size-5">{{platoPorFecha.nombre}}</span></li>
                        <li><span class="title is-size-6">Menu: </span>{{platoPorFecha.tipo_menu}}</li>
                        <li><span class="title is-size-6">Comida: </span>{{platoPorFecha.tipo_plato}}</li>
                        <li><span class="title is-size-6">Precio: </span>$ {{platoPorFecha.precio}}</li>
                        <li><span class="title is-size-6">Descripción: </span>{{platoPorFecha.descripcion}}</li>
                        <li><span class="title is-size-6">Ingredientes: </span></li>
                        <li><span class="is-size-7">
                            <listado-ingredientes
                                :platoIngredientes="platoPorFecha"
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
                                :verificarPlato="platoPorFecha"
                                v-on:seleccionar-plato-del-dia="PlatoDelDia(platoPorFecha)"
                                v-on:eliminar-plato-del-dia="EliminarPlatoDelDia(platoPorFecha)"
                                :key="keyVerificarPlatoDelDia"
                            ></verificar-plato-del-dia>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <div class="buttons">
                        <a class="button is-warning is-small" v-on:click="AgregarIngrediente(platoPorFecha)">
                            <span class="icon is-small">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span>Ingredientes</span>
                        </a>
                        <a class="button is-success is-small" v-on:click="ActualizarPlato(platoPorFecha)">
                            <span class="icon is-small">
                                <i class="fas fa-pen"></i>
                            </span>
                            <span>Ver y Editar</span>
                        </a>
                        <a class="button is-danger is-small" v-on:click="EliminarPlato(platoPorFecha)">
                            <span class="icon is-small">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span>Eliminar</span>
                        </a>
                    </div>
                </div>
            </div>    
        </div>
        <br/>
        <div v-if="!flagEditarPlato && !flagPlatoDelDia" class="has-text-centered">
            <div class="title is-size-4">
                Platos diponibles siempre   
                <div class="help">(Los clientes siempre los podrán ver)</div>    
            </div>
        </div>
        <hr/>
        <div v-for="platoDisponible in cartaDisponible" v-if="!flagEditarPlato && !flagPlatoDelDia">
            <div class="columns">
                <div class="column is-6">
                    <ul>
                        <li><span class="title is-size-5">{{platoDisponible.nombre}}</span></li>
                        <li><span class="title is-size-6">Menu: </span>{{platoDisponible.tipo_menu}}</li>
                        <li><span class="title is-size-6">Comida: </span>{{platoDisponible.tipo_plato}}</li>
                        <li><span class="title is-size-6">Precio: </span>$ {{platoDisponible.precio}}</li>
                        <li><span class="title is-size-6">Descripción: </span>{{platoDisponible.descripcion}}</li>
                        <li><span class="title is-size-6">Ingredientes: </span></li>
                        <li><span class="is-size-7">
                            <listado-ingredientes
                                :platoIngredientes="platoDisponible"
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
                                :verificarPlato="platoDisponible"
                                v-on:seleccionar-plato-del-dia="PlatoDelDia(platoDisponible)"
                                v-on:eliminar-plato-del-dia="EliminarPlatoDelDia(platoDisponible)"
                                :key="keyVerificarPlatoDelDia"
                            ></verificar-plato-del-dia>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <div class="buttons">
                        <a class="button is-warning is-small" v-on:click="AgregarIngrediente(platoDisponible)">
                            <span class="icon is-small">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span>Ingredientes</span>
                        </a>
                        <a class="button is-success is-small" v-on:click="ActualizarPlato(platoDisponible)">
                            <span class="icon is-small">
                                <i class="fas fa-pen"></i>
                            </span>
                            <span>Ver y Editar</span>
                        </a>
                        <a class="button is-danger is-small" v-on:click="EliminarPlato(platoDisponible)">
                            <span class="icon is-small">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span>Eliminar</span>
                        </a>
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
            cartaPorFecha: {
                required: true
                // default: 'Lucas'
            },
            cartaDisponible: {
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
