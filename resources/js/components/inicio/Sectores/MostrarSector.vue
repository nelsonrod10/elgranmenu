<template>
    <div>
        <div>
            <h4>{{listado.sector.nombre}}</h4>
        </div>    
        
        <ul v-for="item in listado.restaurantes">
            <li>{{item.nombre}}</li>
        </ul>
    </div>
</template>

<script>
    import axios from "axios"

    export default {
        mounted() {
        },
        components: {
        },
        created(){
            this.GetListado()
        },  
        data(){
            return{
                listado:{}
            }
        },
        methods:{
            GetListado(){
                axios.get('ver-sectores/'+this.sectorId)
                .then(response => {
                    this.listado = response.data;
                })    
                .catch(error => {
                    console.log(error)
                })
            }
        },
        props:{
            sectorId:{
                required:true,
            },
        }
    }
</script>
