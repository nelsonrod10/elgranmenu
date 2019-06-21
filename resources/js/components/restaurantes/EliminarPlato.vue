<template>
    <div id="eliminar-plato" class="modal is-active">
        <div class="modal-background"></div>
        <div class="modal-card">
          <header class="modal-card-head">
            <p class="modal-card-title">Eliminar Plato del Menu</p>
            <button class="delete" aria-label="close" v-on:click="CancelarEliminar"></button>
          </header>
          <section class="modal-card-body">
            ¿Está seguro de eliminar el plato {{ plato.nombre }}?
          </section>
          <footer class="modal-card-foot">
              <form method="post" v-on:submit.prevent="Eliminar"> <!-- {{ route('gestion-carta.destroy', $restaurante) }} -->
                  <button class="button is-danger">Eliminar</button>
                  <a class="button" v-on:click="CancelarEliminar">Cancel</a>
              </form>
          </footer>
        </div>
    </div>
</template>

<script>
    import axios from "axios";
    
    export default {
        props: {
            plato: {
                required: true
                // default: 'Lucas'
            }
        },
        data(){
            return{
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
            Eliminar(){
                axios.delete(`plato/${this.plato["id"]}`)
                .then(response => {
                    this.$emit('cancelar-crud-plato');
                })    
                .catch(error => {
                    console.log(error)
                })
            },

            CancelarEliminar(){
                this.$emit('cancelar-crud-plato');
            }
        },
        
    }
</script>
