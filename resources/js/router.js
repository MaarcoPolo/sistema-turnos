import { createWebHistory, createRouter } from "vue-router";
import store from './store'

import Login from './pages/Login.vue'
import Home from './pages/Home.vue'
import Catalogos from './pages/Catalogos.vue'
import Usuarios from './pages/Usuarios.vue'
import Ventanilla from './pages/Ventanilla.vue'
import Cajas from './pages/Cajas.vue'
import Reportes from './pages/Reportes.vue'
import TipoTurnos from './pages/TipoTurnos.vue'

import KioscoPuebla from './pages/KioscoPuebla.vue'
import KioscoCholula from './pages/KioscoCholula.vue'
import KioscoHuejotzingo from './pages/KioscoHuejotzingo.vue'
import KioscoLaborales from './pages/KioscoLaborales.vue'
import ImprimirTurnoPuebla from './pages/ImprimirTurnoPuebla.vue'
import PantallaTurnosPuebla from './pages/PantallaTurnosPuebla.vue'
import PantallaTurnosCholula from './pages/PantallaTurnosCholula.vue'
import PantallaTurnosHuejotzingo from './pages/PantallaTurnosHuejotzingo.vue'
import PantallaTurnosLaborales from './pages/PantallaTurnosLaborales.vue'
import ImprimirTurnoCholula from './pages/ImprimirTurnoCholula.vue'
import ImprimirTurnoHuejotzingo from './pages/ImprimirTurnoHuejotzingo.vue'
import ImprimirTurnoLaborales from './pages/ImprimirTurnoLaborales.vue'


const routes = [
    {
        path: '/login',
        name: 'Login',
        component: Login
    },

    // Rutas Administrativas
    {
        path: '/',
        name: 'Home',
        component: Home,
        meta: {
            requiresAuth: true
        },
        beforeEnter: (to, from, next) => {
            if (store.state.user.user.tipo_usuario_id != 3) {
                next()
            } else {
                next({name: 'Ventanilla'})
            }
        }
    },
    {
        path: '/catalogos',
        name: 'Catalogos',
        component: Catalogos,
        meta: {
            requiresAuth: true
        },
        beforeEnter: (to, from, next) => {
            if (store.state.user.user.tipo_usuario_id != 3) {
                next()
            } else {
                next({name: 'Ventanilla'})
            }
        }
    },
    {
        path: '/usuarios',
        name: 'Usuarios',
        component: Usuarios,
        meta: {
            requiresAuth: true
        },
        beforeEnter: (to, from, next) => {
            if (store.state.user.user.tipo_usuario_id != 3) {
                next()
            } else {
                next({name: 'Ventanilla'})
            }
        }
    },
    {
        path: '/ventanilla',
        name: 'Ventanilla',
        component: Ventanilla,
        meta: {
            requiresAuth: true
        },
        beforeEnter: (to, from, next) => {
            if (store.state.user.user.tipo_usuario_id != 2) {
                next()
            } else {
                next({name: 'Home'})
            }
        }
    },
    {
        path: '/cajas',
        name: 'Cajas',
        component: Cajas,
        meta: {
            requiresAuth: true
        },
        beforeEnter: (to, from, next) => {
            if (store.state.user.user.tipo_usuario_id != 3) {
                next()
            } else {
                next({name: 'Ventanilla'})
            }
        }
    },
    {
        path: '/TipoTurnos',
        name: 'TipoTurnos',
        component: TipoTurnos,
        meta: {
            requiresAuth: true
        },
        beforeEnter: (to, from, next) => {
            if (store.state.user.user.tipo_usuario_id != 3) {
                next()
            } else {
                next({name: 'TipoTurnos'})
            }
        }
    },
    {
        path: '/reportes',
        name: 'Reportes',
        component: Reportes,
        meta: {
            requiresAuth: true
        },
        beforeEnter: (to, from, next) => {
            if (store.state.user.user.tipo_usuario_id != 3) {
                next()
            } else {
                next({name: 'Ventanilla'})
            }
        }
    },

    // Rutas públicas
    {
        path: '/kiosco-puebla',
        name: 'KioscoPuebla',
        component: KioscoPuebla,
    },
    {
        path: '/kiosco-cholula',
        name: 'KioscoCholula',
        component: KioscoCholula,
    },
    {
        path: '/kiosco-huejotzingo',
        name: 'KioscoHuejotzingo',
        component: KioscoHuejotzingo,
    },
    {
        path: '/kiosco-laborales',
        name: 'KioscoLaborales',
        component: KioscoLaborales,
    },
    {
        path: '/imprimir-turno-puebla',
        name: 'ImprimirTurnoPuebla',
        component: ImprimirTurnoPuebla,
    },
    {
        path: '/pantalla-turnos-cholula',
        name: 'PantallaTurnosCholula',
        component: PantallaTurnosCholula,
    },
    {
        path: '/pantalla-turnos-huejotzingo',
        name: 'PantallaTurnosHuejotzingo',
        component: PantallaTurnosHuejotzingo,
    },
    {
        path: '/pantalla-turnos-laborales',
        name: 'PantallaTurnosLaborales',
        component: PantallaTurnosLaborales,
    },
    {
        path: '/pantalla-turnos-puebla',
        name: 'PantallaTurnosPuebla',
        component: PantallaTurnosPuebla,
    },
    {
        path: '/imprimir-turno-cholula',
        name: 'ImprimirTurnoCholula',
        component: ImprimirTurnoCholula,
    },
    {
        path: '/imprimir-turno-huejotzingo',
        name: 'ImprimirTurnoHuejotzingo',
        component: ImprimirTurnoHuejotzingo,
    },
    {
        path: '/imprimir-turno-laborales',
        name: 'ImprimirTurnoLaborales',
        component: ImprimirTurnoLaborales,
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