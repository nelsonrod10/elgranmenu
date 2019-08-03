<template>
    <div>
        <p>Component 2 => {{ param2 }}</p>
        <router-link :to="{name:'component1-example'}">Component1</router-link>
    </div>
</template>

<script>
    import axios from "axios";
    
    export default {
        props: {
            param2:{
                required:true
            }
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

