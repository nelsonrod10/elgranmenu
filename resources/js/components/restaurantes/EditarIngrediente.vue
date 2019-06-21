<template>
    <div id="actualizar-ingrediente" class="modal is-active">
        <div class="modal-background"></div>
        <div class="modal-card">
            
                <header class="modal-card-head">
                  <p class="modal-card-title">Editar Ingrediente {{ingrediente.nombre}}</p>
                  <button class="delete" aria-label="close" v-on:click="CancelarEdicion"></button>
                </header>
                <section class="modal-card-body">
                    <form method="post" v-on:submit.prevent="ActualizarIngrediente">
                        <div class="columns is-centered">
                            <div class="column is-10">
                                <div class="field">
                                    <label class="label" for="ingrediente">Escriba el nombre del ingrediente:</label>
                                    <div class="control has-icons-left">
                                        <input id="ingredientes" list="lista-ingredientes"  class="input" required type="text" v-on:keyup="BuscarIngrediente" v-model="ingrediente.nombre" placeholder="Nombre del ingrediente">
                                        <datalist id="lista-ingredientes">
                                            <option v-for="ingrediente in ingredientes" :value="ingrediente.nombre"></option>
                                        </datalist>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="columns is-centered">
                            <div class="column is-10">
                                <div class="field">
                                    <button class="button is-info">Actualizar</button>
                                    <a class="button" v-on:click="CancelarEdicion">Cancelar</a>    
                                </div>
                            </div>    
                        </div>
                    </form>      
                    <div class="columns is-centered">
                        <div class="column is-10">
                            <div class="field">
                                <label class="label">Si desea eliminar este ingrediente: </label>
                                <a class="button is-danger" v-on:click="EliminarIngrediente">Eliminar</a>    
                                <a class="button" v-on:click="CancelarEdicion">Cancelar</a>
                            </div>
                        </div>    
                    </div>
                    <br/><br/>    
                </section>
                <footer class="modal-card-foot">
                    

                </footer>
            
        </div>
    </div>
</template>

<script>
    import axios from "axios";
    
    export default {
        props: {
            ingrediente: {
                required: true
            }
        },
        data(){
            return{
                ingredientes:{}
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
            BuscarIngrediente(){
                axios.get('buscar-ingrediente/'+this.ingrediente['nombre'])
                .then(response => {
                    this.ingredientes = response.data;
                    
                })    
                .catch(error => {
                    console.log(error)
                })
            },

            ActualizarIngrediente(){
                axios.put(`ingrediente/${this.ingrediente["id"]}`,{
                    nombre : this.ingrediente.nombre
                })
                .then(response => {
                    this.$emit('cancelar-edicion-ingrediente');
                })    
                .catch(error => {
                    console.log(error)
                })
            },

            EliminarIngrediente(){
                axios.delete(`ingrediente/${this.ingrediente["id"]}`)
                .then(response => {
                    this.$emit('cancelar-edicion-ingrediente');
                })    
                .catch(error => {
                    console.log(error)
                })
            },

            CancelarEdicion(){
                this.$emit('cancelar-edicion-ingrediente');
            }
        },
        
    }
</script>
