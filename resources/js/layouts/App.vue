<template>
    <div class="wrapper" v-if="user && currentRoute != 'KioscoPuebla' && currentRoute != 'ImprimirTurnoPuebla'">
        <div class="main-head">
            <div class="custom-page-header">
                <div class="separador">
                    <h1 class="title-head"><span>Control de Turnos</span><br>para la atención al público</h1>
                </div>
                <div class="logo">
                    <picture>
                        <img class="custom-image-header" loading="lazy" src="../../../public/img/logo_poder_judicial_gris.svg" alt="Logo Poder Judicial del Estado de Puebla">
                    </picture>
                </div>
                <div class="separador-mobile">
                    <h1 class="title-head"><span>Control de Turnos</span><br>para la atención al público</h1>
                </div>
            </div>
            <div class="custom-border-header-1"></div>
            <div class="custom-border-header-2"></div>
        </div>
        <aside class="sidebar">
            <div class="div-sidebar">
                <ul class="custom-ul">
                    <li class="option-sidebar" :class="currentRoute == 'Home' ? 'option-sidebar-selected' : 'option-sidebar-unselected'" @click="this.$router.push('/')">Inicio</li>
                    <li class="option-sidebar" :class="currentRoute == 'Catalogos' || currentRoute == 'Usuarios' ? 'option-sidebar-selected' : 'option-sidebar-unselected'" @click="this.$router.push('/catalogos')">Catálogos</li>
                    <li class="logout_sidebar_button option-sidebar option-sidebar-unselected" @click="logout()">Cerrar Sesión</li>
                    <!-- <div class="div-logout">
                        <li class="logout_sidebar_button option-sidebar option-sidebar-unselected" @click="logout()">Cerrar Sesión</li>
                    </div> -->
                </ul>
            </div>
        </aside>
        <div class="content">
            <router-view></router-view>
        </div>
    </div>
    <div class="wrapper-2" v-else-if="currentRoute == 'KioscoPuebla' || currentRoute == 'ImprimirTurnoPuebla'">
        <div class="main-head">
            <div class="custom-page-header">
                <div class="separador">
                    <h1 class="title-head"><span>Control de Turnos</span><br>para la atención al público</h1>
                </div>
                <div class="logo">
                    <picture>
                        <img class="custom-image-header" loading="lazy" src="../../../public/img/logo_poder_judicial_gris.svg" alt="Logo Poder Judicial del Estado de Puebla">
                    </picture>
                </div>
                <div class="separador-mobile">
                    <h1 class="title-head"><span>Control de Turnos</span><br>para la atención al público</h1>
                </div>
            </div>
            <div class="custom-border-header-1"></div>
            <div class="custom-border-header-2"></div>
        </div>
        <div class="content">
            <router-view></router-view>
        </div>
    </div>
    <div v-else>
        <router-view></router-view>
    </div>
</template>

<script>
    import { defineComponent } from "vue";

    export default defineComponent({
        name: 'app',
        data() {
            return {

            }
        },
        created() {
            const userInfo = localStorage.getItem('user')
            if (userInfo) {
                const userData = JSON.parse(userInfo)
                this.$store.commit('setUserData', userData)
            }
            axios.interceptors.response.use(
                response => response,
                error => {
                    if (error.response.status === 401) {
                        this.$store.dispatch('logout')
                    }
                    return Promise.reject(error)
                }
            )
        },
        computed: {
            user() {
                return this.$store.getters.user
            },
            currentRoute() {
                return this.$route.name
            }
        },
        methods: {
            logout() {
                this.$store.dispatch('logout')
            }
        }
    })
</script>