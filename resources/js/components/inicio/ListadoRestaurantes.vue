<template>
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <p class="title has-text-centered"></p>
                    <p class="title has-text-centered">Restaurantes que hoy ofrecen... "{{ nombrePlato }}"</p>
                </div>
            </div>    
            <div class="columns is-centered">
                <div class="column is-four-fifths">
                    <div class="box">
                        <div class="columns is-vcentered">
                            <div class="column is-three-fifths">
                                <h1 class="title is-4">Nombre del Restaurante 1 </h1>
                                <p class="subtitle is-6">Delicioso "nombre del plato" bañando en salsa de XXX acompañado de papitas chips, con salsa de ajo</p>
                            </div>
                            <div class="column">
                                <div>
                                    <span class="icon has-text-danger is-size-6">
                                        <i class="fas fa-dollar-sign"></i>
                                    </span>
                                    <span class="has-text-danger is-size-5">
                                        <b>8500 COP</b>
                                    </span>
                                </div>
                                <div>
                                    <span class="icon has-text-success  is-size-6">
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span class=" has-text-success  is-size-5">
                                        <b>4.8</b>
                                    </span>    
                                </div>
                            </div>            

                            <div class="column">
                                <div class="has-text-centered">
                                    <a class="button is-info">Como Llegar</a>
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
    import axios from "axios"
    export default {
        props: {
            nombrePlato: {
                type: String,
                required: true
            }
        }
    }
</script>
