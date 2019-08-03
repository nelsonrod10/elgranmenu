<template>
    <div>
        Component 1 => {{ param1 }}
    </div>
</template>

<script>
    import axios from "axios";
    
    export default {
        props: {
            param1:{
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

