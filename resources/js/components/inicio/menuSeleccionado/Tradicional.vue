<template>
    <section class="section">
        <p>Cuando se seleccione un plato debe llevarlos al componente DetallesRestaurante, hace falta traer del controlador los datos del restaurante</p>
        <div class="container">
            <div class="columns is-centered">
                <div class="column has-text-centered">
                    <a class="button is-link" v-on:click="$emit('ver-otro-menu','Vegetariano')">Menu Vegetariano</a>
                    <a class="button is-success" v-on:click="$emit('ver-otro-menu','Vegano')">Menu Vegano</a>
                </div>
            </div>
            <div class="columns is-centered">
                <div class="column is-title is-size-4  has-text-centered">
                    Menus Tradicionales.
                </div>
            </div>
            <div class="columns is-centered">
                <div class="column is-8">
                    <ul>
                        <li v-for="platoDia in listado.delDia">
                            <div class="columns is-vcentered">
                                <div class="column is-8">
                                    <div><b>{{platoDia.nombre}}</b></div>
                                    <div class="is-size-7">{{platoDia.descripcion}}. <b>$ {{platoDia.precio}}</b></div>    
                                    <div class="has-text-danger is-capitalized is-italic help">Plato {{platoDia.tipo_plato}}</div>
                                </div>
                                <div class="column">
                                    <a class="button is-success is-small" v-on:click="$emit('ver-otro-plato',restaurante,platoDia)">Ver más</a>
                                </div>    
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="columns is-centered">
                <div class="column is-8">
                    <ul>
                        <li v-for="platoCarta in listado.carta">
                            <div class="columns is-vcentered">
                                <div class="column is-8">
                                    <div><b>{{platoCarta.nombre}}</b></div>
                                    <div class="is-size-7">{{platoCarta.descripcion}}. <b>$ {{platoCarta.precio}}</b></div>    
                                    <div class="has-text-danger is-capitalized is-italic help">Plato {{platoCarta.tipo_plato}}</div>
                                </div>
                                <div class="column">
                                    <a class="button is-success is-small" v-on:click="$emit('ver-otro-plato',restaurante,platoCarta)">Ver más</a>
                                </div>    
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>    
    </section>
</template>

<script>
    import axios from "axios"

    export default {
        mounted() {
        },
        components: {
        },
        created(){
            this.VerMenu();
        },
        data(){
            return{
                listado:{},
            }
        },
        methods:{
            VerMenu(){
                axios.get('ver-menu-general/tradicional')
                .then(response => {
                    this.listado = response.data;
                })    
                .catch(error => {
                    console.log(error)
                })
            },
        },
        props:{
        }
    }
</script>
