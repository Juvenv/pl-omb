<template>
  <div class="columns">

      <div class="column notification is-1 is-primary has-text-centered">
        <span class="icon is-large">
          <i class="fa fa-compass" aria-hidden="true"></i>
        </span>
      </div>

      <div class="column">
        <label class="label">Local: </label>
        <p class="control">
          <input class="input" ref="date" type="date">
        </p>
      </div>

      <div class="column">
        <label class="label">Outra coisa: </label>
        <p class="control">
          <input class="input" type="time" :value="hour">
        </p>
      </div>

    </div>
</template>

<script>
  export default {

  }
</script>

<style>

</style>