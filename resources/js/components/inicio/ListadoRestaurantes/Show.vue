<template>
    <div>
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-four-fifths">
                    <div class="box">
                        <div class="columns">
                            <div class="column">
                                <p class="title has-text-centered"></p>
                                <p class="is-title is-size-4  has-text-centered">Restaurantes que hoy ofrecen "{{ platoBuscado }}"</p>
                            </div>
                        </div>    
                        <div class="columns is-centered">
                            <listado-restaurantes
                                :platoBuscado = "platoBuscado"
                                :key="keyActualizar"
                            />
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from "axios";
    import ListadoRestaurantes from '@/js/components/inicio/ListadoRestaurantes/Listado.vue';

    export default {
        props: {
            platoBuscado:{
                type : String
            }
        },
        watch: {
            '$route' (to, from) {
              this.GetplatoBuscado();
            }
        },
        data(){
            return{
                keyActualizar:0,
                detallesRestaurante:{},
                detallesPlato:{},   
                visitarRestaurante:{}    
            }
        },
        mounted(){
            
        },
        created(){
            this.GetplatoBuscado();
        },
        components: {
            listadoRestaurantes   : ListadoRestaurantes
        },
        
        methods:{
            GetplatoBuscado(){
                this.keyActualizar +=1;
            },
        }
        
    }
</script>
