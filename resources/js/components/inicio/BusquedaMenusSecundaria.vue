<template>
    <div class="container">
        <div class="columns is-centered">
            <div class="column has-text-centered">
                <p class="title is-size-6">Puedes hacer la busqueda por tipo de Menu</p>
                <router-link class="button is-primary is-small" :to="{name:'menu', params:{tipoMenu:'tradicional'}}">Tradicional</router-link>
                <router-link class="button is-link is-small" :to="{name:'menu', params:{tipoMenu:'vegetariano'}}">Vegetariano</router-link>
                <router-link class="button is-success is-small" :to="{name:'menu', params:{tipoMenu:'vegano'}}">Vegano</router-link>
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
