// Node Modules
import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'
Vue.use(VueAxios, axios)
Vue.use(VueRouter)

// Components
import PlHeader from './components/header/PlHeader.vue'
import PlGeoAutocomplete from './components/PlGeoAutocomplete.vue'

// Route Components
import PlCreateManifestation from './pages/manifestation/PlCreateManifestation.vue'
import Pl404 from './pages/404.vue'

// Vue Router
const router = new VueRouter({
  linkActiveClass: 'is-active',

  routes: [
    {
      path: '/manifestation/create',
      component: PlCreateManifestation
    },
    { path: '*', component: Pl404 }
  ],
})

// Vue Application
new Vue({
  el: '#app',

  data: {
    title: "Titulo",
    user: {}
  },

  components: {
    PlHeader, PlGeoAutocomplete
  },

  // Call da constante do VueRouter
  router
})
