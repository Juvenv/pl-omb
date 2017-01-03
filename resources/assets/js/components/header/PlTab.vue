<template>
  <router-link class="nav-item is-tab" :to="{ name: this.link }">
    <slot></slot>
  </router-link>
</template>

<script>
  export default {
    props: ['link']
  }
</script>