<template>
    <div>
        <a v-for="ingrediente in plato" v-on:click="EditarIngrediente(ingrediente)">{{ingrediente.nombre}} | </a> 
        <editar-ingrediente
            v-if="flagEditarIngrediente" 
            :ingrediente="datosIngrediente"
            v-on:cancelar-edicion-ingrediente="CancelarEdicion"
            
        ></editar-ingrediente>    
    </div>
</template>

<script>
    
    import axios from "axios";
    import EditarIngrediente from './EditarIngrediente.vue';

    export default {
        props: {
            platoIngredientes: {
                required: true
                // default: 'Lucas'
            },
        },
        data(){
            return{
                flagEditarIngrediente:false,
                plato : {},
                datosIngrediente: {}

            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        components: {
            editarIngrediente : EditarIngrediente
        },

        created(){
            this.GetListadoIngredientes();
        },
          
        methods:{
            
            GetListadoIngredientes(){
                axios.get(`listado-ingredientes/${this.platoIngredientes["id"]}`)
                .then(response => {
                    this.plato = response.data;
                })    
                .catch(error => {
                    console.log(error)
                })
            },

            EditarIngrediente(ingrediente){
                this.datosIngrediente = ingrediente;
                this.flagEditarIngrediente = true
            },

            CancelarEdicion(){
                this.flagEditarIngrediente = false;
                this.$emit('cancelar-crud-plato');
            }
        },
        
    }
</script>
