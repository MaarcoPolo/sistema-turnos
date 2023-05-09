import { createStore } from 'vuex'
import { errorSweetAlert } from './../helpers/sweetAlertGlobals'
import router from '../router'
import catalogos from '../store/catalogos'
import turno from '../store/turno'

const store = createStore({
    state: {
        user: null,
        contRecaptcha: 0,
        showRecaptcha: false,
    },
    getters: {
        isLogged: state => !!state.user,
        user: function(state) {
            return state.user
        },
        getShowRecaptcha: function(state) {
            return state.showRecaptcha
        },
        getContRecaptcha: function(state) {
            return state.contRecaptcha
        }
    },
    mutations: {
        setUserData(state, userData) {
            state.user = userData
            localStorage.setItem('user', JSON.stringify(userData))
            axios.defaults.headers.common.Authorization = `Bearer ${userData.token}`
        },
        clearUserData () {
            localStorage.removeItem('user')
            location.reload()
        }
    },
    actions: {
        async login({commit}, credentials) {
            try {
                let response = await axios.post('/api/login', credentials)
                if (response.status === 200) {
                    if (response.data.status === "ok") {
                        commit('setUserData', response.data.session)
                        if (response.data.session.user.tipo_usuario_id == 3) {
                            router.push({name: 'Ventanilla'})
                        } else {
                            router.push({name: 'Home'})
                        }
                        this.state.contRecaptcha = 0
                        this.state.showRecaptcha = true
                    } else {
                        errorSweetAlert(response.data.message)

                        this.state.contRecaptcha++
                        if (this.state.contRecaptcha == 3) {
                            this.state.showRecaptcha = true
                        }
                    }
                } else {
                    errorSweetAlert('Ocurrió un error al iniciar sesión')
                }
            } catch (error) {
                errorSweetAlert('Ocurrió un error al iniciar sesión')
            }
        },
        logout ({commit}) {
            commit('clearUserData')
        }
    },
    modules: {
        catalogos,
        turno,
    }
})

export default store