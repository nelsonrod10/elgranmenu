<template>
    <div>
        <div class="columns">
            <div class="column"><b>Restaurante</b></div>
            <div class="column"><b>Dirección</b></div>
            <div class="column"><b>Ciudad</b></div>
            <div class="column"><b>Contacto</b></div>
            <div class="column"><b>Comentarios</b></div>
            <div class="column"></div>
        </div>
        <div v-for="inscrito in inscritos" class="columns">
            <div class="column">{{inscrito.restaurante}}</div>
            <div class="column">{{inscrito.direccion}}</div>
            <div class="column">{{inscrito.ciudad}}</div>
            <div class="column">
                <ul>
                    <li>{{inscrito.contacto}}</li>
                    <li>{{inscrito.email}}</li>
                    <li>{{inscrito.telefono}}</li>
                </ul>
            </div>
            <div class="column">{{inscrito.comentarios}}</div>
            <div class="column">
                <a class="button is-danger is-small" v-on:click="EliminarInscrito(inscrito)">Eliminar</a>
            </div>
        </div>
        <eliminar-inscrito
            v-if="flagEliminarInscrito"
            v-on:cerrar-modal="CerrarModal()"
            :inscrito="inscritoSeleccionado" 
        ></eliminar-inscrito>
    </div>                
</template>

<script>
    import axios from "axios";
    import EliminarInscrito from './Eliminar.vue';

    export default {
        mounted() {
            console.log('Component mounted.')
        },

        props:{
        },

        components: {
            eliminarInscrito  : EliminarInscrito,
        },

        created() {
            this.CargarInscritos()
        },

        data(){
            return{
                flagEliminarInscrito:false,
                inscritoSeleccionado:false,
                inscritos:[]
            }
        },
        methods:{
            EliminarInscrito(inscrito){
                this.flagEliminarInscrito=true;
                this.inscritoSeleccionado = inscrito;
            },

            CerrarModal(flagCerrar){
                this.flagEliminarInscrito=false;
                this.CargarInscritos();
            },

            CargarInscritos(){
                axios.get('listado-inscritos')
                .then(response => {
                    this.inscritos = response.data;
                })
            }
        },
    }
</script>
