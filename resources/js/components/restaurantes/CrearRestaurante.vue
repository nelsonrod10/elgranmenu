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
                            <input id="telefono" name="telefono" required v-model="datosFrm.telefono" class="input" type="number" placeholder="Número Telefónico">
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
                            <input id="celular" name="celular" required v-model="datosFrm.celular" class="input" type="number" placeholder="Número Celular">
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
                            <input id="ciudad" name="ciudad" v-model="datosFrm.ciudad" v-on:change="CargarSectores()" v-on:blur="CargarSectores()" required class="input" type="text" placeholder="Ciudad">
                            <span class="icon is-small is-left">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div v-if="flagSectorSeleccionado" class="column" >
                    <div class="field">
                        <label class="label" for="sector">Zona, Sector o Lugar</label>
                        <div class="control has-icons-left">
                            <input id="nombresector" name="nombresector" disabled="true" v-model="nombreSector" class="input" type="text" placeholder="Zona o Sector">
                            <span class="icon is-small is-left">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                        </div>
                        <div class=" has-text-left">
                            <a class="button is-link is-small" v-on:click="CargarSectores()">Cambiar</a>
                        </div>
                    </div>    
                </div>
                <div v-else class="column">
                    <div class="field">
                        <label class="label" for="ciudad">Buscar Sectores en {{datosFrm.ciudad}}</label>
                        <a class="button is-link " v-on:click="CargarSectores()">Buscar Sectores</a>
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
                                <input id="tradicional_si" v-model="datosFrm.tradicional" type="radio" value="si">
                              Si
                            </label>
                            <label class="radio">
                                <input id="tradicional_no" v-model="datosFrm.tradicional" type="radio" value="no">
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
                                <input id="vegetariano_si" v-model="datosFrm.vegetariano" type="radio" value="si">
                              Si
                            </label>
                            <label class="radio">
                                <input id="vegetariano_no" type="radio" v-model="datosFrm.vegetariano" value="no">
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
                                <input id="vegano_si" v-model="datosFrm.vegano" type="radio" value="si">
                              Si
                            </label>
                            <label class="radio">
                                <input id="vegano_no" type="radio" v-model="datosFrm.vegano" value="no" >
                              No
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="faltanDatos" class="notification is-danger">
                Existen algunos datos sin diligenciar.
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
        <div id="modal-sectores" :class="modalSectores">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="box">
                    <div class="columns">
                        <div class="column is-centered">
                            <div class="title is-size-5 has-text-centered">Lugares o Sectores en {{datosFrm.ciudad}}</div>
                        </div>
                    </div>   
                    <div class="columns">
                        <div class="column">
                            <div>
                                <b>Ningún sector</b>
                                <div class="help">
                                    <span >
                                        El restaurante no se encuentra en ninguno de estos sitios
                                    </span>
                                </div>    
                            </div>
                                
                        </div>
                        <div class="column">
                            <a class="button is-small is-danger" v-on:click="SectorSeleccionado(0,'Ninguno',null,null)">Seleccionar</a>
                        </div>
                    </div>
                    <div v-for="sector in sectores" class="columns">
                        <div class="column">
                            <div>
                                <b><span v-if="sector.tipo !== 'Zona o Sector'">{{sector.tipo}} </span>{{sector.nombre}}</b>
                                <div class="help">
                                    <span v-if="sector.tipo === 'Zona o Sector'">
                                        Esta sector va desde {{sector.limite_1}} hasta {{sector.limite_2}}. Entre {{sector.limite_3}} y {{sector.limite_4}}
                                    </span>
                                    <span v-else>
                                        {{sector.direccion}}
                                    </span>
                                </div>    
                            </div>
                                
                        </div>
                        <div class="column">
                            <a class="button is-small is-success"  v-on:click="SectorSeleccionado(sector.id,sector.nombre,sector.direccion,sector.tipo)">Seleccionar</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="modal-close is-large" aria-label="close" v-on:click="CerrarModalSectores()"></button>
        </div>
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
                modalSectores: 'modal',
                sectores:{},
                nombreSector:'',
                flagSectorSeleccionado:false,
                flagDisableDireccion:false,
                faltanDatos:false,
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
            
        },

        methods:{
            SectorSeleccionado(id, nombre,direccion,tipo){
                this.datosFrm.direccion ="";
                this.flagSectorSeleccionado=false;
                this.flagDisableDireccion=false;

                if(tipo !== null && tipo !== "Zona o Sector"){
                    this.datosFrm.direccion = direccion;
                    this.flagDisableDireccion =true;
                }
                this.datosFrm.sector = id;
                this.nombreSector = (tipo !== null && tipo !== 'Zona o Sector' )? tipo +" "+ nombre:nombre;
                this.flagSectorSeleccionado=true;
                this.CerrarModalSectores();
            },
            
            CargarSectores(){
                axios.get(`sectores-por-ciudad/${this.datosFrm.ciudad}`)
                .then(response => {
                    this.sectores = response.data;
                    this.modalSectores = 'modal is-active';
                })
            },
            
            CerrarModalSectores(){
                this.modalSectores = 'modal';
            },
            

            CrearRestaurante(){
                if(this.datosFrm.tradicional === '' || this.datosFrm.vegetariano === '' || this.datosFrm.vegano === ''){
                    this.faltanDatos=true;
                    return;
                }
                
                axios.post('gestion-restaurantes',{
                    nombre      :this.datosFrm.nombre,
                    nit         :this.datosFrm.nit,
                    telefono    :this.datosFrm.telefono,
                    celular     :this.datosFrm.celular,
                    ciudad      :this.datosFrm.ciudad,
                    sector      :this.datosFrm.sector,
                    local       :this.datosFrm.local,
                    direccion   :this.datosFrm.direccion,
                    tradicional :this.datosFrm.tradicional,
                    vegetariano :this.datosFrm.vegetariano,
                    vegano      :this.datosFrm.vegano,     
                })
                .then(response => {
                    window.location.href = '/gestion-restaurantes/'+response.data;
                })    
                .catch(error => {
                    console.log(error)
                })
            }
            
        },
        
    }
</script>

<style>
#modal-sectores {
  overflow: visible;
  .modal-card-body {
    overflow: visible;
  }
}
</style>
