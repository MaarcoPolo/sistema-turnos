import { createWebHistory, createRouter } from "vue-router";
import store from './store'

import Login from './pages/Login.vue'
import Home from './pages/Home.vue'
import Usuarios from './pages/Usuarios.vue'
import KioscoPuebla from './pages/KioscoPuebla.vue'

const routes = [
    {
        path: '/login',
        name: 'Login',
        component: Login
    },
    {
        path: '/',
        name: 'Home',
        component: Home,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/usuarios',
        name: 'Usuarios',
        component: Usuarios,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/kiosco-puebla',
        name: 'KioscoPuebla',
        component: KioscoPuebla,
      
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach((to, from, next) => {
    const requiresAuth = to.matched.some(record => record.meta.requiresAuth)
    const currentUser = store.state.user

    if (requiresAuth && !currentUser) {
        next('/login')
    } else if (to.path == '/login' && currentUser) {
        next('/')
    } else {
        next()
    }
})

export default router