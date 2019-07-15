<template>
    <div>
        <form name="frm-crear-restaurante" method="post" v-on:submit.prevent="CrearRestaurante">
            <div class="columns">
                <div class="column ">
                    <div class="field  has-text-centered">
                        <label class="title is-size-4">Datos Generales</label>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column is-6">
                    <div class="field">
                        <label class="label" for="nombre">Nombre Restaurante</label>
                        <div class="control has-icons-left">
                            <input id="nombre" name="nombre" v-model="datosFrm.nombre" required class="input" type="text" placeholder="Nombre del establecimiento">
                            <span class="icon is-small is-left">
                                <i class="fas fa-check"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label" for="nit">Nit</label>
                        <div class="control has-icons-left">
                            <input id="nit" name="nit" v-model="datosFrm.nit" required class="input" type="number" placeholder="NIT">
                            <span class="icon is-small is-left">
                                <i class="fas fa-sort-numeric-up"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column is-6">
                    <div class="field">
                        <label class="label" for="telefono">Teléfono (Domicilios)</label>
                        <div class="control has-icons-left">
                            <input id="telefono" name="telefono" v-model="datosFrm.telefono" class="input" type="number" placeholder="Número Telefónico">
                            <span class="icon is-small is-left">
                                <i class="fas fa-phone"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label" for="celular">Celular</label>
                        <div class="control has-icons-left">
                            <input id="celular" name="celular" v-model="datosFrm.celular" class="input" type="number" placeholder="Número Celular">
                            <span class="icon is-small is-left">
                                <i class="fas fa-mobile-alt"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>    
            <div class="columns">
                <div class="column is-6">
                    <div class="field">
                        <label class="label" for="ciudad">Ciudad</label>
                        <div class="control has-icons-left">
                            <input id="ciudad" name="ciudad" v-model="datosFrm.ciudad" v-on:change="CargarSectores()" required class="input" type="text" placeholder="Ciudad">
                            <span class="icon is-small is-left">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label" for="sector">¿Se encuentra en algun de los siguientes sectores?</label>
                        <div class="control is-expanded">
                            <div class="select is-fullwidth">
                                <select id="sector" name="sector" v-model="datosFrm.sector" required v-on:change="SectorSeleccionado()">
                                    <option value="">Seleccione una opción...</option>
                                    <option value="0">Ninguno</option>
                                    <option v-for="sector in sectores" v-bind:value="sector">{{sector.tipo}} {{sector.nombre}}</option>
                                </select>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>    

            <div v-if="flagSectorSeleccionado" class="columns">
                <div class="column is-6">
                    <div class="field">
                        <label class="label" for="direccion">Dirección</label>
                        <div class="control has-icons-left">
                            <input id="direccion" name="direccion" :disabled="flagDisableDireccion" v-model="datosFrm.direccion" required class="input" type="text" placeholder="Dirección del restaurante">
                            <span class="icon is-small is-left">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label" for="local">¿{{datosFrm.nombre}} se encuentra en un local?</label>
                        <div class="control has-icons-left">
                            <input id="local" name="local" v-model="datosFrm.local" class="input" type="text" placeholder="No Local (si aplica)">
                            <span class="icon is-small is-left">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                        </div>
                    </div>    
                </div>
            </div>


            <div class="columns">
                <div class="column ">
                    <div class="field has-text-centered">
                        <label class="title is-size-4">Tipos de Menu</label>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column is-4">
                    <div class="field">
                        <label class="label" for="tradicional">Tradicional</label>
                        <div class="control">
                            <label class="radio">
                                <input id="tradicional" name="tradicional" v-model="datosFrm.tradicional" type="radio" value="si">
                              Si
                            </label>
                            <label class="radio">
                                <input type="radio" name="tradicional" v-model="datosFrm.tradicional" checked="" value="no">
                              No
                            </label>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label" for="vegetariano">Vegetariano</label>
                        <div class="control">
                            <label class="radio">
                                <input id="vegetariano" name="vegetariano" v-model="datosFrm.vegetariano" type="radio" value="si">
                              Si
                            </label>
                            <label class="radio">
                                <input type="radio" name="vegetariano" v-model="datosFrm.vegetariano" checked="" value="no">
                              No
                            </label>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label" for="vegano">Vegano</label>
                        <div class="control">
                            <label class="radio">
                                <input id="vegano" name="vegano" v-model="datosFrm.vegano" type="radio" value="si">
                              Si
                            </label>
                            <label class="radio">
                                <input type="radio" name="vegano" v-model="datosFrm.vegano" checked="" value="no">
                              No
                            </label>
                        </div>
                    </div>
                </div>
            </div>


            <div class="field is-grouped">
              <div class="control ">
                  <button type="submit" class="button is-primary">Crear</button>
              </div>
              <div class="control">
                  <a v-bind:href="this.routecancelar" class="button is-text">Cancelar</a>
              </div>
            </div>
        </form>
    </div>
</template>

<script>
    import axios from "axios";
    
    export default {
        props: {
            routecancelar:{
                type:String,
                required:true
            }
        },

        data(){
            return{
                sectores:{},
                sectorSeleccionado:'',
                flagSectorSeleccionado:false,
                flagDisableDireccion:false,
                datosFrm:{
                    nombre      :'',
                    nit         :'',
                    telefono    :'',
                    celular     :'',
                    ciudad      :'',
                    sector      :{},
                    local       :'',
                    direccion   :'',
                    tradicional :'',
                    vegetariano :'',
                    vegano      :'',     
                }
            }
        },

        mounted() {
            console.log('Component mounted.')
        },

        components: {
        },

        created(){
            this.CargarSectores()
        },

        methods:{
            SectorSeleccionado(){
                this.datosFrm.direccion ="";
                this.flagSectorSeleccionado=false;
                this.flagDisableDireccion=false;

                if(this.datosFrm.sector.tipo && this.datosFrm.sector.tipo !== "Zona o Sector"){
                    this.datosFrm.direccion = this.datosFrm.sector.direccion;
                    this.flagDisableDireccion =true;
                }
                this.flagSectorSeleccionado=true;
            },
            
            CargarSectores(){
                axios.get(`sectores-por-ciudad/${this.datosFrm.ciudad}`)
                .then(response => {
                    this.sectores = response.data;
                })
            },

            CrearRestaurante(){
                axios.post('gestion-restaurantes',{
                    nombre      :this.datosFrm.nombre,
                    nit         :this.datosFrm.nit,
                    telefono    :this.datosFrm.telefono,
                    celular     :this.datosFrm.celular,
                    ciudad      :this.datosFrm.ciudad,
                    sector      :(this.datosFrm.sector.id)?this.datosFrm.sector.id:0,
                    local       :this.datosFrm.local,
                    direccion   :this.datosFrm.direccion,
                    tradicional :this.datosFrm.tradicional,
                    vegetariano :this.datosFrm.tradicional,
                    vegano      :this.datosFrm.tradicional,     
                })
                .then(response => {
                    window.location.href = '/restauriando/public/administrador/gestion-restaurantes/'+response.data;
                })    
                .catch(error => {
                    console.log(error)
                })
            }
            
        },
        
    }
</script>
