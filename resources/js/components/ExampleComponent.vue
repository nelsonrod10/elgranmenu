<template>
<div>    
    <pre>{{ $data | json }}</pre>
    <input list="nombres-platos" class="input" type="text" placeholder="Text input" v-on:keyup="levanto" v-model="variable">
    <datalist id="nombres-platos">
        <option value="Bandeja Paisa"></option>
        <option value="Camarones"></option>
    </datalist>
</div>
</template>

<script>
    import axios from "axios"
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                variable: 'hola',
                variable2: 'hola ejej',
            }
            
        },
        methods:{
            levanto(){
                return;
            }
        },
        
    }
</script>
