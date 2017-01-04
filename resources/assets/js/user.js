// Node Modules
import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'
Vue.use(VueAxios, axios)
Vue.use(VueRouter)

// Components
import PlNav from './components/nav/PlNav.vue'
import PlGeoAutocomplete from './components/PlGeoAutocomplete.vue'

// Route Components
import PlMain from './pages/manifestation/form/PlMain.vue'
import PlLocalDate from './pages/manifestation/form/parts/PlDateLocal.vue'
import PlInfo from './pages/manifestation/form/parts/PlInfo.vue'
import Pl404 from './pages/404.vue'

// Vue Router
const router = new VueRouter({
  linkActiveClass: 'is-active',

  routes: [
    {
      name: 'home',
      path: '/',
      component: Pl404
    },
    {
      name: 'manifestation.search',
      path: '/manifestacao/buscar',
      component: Pl404
    },
    {
      name: 'admin.reports',
      path: '/admin/relatorios',
      component: Pl404
    },
    {
      path: '/manifestacao/nova',
      component: PlMain,
      children: [
        {
          name: 'manifestation.create',
          path: '',
          component: PlLocalDate
        },
        {
          name: 'manifestation.create.fact',
          path: 'fato',
          component: PlInfo
        }
      ]
    },
    {
      path: '*', component: Pl404
    }
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
    PlNav, PlGeoAutocomplete
  },

  // Call da constante do VueRouter
  router
})
