<template>
    <div class="container-fluid imprimir-turno-body">
        <div class="custom-title-div-normal-2 row justify-content-between">
            <div class="">
                <p class="custom-title-page-2"></p>
            </div>
        </div>
        <div>
            <div class="row justify-content-center">
                <div class="card-turno">
                    <img class="icono-nuevo-turno" src="../../../public/icons/nuevo-turno.png" alt="">
                    <div class="card-turno-titulo">
                        <p>Nuevo Turno</p>
                    </div>
                    <div class="card-turno-body">
                        <p>{{ turnoGenerado.turno }}</p>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-md-6 col-12 mt-6">
                            <div class="custom-card-action" @click="imprimirTurno()">
                                <div class="custom-card-action-icon">
                                    <img src="../../../public/icons/imprimir.png" alt="">
                                </div>
                                <v-btn
                                    class="custom-card-button"
                                    color="#c4f45d"
                                    >
                                    Imprimir
                                </v-btn>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 mt-6">
                            <div class="custom-card-action" @click="volverKiosco()">
                                <div class="custom-card-action-icon">
                                    <img src="../../../public/icons/regresar.png" alt="">
                                </div>
                                <v-btn
                                    class="custom-card-button"
                                    color="#c4f45d"
                                    >
                                    Regresar
                                </v-btn>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from "vue";

    export default defineComponent({
        name: 'imprimir-turno-huejotzingo',
        data(){
            return{
                turno:{
                    id: null
                }
            }
        },
        computed: {
            turnoGenerado(){
                return this.$store.getters.getTurnoGenerado
            },
        },
        methods: {
           async imprimirTurno() {
                this.turno.id = this.turnoGenerado.id
                try {
                        let response = await axios.post('/api/imprimir-turno', this.turno)
                        if (response.status === 200) {
                            if (response.data.status === "ok") {
                                // this.$store.commit('setTurnoGenerado',response.data.turno)
                                // console.log(this.$store.state.turno.turnoGenerado)
                                // successSweetAlert(response.message)
                                this.$router.push('/kiosco-huejotzingo')
                                
                                } else {
                                errorSweetAlert(`${response.value.data.message}<br>Error: ${response.value.data.error}<br>Location: ${response.value.data.location}<br>Line: ${response.value.data.line}`)
                            }
                        } else {
                        errorSweetAlert('Ocurrió un error al imprimir el turno.')
                        }
                    } catch (error) {
                                errorSweetAlert('Ocurrió un error al imprimir el turno.')
                    }
                // console.log(this.turno)
            },
            volverKiosco() {
                this.$router.push('/kiosco-huejotzingo')
            }

        }
    })
</script>