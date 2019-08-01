<template>
    <div>
    <a class="has-text-dark" v-on:click="MostrarSector">
        <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
        <span v-if="sector.tipo !== 'Zona o Sector'">{{sector.tipo}}</span> {{sector.nombre}}
        <span v-if="restaurante.local !== null || restaurante.local !== ''">Local {{restaurante.local}}</span>
    </a>    
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
            MostrarSector(){
                this.$emit("mostrar-sector",this.sector.id);
            }
        },
        props:{
            sector:{
                required:true,
            },
            restaurante:{
                required:true,
            }
        }
    }
</script>
