<template>
  <div>
    <pl-date></pl-date>
    <pl-local></pl-local>
  </div>
</template>

<script>
  import PlDate from './PlDate.vue'
  import PlLocal from './PlLocal.vue'
  export default {
    components: {
      PlDate, PlLocal
    }
  }
</script>
