import { createWebHistory, createRouter } from "vue-router";
import store from './store'

import Login from './pages/Login.vue'
import Home from './pages/Home.vue'
import Catalogos from './pages/Catalogos.vue'
import Usuarios from './pages/Usuarios.vue'
import Ventanilla from './pages/Ventanilla.vue'

import KioscoPuebla from './pages/KioscoPuebla.vue'
import ImprimirTurnoPuebla from './pages/ImprimirTurnoPuebla.vue'
import PantallaTurnosPuebla from './pages/PantallaTurnosPuebla.vue'

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
        path: '/ventanilla',
        name: 'Ventanilla',
        component: Ventanilla,
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
    },
    {
        path: '/pantalla-turnos-puebla',
        name: 'PantallaTurnosPuebla',
        component: PantallaTurnosPuebla,
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