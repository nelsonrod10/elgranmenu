<template>
  <div>
    <div class="datepicker-trigger columns">
        <div class="column is-6 is-offset-3">
            <label class="label" for="datepicker-trigger">Seleccione las fechas</label>
            <div class="control has-icons-left">
                <input
                    type="text"
                    id="datepicker-trigger"
                    name="fecha"
                    placeholder="Seleccione fechas"
                    :value="formatDates(dateOne, dateTwo)"
                    class="input" required    
                >
                <span class="icon is-small is-left">
                    <i class="fas fa-font"></i>
                </span>
            </div>
        </div>
        
        <AirbnbStyleDatepicker
          :trigger-element-id="'datepicker-trigger'"
          :mode="'single'"
          :min-date="'2019-01-01'"
          :end-date="'2019-12-31'"
          :fullscreen-mobile="true"
          :date-one="dateOne"
          :date-two="dateTwo"
          :show-shortcuts-menu-trigger=false

          @date-one-selected="val => { dateOne = val }"
          @date-two-selected="val => { dateTwo = val }"

        />
    </div>
  </div>
</template>

<script>
    import format from 'date-fns/format'

    export default {
        data() {
            return {
              dateFormat: 'D MMM YYYY',
              dateOne: '',
              dateTwo: ''
            }
        },
        methods: {
            formatDates(dateOne, dateTwo) {
              let formattedDates = ''
              if (dateOne) {
                formattedDates = format(dateOne, this.dateFormat)
              }
              if (dateTwo) {
                formattedDates += ' - ' + format(dateTwo, this.dateFormat)
              }
              return formattedDates
            }
        }
    }
</script>
