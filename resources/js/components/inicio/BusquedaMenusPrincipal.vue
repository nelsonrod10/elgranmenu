<template>
    <div class="container">
        <div class="columns is-centered">
            <div class="column">
                <label class="label has-text-centered">¿No sabes que quieres?... Encuentra tu menu</label>
            </div>
        </div>    
        <div class="columns is-centered">
            <div class="column">
                <div class="columns">
                    <div class="column">
                        <div class="notification is-primary">
                            <h1 class="title is-4 has-text-centered">Menu Tradicional</h1>
                            <p class="has-text-justified">Tu comida acompañada de carnes blancas o rojas en el restaurante de tu preferencia</p>
                            <div class="has-text-centered">
                                <router-link class="button is-dark" :to="{name:'menu', params:{tipoMenu:'tradicional'}}">Seleccionar</router-link>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="notification is-info">
                            <h1 class="title is-4 has-text-centered">Menu Vegetariano</h1>
                            <p class="has-text-justified">Las mejores opciones vegetarianas las puedes encontrar en esta sección</p>
                            <div class="has-text-centered">
                                <router-link class="button is-dark" :to="{name:'menu', params:{tipoMenu:'vegetariano'}}">Seleccionar</router-link>
                            </div>

                        </div>
                    </div>
                    <div class="column">
                        <div class="notification is-success">
                            <h1 class="title is-4 has-text-centered">Menu Vegano</h1>
                            <p class="has-text-justified">Encuentre en esta sección los restaurantes con los mejores platos veganos.</p>
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
