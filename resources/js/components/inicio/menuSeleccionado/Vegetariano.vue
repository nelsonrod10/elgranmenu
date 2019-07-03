<template>
    <section class="section">
        <div class="container">
            <div class="columns is-centered">
                <div class="column has-text-centered">
                    <a class="button is-primary" v-on:click="$emit('ver-otro-menu','Tradicional')">Menu Tradicional</a>
                    <a class="button is-success" v-on:click="$emit('ver-otro-menu','Vegano')">Menu Vegano</a>
                </div>
            </div>
            <div class="columns is-centered">
                <div class="column is-title is-size-4  has-text-centered">
                    Componente Vegetariano.
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
        },
        data(){
            return{
            }
        },
        methods:{
            VerMenu(){
                axios.get('ver-menu-restaurante/')
                .then(response => {
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
