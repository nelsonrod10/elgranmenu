<template>

    <div class="modal is-active">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
              <p class="modal-card-title">Eliminar Inscrito</p>
              <button class="delete" aria-label="close" v-on:click="CerrarModal()"></button>
            </header>
            <form name="eliminar-inscrito" method="post" v-on:submit.prevent="EliminarInscrito">
                <section class="modal-card-body">
                  ¿Está seguro de eliminar el inscrito {{inscrito.restaurante}}?
                </section>
                <footer class="modal-card-foot">
                    <button type="submit" class="button is-danger">Eliminar</button>
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
            inscrito:{
                required:true
            }
        },
        components: {

        },
        created() {
            
        },

        data(){
            return{
            }
        },
        methods:{
            CerrarModal(){
                this.$emit('cerrar-modal');
            },

            EliminarInscrito(){
                axios.delete(`inscritos/${this.inscrito.id}`)
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
