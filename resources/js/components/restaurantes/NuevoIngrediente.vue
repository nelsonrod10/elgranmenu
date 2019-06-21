<template>
    <div id="agregar-ingrediente" class="modal is-active">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
              <p class="modal-card-title">Agregar Ingrediente</p>
              <button class="delete" aria-label="close" v-on:click="$emit('cancelar-crud-plato')"></button>
            </header>
            <form name="frm-crear-ingrediente" method="post" v-on:submit.prevent="CrearIngrediente">
            <section class="modal-card-body">
                <div class="columns">
                    <div class="column">
                        <p class="title is-size-4 has-text-centered">{{ platoCarta['nombre'] }}</p>
                    </div>
                </div>
                <div class="columns is-centered">
                    <div class="column is-10">
                        <div class="field">
                            <label class="label" for="ingrediente">Escriba el nombre del ingrediente</label>
                            <div class="control has-icons-left">
                                <input id="ingredientes" list="lista-ingredientes"  class="input" required type="text" v-on:keyup="BuscarIngrediente" v-model="datosFrm.nombre" placeholder="Nombre del ingrediente">
                                <datalist id="lista-ingredientes">
                                    <option v-for="ingrediente in ingredientes" :value="ingrediente.nombre"></option>
                                </datalist>
                            </div>
                        </div>
                    </div>
                </div>
                <br/><br/>
            </section>

            <footer class="modal-card-foot">
              <div class="field is-grouped">
                  <div class="control ">
                      <button type="submit" class="button is-primary">Crear</button>
                  </div>
                  <div class="control">
                      <button type="button" class="button is-text" v-on:click="$emit('cancelar-crud-plato')">Cancelar</button>
                  </div>
              </div>
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
        components: {
        },
        created(){
        },
        data(){
            return{
                datosFrm:{
                    idPlato     : this.platoCarta['id'],
                    nombre      : '',
                },
                buscarIngrediente:'',
                ingredientes:{}
            }
        },
        methods:{
            BuscarIngrediente(){
                this.buscarIngrediente = this.datosFrm.nombre;
                axios.get('buscar-ingrediente/'+this.buscarIngrediente)
                .then(response => {
                    this.ingredientes = response.data;
                    
                })    
                .catch(error => {
                    console.log(error)
                })
            },

            CrearIngrediente(){
                axios.post('ingrediente',{
                    idPlato : this.datosFrm.idPlato,
                    nombre  : this.datosFrm.nombre,
                })
                .then(response => {
                    this.$emit('cancelar-crud-plato');
                })    
                .catch(error => {
                    console.log(error)
                })
            }
        },
        props: {
            platoCarta: {
                type: Object,
                required: true
            },
            
        },
    }
</script>
