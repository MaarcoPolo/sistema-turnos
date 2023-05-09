import { createWebHistory, createRouter } from "vue-router";
import store from './store'

import Login from './pages/Login.vue'
import Home from './pages/Home.vue'
import Catalogos from './pages/Catalogos.vue'
import Usuarios from './pages/Usuarios.vue'
import Cajas from './pages/Cajas.vue'

import KioscoPuebla from './pages/KioscoPuebla.vue'
import ImprimirTurnoPuebla from './pages/ImprimirTurnoPuebla.vue'

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
        path: '/catalogos',
        name: 'Catalogos',
        component: Catalogos,
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
        path: '/cajas',
        name: 'Cajas',
        component: Cajas,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/kiosco-puebla',
        name: 'KioscoPuebla',
        component: KioscoPuebla,
    },
    {
        path: '/imprimir-turno-puebla',
        name: 'ImprimirTurnoPuebla',
        component: ImprimirTurnoPuebla,
    }
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