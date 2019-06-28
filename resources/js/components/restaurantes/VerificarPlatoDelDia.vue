<template>
    <div>
        <div v-if="flagSeleccionado" class="notification is-primary has-text-centered">
            <div>
                Felicitaciones!!, Este plato hace parte del menu del día
            </div>
            <br/>
            <div>
                <a class='button is-default is-small' v-on:click="$emit('eliminar-plato-del-dia')">
                    <span class='icon is-small'>
                        <i class='fas fa-trash'></i>
                    </span>
                    <span>Eliminar plato del día</span>
                </a>
            </div>
            
        </div>
        <div v-else class="notification is-link has-text-centered">
            <div>
                ¿Desea que este plato haga parte del menu del día?
            </div>
            <br/>
            <div>
                <a class="button is-default is-small"  v-on:click="$emit('seleccionar-plato-del-dia')">
                    <span class="icon is-small">
                        <i class="fas fa-check"></i>
                    </span>
                    <span>Seleccionar</span>
                </a>
            </div>
        </div>
    </div>
        
</template>

<script>
    import axios from "axios";

    export default {
        props: {
            verificarPlato: {
                required: true
            }
        },
        data(){
            return{
                flagSeleccionado:false
            }
        },
        mounted() {
            
        },
        components: {
        },
        created(){
            this.VerificarPlatoDelDia(this.verificarPlato)
        },

        methods:{
            VerificarPlatoDelDia(plato){
                axios.get('seleccion-del-dia/'+plato['id'])
                .then(response => {
                    if(response.data === 202){
                        this.flagSeleccionado = true;
                    }
                })    
                .catch(error => {
                   console.log(error) 
                })
            }
        },
        
    }
</script>
