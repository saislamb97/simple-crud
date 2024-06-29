import { createRouter, createWebHistory } from 'vue-router'
import UserList from '../components/UserList.vue'
import UserForm from '../components/UserForm.vue'

const routes = [
  { path: '/', name: 'UserList', component: UserList },
  { path: '/user', name: 'AddUser', component: UserForm },
  { path: '/user/:id', name: 'EditUser', component: UserForm, props: true }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
