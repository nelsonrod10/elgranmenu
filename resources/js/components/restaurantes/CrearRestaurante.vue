<template>
    <div>
        <form name="frm-crear-restaurante" method="post" action=""> <!--{{route('gestion-restaurantes.store')}}-->
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
                            <input id="nombre" name="nombre" required class="input" type="text" placeholder="Nombre del establecimiento">
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
                            <input id="nit" name="nit" required class="input" type="number" placeholder="NIT">
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
                            <input id="telefono" name="telefono" class="input" type="number" placeholder="Número Telefónico">
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
                            <input id="celular" name="celular" class="input" type="number" placeholder="Número Celular">
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
                            <input id="ciudad" name="ciudad" required class="input" type="text" placeholder="Ciudad">
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
                                <select id="sector" name="sector" required v-on:change="SectorSeleccionado()" v-model="sectorSeleccionado">
                                    <option value="">Seleccione una opción...</option>
                                    <option value="0">Ninguno</option>
                                    <option v-for="sector in sectores" v-bind:value="sector.id">{{sector.nombre}}</option>
                                </select>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>    

            <div class="columns is-hidden">
                <div class="column is-6">
                    <div class="field">
                        <label class="label" for="direccion">Dirección</label>
                        <div class="control has-icons-left">
                            <input id="direccion" name="direccion" required class="input" type="text" placeholder="Dirección del restaurante">
                            <span class="icon is-small is-left">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label" for="local">¿Corresponde a un local en (Nombre del sector)?</label>
                        <div class="control has-icons-left">
                            <input id="local" name="local" class="input" type="text" placeholder="No Local (si aplica)">
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
                                <input id="tradicional" name="tradicional" type="radio" value="si">
                              Si
                            </label>
                            <label class="radio">
                                <input type="radio" name="tradicional" checked="" value="no">
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
                                <input id="vegetariano" name="vegetariano" type="radio" value="si">
                              Si
                            </label>
                            <label class="radio">
                                <input type="radio" name="vegetariano" checked="" value="no">
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
                                <input id="vegano" name="vegano" type="radio" value="si">
                              Si
                            </label>
                            <label class="radio">
                                <input type="radio" name="vegano" checked="" value="no">
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
            sectores: {
                required: true
            },
            routecancelar:{
                type:String,
                required:true
            }
        },

        data(){
            return{
                sectorSeleccionado:'',
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
            SectorSeleccionado(){
                alert(this.sectorSeleccionado);
            }   
        },
        
    }
</script>
