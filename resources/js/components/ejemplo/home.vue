<template>
    <div>
        <router-link to="home">Home</router-link>
        <router-link :to="{name:'component1-example'}">Component1</router-link>
        <router-link :to="{name:'component2-example'}">Component2</router-link>
        
        <router-view :param1="'Este es 1'" :param2="'este es 2'">
        </router-view>
    </div>
</template>

<script>
    import axios from "axios";
    
    export default {
        props: {
        },

        data(){
            return{
            }
        },

        mounted() {
        },

        components: {
        },

        created(){
            
        },

        methods:{
            
        },
        
    }
</script>

<style>

</style>

