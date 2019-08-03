<template>
    <ul>
        <li v-for="item in listado">
            <div class="columns is-vcentered">
                <div class="column is-8">
                    <div v-if="item.plato"><b>{{item.plato.nombre}}</b></div>
                    <div class="is-size-7">{{item.plato.descripcion}}. <b>$ {{item.plato.precio}}</b></div>    
                    <div class="has-text-danger is-capitalized is-italic help">Plato {{item.plato.tipo_plato}}</div>
                    <a class="button is-success is-small" v-on:click="VerPlato(item.restaurante,item.plato)">Ver más</a>
                </div>
            </div>
        </li>
        <infinite-loading @infinite="InfiniteHandler">
            <div slot="no-more">No hay mas resulados</div>
            <div slot="no-results">Lo sentimos, no tenemos resultados.</div>
        </infinite-loading>
    </ul>
</template>

<script>
    import axios from "axios"

    export default {
        props:{
            tipoMenu:{
                type : String
            }
        },
        
        created(){
        },
        data(){
            return{
                page: 0,
                listado:[],
            }
        },
        methods:{
            
            InfiniteHandler($state) {
                this.page += 1;
                axios.get('../ver-menu-general/'+this.tipoMenu, {
                  params: {
                    page: this.page,
                  },
                }).then(response => {
                    if (response.data.data.length) {
                        this.listado=this.listado.concat(response.data.data);
                        $state.loaded();
                    } else {
                        $state.complete();
                    }
                })    
                .catch(error => {
                    console.log(error)
                })
            },
        },
    }
</script>
