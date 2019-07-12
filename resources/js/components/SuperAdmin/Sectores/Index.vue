<template>
    <div>
        <div class="columns">
            <div class="column">
                <a class="button is-success" v-on:click="flagCrearSector = true">Crear Nuevo</a>
            </div>
        </div>    
        <br/>
        <div class="columns">
            <div class="column"><b>Tipo</b></div>
            <div class="column"><b>Nombre</b></div>
            <div class="column"><b>Ubicación / Dirección</b></div>
            <div class="column"><b>Ciudad</b></div>
            <div class="column"></div>
        </div>
        <div v-for="sector in sectores" class="columns">
            <div class="column">{{sector.tipo}}</div>
            <div class="column">{{sector.nombre}}</div>
            <div v-if="sector.tipo !== 'Zona o Sector'" class="column">{{sector.direccion}}</div>
            <div v-else class="column">
                <div>Desde <span>{{sector.limite_1}}</span></div>
                <div>Hasta <span>{{sector.limite_2}}</span></div>
                <div>Entre <span>{{sector.limite_3}}</span></div>
                <div>y <span>{{sector.limite_4}}</span></div>
                
            </div>
            <div class="column">{{sector.ciudad}}</div>
            <div class="column">
                <a class="button is-link is-small" v-on:click="EditarSector(sector)">Editar</a>
                <a class="button is-danger is-small" v-on:click="EliminarSector(sector)">Eliminar</a>
            </div>
        </div>
        <crear-sector
            v-if="flagCrearSector"
            v-on:cerrar-modal="CerrarModal()"
        ></crear-sector>

        <eliminar-sector
            v-if="flagEliminarSector"
            v-on:cerrar-modal="CerrarModal()"
            :sector="sectorSeleccionado" 
        ></eliminar-sector>

        <editar-sector
            v-if="flagEditarSector"
            v-on:cerrar-modal="CerrarModal()"
            :sector="sectorSeleccionado" 
        ></editar-sector>
    </div>                
</template>

<script>
    import axios from "axios";
    import CrearSector from './Crear.vue';
    import EliminarSector from './Eliminar.vue';
    import EditarSector from './Editar.vue';

    export default {
        mounted() {
            console.log('Component mounted.')
        },

        props:{
        },

        components: {
            crearSector     : CrearSector,
            eliminarSector  : EliminarSector,
            editarSector    : EditarSector
        },

        created() {
            this.CargarSectores()
        },

        data(){
            return{
                flagCrearSector:false,
                flagEliminarSector:false,
                flagEditarSector:false,
                sectorSeleccionado:false,
                sectores:[]
            }
        },
        methods:{
            EliminarSector(sector){
                this.flagEliminarSector=true;
                this.sectorSeleccionado = sector;
            },

            EditarSector(sector){
                this.flagEditarSector=true;
                this.sectorSeleccionado = sector;
            },

            CerrarModal(flagCerrar){
                this.flagCrearSector = false;
                this.flagEliminarSector=false;
                this.flagEditarSector=false;
                this.CargarSectores();
            },

            CargarSectores(){
                axios.get('listado-sectores')
                .then(response => {
                    this.sectores = response.data;
                })
            }
        },
    }
</script>
