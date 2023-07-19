import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
// import Login from '../views/Login.vue'
// import Menu from '../views/Menu.vue'
// import Cart from '../views/Cart.vue'
// import Contact from '../views/Contact.vue'
import About from '../views/About.vue'
// import { checkAuth } from '../services/AuthService'

const siteUrl = window.location.protocol + '//' + window.location.host

// const routes = [
//   { path: '/', name: 'Home', component: Home, meta: { siteUrl: siteUrl } },
//   { path: '/dashboard', name: 'Dashboard', component: Home, meta: { requiresAuth: true, isLogged: await isLogged() }, meta: { siteUrl: siteUrl } },
//   { path: '/login', name: 'Login', component: Login, meta: { siteUrl: siteUrl } },
//   { path: '/menu', name: 'Menu', component: Menu },
//   { path: '/cart', name: 'Cart', component: Cart },
//   { path: '/contact', name: 'Contact', component: Contact },
//   { path: '/about', name: 'About', component: About, meta: { siteUrl: siteUrl } }
// ]

const routes = [
  { path: '/', name: 'Home', component: Home, meta: { siteUrl: siteUrl } },
  { path: '/about', name: 'About', component: About, meta: { siteUrl: siteUrl } }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

// router.beforeEach(async (to, from) => {
//   if (to.meta.requiresAuth) {
//     if (!await isLogged()) {
//       return {
//         name: 'Login'
//       }
//     }
//   }
// })

// async function isLogged() {
//   const response = await checkAuth()
//   return response.loginStatus ?? false
// }

export default router