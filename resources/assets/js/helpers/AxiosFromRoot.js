import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios)

class AxiosFromRoot extends VueAxios {
  constructor (...args) {
    super(...args)
    this.defaults.baseURL = '/'
  }
}