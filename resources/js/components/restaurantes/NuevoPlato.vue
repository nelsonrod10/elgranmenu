<template>
    <div class="column">
        <div class="box">
            <form name="frm-crear-plato" method="post" v-on:submit.prevent="CrearNuevoPlato">
                
            <div class="columns">
                <div class="column">
                    <p class="title is-size-4 has-text-centered">{{ restaurante['nombre'] }}</p>
                    <p class="title is-size-4 has-text-centered">Agregar Nuevo Plato</p>
                </div>
            </div>
            <div class="columns">
                <div class="column is-6">
                    <div class="field">
                        <label class="label" for="nombre">Nombre del Plato</label>
                        <div class="control has-icons-left">
                            <input id="nombre" name="nombre" v-model="datosFrm.nombre" class="input" required type="text" placeholder="Nombre del plato">
                            <span class="icon is-small is-left">
                                <i class="fas fa-font"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label" for="tipMenu">Tipo Menu</label>
                        <div class="control is-expanded">
                            <div class="select is-fullwidth">
                                <select id="tipoMenu" name="tipoMenu" v-model="datosFrm.tipoMenu" required>
                                  <option value="corriente">Corriente</option>
                                  <option value="especial">Especial</option>
                                </select>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
            <div class="columns">
                <div class="column is-6">
                    <div class="field">
                        <label for="precio" class="label">Precio</label>
                        <div class="control has-icons-left">
                            <input id="precio" name="precio" v-model="datosFrm.precio" class="input" type="number" placeholder="Precio del plato">
                            <span class="icon is-left">
                              <i class="fas fa-dollar-sign"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label" for="tipoPlato">Tipo Plato</label>
                        <div class="control is-expanded">
                            <div class="select is-fullwidth">
                                <select id="tipoPlato" name="tipoPlato" v-model="datosFrm.tipoPlato" required>
                                  <option value="tradicional" v-if="restaurante['tradicional'] === 'si'">Tradicional</option>
                                  <option value="vegetariano" v-if="restaurante['vegetariano'] === 'si'">Vegetariano</option>
                                  <option value="vegano" v-if="restaurante['vegano'] === 'si'">Vegano</option>
                                </select>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label class="label" for="disponibilidad">¿Este plato estará disponible siempre para los clientes?</label>
                        <div class="control">
                            <label class="radio">
                              <input id="disponibilidad" value="Si" type="radio" name="disponibilidad" v-model="datosFrm.disponibilidad">
                              Si
                            </label>
                            <label class="radio">
                              <input type="radio" value="No" name="disponibilidad" v-model="datosFrm.disponibilidad">
                              No
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label class="label" for="descripcion">Descripción</label>
                        <div class="control">
                          <textarea id="descripcion" name="descripcion" v-model="datosFrm.descripcion" required class="textarea" placeholder="Haga una descripción atractiva de este plato"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field is-grouped">
              <div class="control ">
                  <button type="submit" class="button is-primary">Crear</button>
              </div>
              <div class="control">
                  <button type="button" class="button is-text" v-on:click="$emit('cancelar-nuevo-plato')">Cancelar</button>
              </div>
            </div>
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
        components: {
        },
        created(){
        },
        data(){
            return{
                datosFrm:{
                    idRestaurante: this.restaurante['id'],
                    nombre          : '',
                    tipoMenu        : '',
                    precio          : '',
                    tipoPlato       : '',
                    disponibilidad  : '',
                    descripcion     : ''    
                        
                },
            }
        },
        methods:{
            CrearNuevoPlato(){
                axios.post('plato',{
                    restaurante     : this.datosFrm.idRestaurante,
                    nombre          : this.datosFrm.nombre,
                    tipoMenu        : this.datosFrm.tipoMenu,
                    precio          : this.datosFrm.precio,
                    tipoPlato       : this.datosFrm.tipoPlato,
                    descripcion     : this.datosFrm.descripcion,
                    disponibilidad  : this.datosFrm.disponibilidad
                })
                .then(response => {
                    this.$emit('cancelar-nuevo-plato');
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
            
        },
    }
</script>
