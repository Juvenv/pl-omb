<template>
  <form class="columns">

    <div class="column">
      <label class="label">Data: </label>
      <p class="control">
        <input class="input" ref="date" type="date">
      </p>
    </div>

    <div class="column">
      <label class="label">Hora: </label>
      <p class="control">
        <input class="input" type="time" :value="hour">
      </p>
    </div>

  </form>
</template>

<script>
  import moment from 'moment'

  export default {
    computed: {
      date() {
        return moment(new Date()).format('YYYY-MM-DD')
      },
      hour(){
        return moment(new Date()).format('HH:MM')
      }
    },

    mounted() {
      // Atribuindo data ao input, o tipo date não consegue receber via attributo value diretamente no HTML
      this.$refs.date.value = this.date;
    }
  }
</script>

<style>

</style>