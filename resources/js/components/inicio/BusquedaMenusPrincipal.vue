<template>
    <div class="container">
        <div class="columns is-centered">
            <div class="column">
                <label class="label has-text-centered">¿No sabes que quieres?... Encuentra tu menú</label>
            </div>
        </div>    
        <div class="columns is-centered">
            <div class="column">
                <div class="columns">
                    <div class="column">
                        <div class="notification is-info">
                            <h1 class="title is-4 has-text-centered">Menú Tradicional</h1>
                            <p class="has-text-justified text-notification">Tu comida acompañada de carnes blancas o rojas en el restaurante de tu preferencia</p>
                            <div class="has-text-centered">
                                <router-link class="button is-dark" :to="{name:'menu', params:{tipoMenu:'tradicional'}}">Seleccionar</router-link>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="notification is-primary">
                            <h1 class="title is-4 has-text-centered">Menú Vegetariano</h1>
                            <p class="has-text-justified text-notification">Las mejores opciones vegetarianas las puedes encontrar en esta sección</p>
                            <div class="has-text-centered">
                                <router-link class="button is-dark" :to="{name:'menu', params:{tipoMenu:'vegetariano'}}">Seleccionar</router-link>
                            </div>

                        </div>
                    </div>
                    <div class="column">
                        <div class="notification is-success">
                            <h1 class="title is-4 has-text-centered">Menú Vegano</h1>
                            <p class="has-text-justified text-notification">Encuentre en esta sección los restaurantes con los mejores platos veganos.</p>
                            <div class="has-text-centered">
                                <router-link class="button is-dark" :to="{name:'menu', params:{tipoMenu:'vegano'}}">Seleccionar</router-link>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    }
</script>

<style>
    .notification{
        min-height:200px;
        height:auto;
    } 
    .text-notification{
        min-height:70px;
        height:auto;
    }
</style>
