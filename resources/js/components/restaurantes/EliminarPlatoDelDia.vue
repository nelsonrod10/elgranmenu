<template>
    <div id="eliminar-plato-del-dia" class="modal is-active">
        <div class="modal-background"></div>
        <div class="modal-card">
          <header class="modal-card-head">
            <p class="modal-card-title">Eliminar Plato del Día</p>
            <button class="delete" aria-label="close" v-on:click="CancelarEliminarPlatoDelDia"></button>
          </header>
          <section class="modal-card-body">
            ¿Está seguro de eliminar el plato {{ platoDelDia.nombre }}, como plato del día?
          </section>
          <footer class="modal-card-foot">
              <form method="post" v-on:submit.prevent="EliminarDelDia">
                  <button class="button is-danger">Eliminar</button>
                  <a class="button" v-on:click="CancelarEliminarPlatoDelDia">Cancel</a>
              </form>
          </footer>
        </div>
    </div>
</template>

<script>
    import axios from "axios";
    
    export default {
        props: {
            platoDelDia: {
                required: true
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
            EliminarDelDia(){
                axios.delete(`plato-del-dia/${this.platoDelDia["id"]}`)
                .then(response => {
                    this.$emit('cancelar-crud-plato');
                })    
                .catch(error => {
                    console.log(error)
                })
            },

            CancelarEliminarPlatoDelDia(){
                this.$emit('cancelar-crud-plato');
            }
        },
        
    }
</script>
