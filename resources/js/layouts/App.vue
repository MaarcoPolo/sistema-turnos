<template>
    <div class="wrapper" v-if="user && currentRoute != 'KioscoPuebla' && currentRoute != 'ImprimirTurnoPuebla' && currentRoute != 'KioscoCholula'  && currentRoute != 'ImprimirTurnoCholula' && currentRoute != 'KioscoHuejotzingo' && currentRoute != 'ImprimirTurnoHuejotzingo' && currentRoute != 'KioscoLaborales' && currentRoute != 'ImprimirTurnoLaborales' && currentRoute != 'PantallaTurnosPuebla' && currentRoute != 'PantallaTurnosCholula' && currentRoute != 'PantallaTurnosHuejotzingo' && currentRoute != 'PantallaTurnosLaborales'">
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
            <ul class="custom-ul">
                <li class="option-sidebar" :class="currentRoute == 'Home' ? 'option-sidebar-selected' : 'option-sidebar-unselected'" @click="this.$router.push('/')" v-if="user.user.tipo_usuario_id == 1 || user.user.tipo_usuario_id == 2">Inicio</li>
                <li class="option-sidebar" :class="currentRoute == 'Ventanilla' ? 'option-sidebar-selected' : 'option-sidebar-unselected'" @click="this.$router.push('/ventanilla') " v-if="user.user.tipo_usuario_id == 3">Ventanilla</li>
                <li class="option-sidebar" :class="currentRoute == 'Catalogos' || currentRoute == 'Usuarios' || currentRoute == 'Cajas' ? 'option-sidebar-selected' : 'option-sidebar-unselected'" @click="this.$router.push('/catalogos')" v-if="user.user.tipo_usuario_id == 1 || user.user.tipo_usuario_id == 2">Catálogos</li>
                <li class="option-sidebar" :class="currentRoute == 'Reportes' ? 'option-sidebar-selected' : 'option-sidebar-unselected'" @click="this.$router.push('/reportes')" v-if="user.user.tipo_usuario_id == 1 || user.user.tipo_usuario_id == 2 && user.user.casa_justicia_id != 4">Reportes</li>
                <li class="logout_sidebar_button option-sidebar option-sidebar-unselected" @click="logout()">Cerrar Sesión</li>
            </ul>
        </aside>
        <div class="content imprimir-turno-body">
            <router-view></router-view>
        </div>
        <footer class="footer">
            <div class="footer-first-line"></div>
            <div class="footer-content">
                <p>&#169; 2023 Poder Judicial del Estado de Puebla</p>
            </div>
        </footer>
    </div>
    <div class="wrapper-2" v-else-if="currentRoute == 'KioscoPuebla' || currentRoute == 'ImprimirTurnoPuebla' || currentRoute == 'KioscoCholula' || currentRoute == 'ImprimirTurnoCholula' || currentRoute == 'KioscoHuejotzingo' || currentRoute == 'ImprimirTurnoHuejotzingo' || currentRoute == 'KioscoLaborales' || currentRoute == 'ImprimirTurnoLaborales'">
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
    <div class="wrapper-3" v-else-if="currentRoute == 'PantallaTurnosPuebla' || currentRoute == 'PantallaTurnosCholula' || currentRoute == 'PantallaTurnosHuejotzingo' || currentRoute == 'PantallaTurnosLaborales'">
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
        mounted() {
            window.Echo.channel('public').listen('Hello', (e) => {
                console.log(e)
            })
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
            },
            irInicio() {
                if (this.user.user.tipo_usuario_id == 3) {
                    this.$router.push('/ventanilla')
                } else {
                    this.$router.push('/')
                }
            }
        }
    })
</script>