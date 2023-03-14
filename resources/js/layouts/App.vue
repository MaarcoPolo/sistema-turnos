<template>
    <div>
        <div v-if="user">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    <li class="nav-item active" @click="this.$router.push('/')">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item" @click="this.$router.push('/usuarios')">
                        <a class="nav-link" href="#">Usuarios</a>
                    </li>
                    <li class="nav-item" @click="logout()">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                    </ul>
                </div>
            </nav>
        </div>
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