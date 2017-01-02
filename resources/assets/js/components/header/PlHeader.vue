<template lang="html">
  <nav class="nav has-shadow is-primary">
    <div class="nav-left">

      <pl-tab class="is-brand is-active" link="/">
        <strong>PL-OMB</strong>
      </pl-tab>

      <pl-tab link="/manifestation/create">
        Abrir Manifestação
      </pl-tab>

      <pl-tab link="/manifestation/search">
        Consultar Manifestação
      </pl-tab>

      <pl-tab link="/manifestation/reports" v-if="user && user.reports">
        Relatórios
      </pl-tab>

      <div class="nav-right nav-menu" v-if="user">{{ user.name }}</div>

    </div>
  </nav>
</template>
<script>
  import PlTab from './PlTab.vue'

  export default{
    data() {
      return {
        user: {}
      }
    },

    mounted() {
      this.axios.get("loggedUser").then((response) => {
        this.user = response.data;
      })
    },

    components: { PlTab },
  }
</script>