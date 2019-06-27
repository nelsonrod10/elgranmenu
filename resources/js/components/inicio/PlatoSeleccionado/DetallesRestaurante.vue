<template>
    <div>
        <span>Aca vamos a mostrar el plato {{ platoSeleccionado.nombre }}, del restaurante {{ restaurante.nombre }}</span>
    </div>
</template>

<script>
    export default {
        mounted() {
        },
        components: {
        },
        created(){
        },
        data(){
            return{
            }
        },
        methods:{
        },
        props:{
            platoSeleccionado:{ 
                Type: Object,
                Required:true    
            },
            restaurante:{ 
                Type: Object,
                Required:true    
            }

        }
    }
</script>
