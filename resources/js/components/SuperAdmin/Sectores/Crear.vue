<template>
    <div class="modal is-active">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
              <p class="modal-card-title">Crear Sector</p>
              <button class="delete" aria-label="close" v-on:click="CerrarModal()"></button>
            </header>
            <form name="crear-sector" method="post" v-on:submit.prevent="CrearSector"> <!--{{ route('sectores.store') }}-->  
                <section class="modal-card-body">
                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label" for="tipo">¿Qué tipo de sector es?</label>
                                <div class="control">
                                    <select id="tipo" name="tipo" class="input" v-model="datosFrm.tipo" v-on:change="TipoSector()" required>
                                        <option value="">Seleccione...</option>
                                        <option value="Zona o Sector">Zona o sector de la Ciudad</option>
                                        <option value="Plaza de Mercado">Plaza de Mercado</option>
                                        <option value="Centro Comercial">Centro Comercial</option>
                                        <option value="Plazoleta de Comidas">Plazoleta de Comidas</option>
                                    </select>
                                </div>
                            </div>    
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-6">
                            <div class="field">
                                <label class="label" for="nombre">Nombre {{datosFrm.tipo}}</label>
                                <div class="control has-icons-left">
                                    <input id="nombre" name="nombre" class="input" v-model="datosFrm.nombre" required type="text" placeholder="Nombre del sector">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-font"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="column">
                            <div class="field">
                                <label class="label" for="ciudad">Ciudad</label>
                                <div class="control has-icons-left">
                                    <input id="ciudad" list="nombres-ciudades" name="ciudad" class="input" v-model="datosFrm.ciudad" required type="text" placeholder="Ciudad del sector">
                                    <datalist id="nombres-ciudades">
                                        <option v-for="ciudad in listadoCiudades" :value="ciudad.nombre"></option>
                                    </datalist>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-font"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div v-if="flagPerimetro">
                        <div class="columns">
                            <div class="column is-centered">
                                <div class="label has-text-centered">Indique los limites de {{datosFrm.nombre}}</div>
                                <div class="help has-text-centered">(Ejm: Desde Calle 1, Hasta Calle 10. Entre Cra 5 y Cra 8)</div>
                            </div>
                        </div>
                        <div class="columns">
                            <!---->
                            <div class="column">
                                <div class="columns">
                                    <div class="column">
                                        <div class="field">
                                            <label class="label" for="limite_1">Desde</label>
                                            <div class="control has-icons-left">
                                                <input id="limite_1" name="limite_1" v-model="datosFrm.limite1" class="input" type="text" placeholder="Calle 1">
                                                <span class="icon is-small is-left">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </span>
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="column">
                                        <div class="field">
                                            <label class="label" for="limite_2">Hasta</label>
                                            <div class="control has-icons-left">
                                                <input id="limite_2" name="limite_2" v-model="datosFrm.limite2" class="input" type="text" placeholder="Calle 10">
                                                <span class="icon is-small is-left">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </span>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                                <div class="columns">
                                    <div class="column">
                                        <div class="field">
                                            <label class="label" for="limite_3">Entre</label>
                                            <div class="control has-icons-left">
                                                <input id="limite_3" name="limite_3" class="input" v-model="datosFrm.limite3" type="text" placeholder="Cra 3">
                                                <span class="icon is-small is-left">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div class="field">
                                            <label class="label" for="limite_4">y la</label>
                                            <div class="control has-icons-left">
                                                <input id="limite_4" name="limite_4" class="input" v-model="datosFrm.limite4" type="text" placeholder="Cra 7">
                                                <span class="icon is-small is-left">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-if="flagDireccion" class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label" for="direccion">Dirección {{datosFrm.nombre}} </label>
                                <div class="control has-icons-left">
                                    <input id="direccion" name="direccion" class="input" v-model="datosFrm.direccion" type="text" placeholder="Dirección del sector">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                </div>
                            </div>    
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot">
                    <button class="button is-success">Crear</button>
                    <a class="button" v-on:click="CerrarModal()">Cancel</a>
                </footer>
            </form>      
        </div>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props:{
            
        },
        components: {

        },
        created() {
            this.GetListadoCiudades()
        },

        data(){
            return{
                listadoCiudades:{},    
                datosFrm:{
                    nombre   :'',
                    ciudad   :'',
                    tipo     :'',
                    limite1  :'',
                    limite2  :'',
                    limite3  :'',
                    limite4  :'',
                    direccion:'',
                },
                flagPerimetro : false,
                flagDireccion : false,
            }
        },
        methods:{
            CerrarModal(){
                this.$emit('cerrar-modal');
            },
            
            GetListadoCiudades(){
                axios.get('../administrador/listado-ciudades')
                .then(response => {
                    this.listadoCiudades = response.data;
                })    
                .catch(error => {
                    console.log(error)
                })
            },
            TipoSector(){
                this.flagPerimetro = false;
                this.flagDireccion = false;
                if(this.datosFrm.tipo === "Zona o Sector"){
                    this.flagPerimetro = true;
                }
                if(this.datosFrm.tipo !== "Zona o Sector"){
                    this.flagDireccion = true;
                }
            },

            CrearSector(){
                axios.post('sectores',{
                    nombre     : this.datosFrm.nombre,
                    ciudad     : this.datosFrm.ciudad,
                    tipo       : this.datosFrm.tipo,
                    limite1    : this.datosFrm.limite1,
                    limite2    : this.datosFrm.limite2,
                    limite3    : this.datosFrm.limite3,
                    limite4    : this.datosFrm.limite4,
                    direccion  : this.datosFrm.direccion
                })
                .then(response => {
                    this.CerrarModal();
                })    
                .catch(error => {
                    console.log(error)
                })
            }
        },
        
    }
</script>
