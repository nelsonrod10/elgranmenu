<template>
    <div >
        <a class="has-text-dark has-text-centered">
            <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
            <span class="has-text-centered" v-if="sector.tipo !== 'Zona o Sector'">{{sector.tipo}}</span> {{sector.nombre}}
            <span class="has-text-centered" v-if="restaurante.local !== null || restaurante.local !== ''">Local {{restaurante.local}}</span>
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
