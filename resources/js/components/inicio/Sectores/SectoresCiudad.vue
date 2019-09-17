<template>
    <div class="columns is-centered">
        <div class="column is-four-fifths">
            <div class="columns is-centered has-text-centered is-title is-size-3">
                <div class="column">
                    <span>Sectores en {{ciudad}}  </span>
                </div>
            </div>
            <div class="columns is-centered has-text-centered title is-size-5">
                <div class="column">
                    <!--{{listado.sector.direccion}} | {{listado.sector.ciudad}}-->
                </div>
            </div>
            <div v-for="item in listadoEstablecimientos" class="columns is-centered">
                <div class="column">
                    <div class="box">
                        <div class="columns is-vcentered">
                            <div class="column is-7">
                                <p class="is-capitalized is-size-4">
                                    <span v-if="item.tipo !== 'Zona o Sector'">{{item.tipo}}</span> {{item.nombre}}
                                </p>
                                <p v-if="item.tipo !== 'Zona o Sector'" class="is-size-6 has-text-grey">
                                    <a class="has-text-grey"><span class="icon"><i class="fas fa-map-marker-alt"></i></span>{{ item.direccion }}</a>
                                </p>
                                <p v-if="item.tipo == 'Zona o Sector'" class="is-size-6 has-text-grey">
                                    <a class="has-text-grey"><span class="icon"><i class="fas fa-map-marker-alt"></i></span>Desde {{ item.limite_1 }} Hasta {{ item.limite_1 }} Entre {{ item.limite_3 }} y {{ item.limite_4 }}</a>
                                </p>
                            </div>
                            <div class="column has-text-centered">
                                <router-link class="button is-danger is-small is-size-6" :to="{name:'sector', params:{sectorId:item.id}}">
                                    <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                                    <span>Lista de Restaurantes</span>
                                </router-link>        
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>    
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        mounted() {
        },
        components: {
        },
        created(){
            this.GetListadoPorCiudad()
        },  
        data(){
            return{
                ciudad:'',
                listadoEstablecimientos : {}
            }
        },
        methods:{
            GetListadoPorCiudad(){
                this.ciudad = this.$route.params.ciudad

                axios.get('index-sectores/'+this.ciudad)
                .then(response => {
                    this.listadoEstablecimientos = response.data;
                })    
                .catch(error => {
                    console.log(error)
                })
            }
            
        },
        watch: {
            '$route' (to, from) {
              this.GetListadoPorCiudad();
              
            }
        }
    }
</script>

