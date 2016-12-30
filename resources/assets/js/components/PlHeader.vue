<template lang="html">
  <nav class="nav has-shadow is-primary">
    <div class="nav-left">
      <a class="nav-item is-tab is-brand is-active" href="#">
        <strong>PL-OMB</strong>
      </a>

      <a class="nav-item is-tab" href="#">
        Abrir Manifestação
      </a>

      <a v-if="user" class="nav-item is-tab" href="#">
        Pesquisar Manifestação
      </a>
      <a v-else class="nav-item is-tab" href="#">
        Consultar Andamento
      </a>

      <a v-if="user && user.profile.name === 'Ouvidoria' " class="nav-item is-tab" href="#">
        Relatórios
      </a>
    </div>

    <div class="nav-right nav-menu" v-if="user">

    </div>
  </nav>
</template>

<script>
export default {
  name: 'pl-header',

  data(){
    return {
      // user: null
      user:{
        'name': 'Vitor Silvério',
        'sector': {
          'name': 'Ouvidoria'
        },
        'profile': {
          // 'name': null
          'name': 'Ouvidoria'
        }
      }
    }
  }
}
</script>
