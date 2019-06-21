import Vue from 'vue'
//import App from './App.vue'

// import component and stylesheet
import AirbnbStyleDatepicker from 'vue-airbnb-style-datepicker'
import 'vue-airbnb-style-datepicker/dist/vue-airbnb-style-datepicker.min.css'

const datepickerOptions = {
    days: ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'],
    daysShort: ['Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab', 'Dom'],
    monthNames: [
        'Enero',
        'Febrero',
        'Marzo',
        'Abril',
        'Mayo',
        'Junio',
        'Julio',
        'Agosto',
        'Septiembre',
        'Octubre',
        'Noviembre',
        'Diciembre'
    ],
    texts: {
        apply: 'Seleccionar',
        cancel: 'Cancelar',
        keyboardShortcuts: 'Teclado Shortcuts'
    }
};

Vue.use(AirbnbStyleDatepicker, datepickerOptions);


export default datepickerOptions

