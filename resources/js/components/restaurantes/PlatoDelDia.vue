<template>
    <div class="column">
        <div class="box">
            <div class="columns">
                <div class="column">
                    <p class="title is-size-4 has-text-centered">Plato del Día</p>
                </div>
            </div>    
            <form method="post" v-on:submit.prevent="Seleccionar">
                <div class="columns">
                    <div class="column has-text-centered">
                        <div class="field">
                            <label class="label">
                                ¿En qué fecha deseas agregar {{ plato.nombre }} como plato del día?
                            </label>
                        </div>
                    </div>
                </div>    
                <date-picker></date-picker>
                <div class="columns">
                    <div class="column"></div>
                    <div class="column">
                        <div class="field">
                            <button class="button is-success">Seleccionar</button>
                            <a class="button" v-on:click="CancelarSeleccion">Cancel</a>
                        </div>
                    </div>
                    <div class="column"></div>
                </div>    
            </form>
            
        </div>
        <button class="modal-close" aria-label="close" v-on:click="CancelarSeleccion"></button>
    </div>
</template>

<script>
    import axios from "axios";
    import DatePicker from '@/js/components/DatePicker.vue';

    export default {
        props: {
            plato: {
                required: true
                // default: 'Lucas'
            }
        },
        data(){
            return{
                datosFrm:{
                    idPlato: this.plato['id'],
                    fechas : ''    
                },
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        components: {
            datePicker : DatePicker
        },
        created(){
        },

        methods:{
            Seleccionar(){
                axios.post('plato-del-dia',{
                    idPlato     : this.datosFrm.idPlato,
                    fechas      : this.datosFrm.fechas,
                })
                .then(response => {
                    this.$emit('cancelar-crud-plato');
                })    
                .catch(error => {
                    console.log(error)
                })
            },

            CancelarSeleccion(){
                this.$emit('cancelar-crud-plato');
            }
        },
        
    }
</script>
