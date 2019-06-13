<template>
    <div class="columns has-text-centered">
        <div class="column">
            Nombre de plato
        </div>
        <div class="column">
            Especial / Corriente
        </div>
        <div class="column">
            Tradicional/Vegetariano/Vegano
        </div>
        <div class="column">
            $ 8500
        </div>
        <div class="column is-3">
            <div class="buttons is-centered ">
                <a class="button is-success is-small" href="">
                    <span class="icon is-small">
                        <i class="fas fa-pen"></i>
                    </span>
                    <span>Editar</span>
                </a>
                <a class="button is-danger is-small" onclick="$('#eliminar-plato').addClass('is-active')">
                    <span class="icon is-small">
                        <i class="fas fa-trash"></i>
                    </span>
                    <span>Eliminar</span>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from "axios";
    
    export default {
        props: {
            plato: {
                type: Object,
                required: true
                // default: 'Lucas'
            },
            
            
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
        },
        
    }
</script>
