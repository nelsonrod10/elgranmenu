<template>
    <section class="section">
        <div class="container">
            <div class="columns is-centered">
                <div class="column">
                    <label class="label has-text-centered">¿No sabes que quieres?... Arma tu menu</label>
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
                                    <a class="button is-dark" href="">Seleccionar</a>
                                </div>

                            </div>
                        </div>
                        <div class="column">
                            <div class="notification is-info">
                                <h1 class="title is-4 has-text-centered">Menu Vegetariano</h1>
                                <p class="has-text-justified">Las mejores opciones vegetarianas las puedes encontrar en esta sección</p>
                                <div class="has-text-centered">
                                    <a class="button is-dark" href="">Seleccionar</a>
                                </div>

                            </div>
                        </div>
                        <div class="column">
                            <div class="notification is-success">
                                <h1 class="title is-4 has-text-centered">Menu Vegano</h1>
                                <p class="has-text-justified">Encuentre en esta sección los restaurantes con los mejores platos veganos.</p>
                                <div class="has-text-centered">
                                    <a class="button is-dark" href="">Seleccionar</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import axios from "axios";
    import ListadoRestaurantes from './ListadoRestaurantes.vue';

    export default {
        mounted() {
            console.log('Component mounted.')
        },
        components: {
            listadoRestaurantes: ListadoRestaurantes
        },
        created(){
        },
        data(){
            return{
                btnBuscar:false,
                platoSeleccionado:false,
                nombresPlatos: [],
                buscarPlato: [],
                platoBuscado:"",
            }
        },
        methods:{
            BuscarPlato(){
                axios.get('buscar-plato-del-dia/'+this.buscarPlato)
                .then(response => {
                    this.nombresPlatos = response.data;
                    this.btnBuscar=true;
                })    
                .catch(error => {
                    console.log(error)
                })
            },
            ListaRestaurantes(){
                this.platoBuscado = this.nombresPlatos[0].nombre;
                this.platoSeleccionado = true;
                axios.get('restaurantes-plato-del-dia/'+this.nombresPlatos[0].id)
                .then(response => {
                    //this.nombresPlatos = response.data;
                })    
                .catch(error => {
                    console.log(error)
                })
                
            }    
        },
        
    }
</script>
