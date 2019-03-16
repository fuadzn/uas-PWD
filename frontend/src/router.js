import Vue from 'vue'
import Router from 'vue-router'
import Nasabah from './components/Nasabah.vue'
import NasabahForm from './components/NasabahForm.vue'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/nasabah',
      name: 'Nasabah',
      component: Nasabah
    },
    {
      path: '/nasabah/create',
      name: ' NasabahForm',
      component: NasabahForm
    },
    {
      path: '/nasabah/:id',
      name: ' NasabahEdit',
      component: NasabahForm
    },
  ]
})
