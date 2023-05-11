<template>
    <div class="container-fluid">
        <div class="row justify-content-center mt-8">
            <div class="card-titulo-ventanilla mt-2">
                <img class="icono-ventanilla" src="../../../public/icons/ventanilla.png" alt="">
                <p>Ventanilla {{this.user.user.caja_id}}</p>
            </div>
        </div>
        <div class="row justify-content-center mt-8">
            <button class="boton-sencillo" @click="atenderTurno()">Atender Nuevo Turno</button>
        </div>
        <div class="row justify-content-between mt-12">
            <div class="col-md-1 col-12"></div>
            <div class="col-md-5 col-12 mt-4">
                <div class="card-turno-2">
                    <div class="card-turno-titulo-2">
                        <p>Turno en Atención</p>
                    </div>
                    <div class="card-turno-body-2">
                        <p>{{turnos[0].turno}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-12 mt-4">
                <div class="card-turno-2">
                    <div class="card-turno-titulo-2">
                        <p>Turnos por Atender</p>
                    </div>
                    <div class="card-turno-body-turnos row justify-content-between">
                        <div class="col-6 columna-turnos columna-turnos-left mb-2">
                            <div class="turno-siguiente mb-4">
                                <p>{{turnos[1].turno }}</p>
                            </div>
                            <div class="turno-siguiente mb-4">
                                <p>{{turnos[2].turno }}</p>
                            </div>
                            <div class="turno-siguiente mb-4">
                                <p>{{turnos[3].turno }}</p>
                            </div>
                        </div>
                        <div class="col-6 columna-turnos columna-turnos-right mb-2">
                            <div class="turno-siguiente mb-4">
                                <p>{{turnos[4].turno }}</p>
                            </div>
                            <div class="turno-siguiente mb-4">
                                <p>{{turnos[5].turno }}</p>
                            </div>
                            <div class="turno-siguiente mb-4">
                                <p>{{turnos[6].turno }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1 col-12"></div>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from "vue"
    import { errorSweetAlert, successSweetAlert, warningSweetAlert } from "../helpers/sweetAlertGlobals"


    export default defineComponent({
        name: 'ventanilla',
        data() {
            return {
                usuario: {
                    id: null,
                    sede_id: null
                },
                
            }
        },
        created(){
            this.cargarTurnos()
        },
        computed: {
            user() {
                return this.$store.getters.user
            },
            currentRoute() {
                return this.$route.name
            },
            turnos(){
                return this.$store.getters.getAtencionTurnos
            },
            // obtenerturnos(){
            //     return this.$store.getters.getObtenerTurnos
            // }
        },
        methods:{
            async atenderTurno()
            {
               
                try {
                    this.usuario.id = this.user.user.id;
                    this.usuario.sede_id = this.user.user.casa_justicia_id;
                    // console.log(this.usuario)
                        let response = await axios.post('/api/atender-turno', this.usuario)
                        if (response.status === 200) {
                            if (response.data.status === "ok") {
                                this.$store.commit('setAtencionTurnos',response.data.turnos)
                                // console.log(this.$store.state.turno.turnoGenerado)
                                // successSweetAlert(response.message)
                                // this.$router.push('/imprimir-turno-laborales')
                                }else if(response.data.status === "no-data"){
                                    this.$store.commit('setAtencionTurnos',response.data.turnos)
                                    warningSweetAlert(response.data.message)
                                
                                
                                } else {
                                errorSweetAlert(`${response.value.data.message}<br>Error: ${response.value.data.error}<br>Location: ${response.value.data.location}<br>Line: ${response.value.data.line}`)
                            }
                        } else {
                        errorSweetAlert('Ocurrió un error al actualizar el turno.')
                        }
                    } catch (error) {
                                errorSweetAlert('Ocurrió un error al actualizar el turno.')
                    }

            },
            async cargarTurnos()
            {
               
                try {
                    this.usuario.id = this.user.user.id;
                    this.usuario.sede_id = this.user.user.casa_justicia_id;
                    // console.log(this.usuario)
                        let response = await axios.post('/api/cargar-turnos', this.usuario)
                        if (response.status === 200) {
                            if (response.data.status === "ok") {
                                this.$store.commit('setAtencionTurnos',response.data.turnos)
                                // console.log(this.$store.state.turno.turnoGenerado)
                                // successSweetAlert(response.message)
                                // this.$router.push('/imprimir-turno-laborales')
                                }else if(response.data.status === "no-data"){
                                    this.$store.commit('setAtencionTurnos',response.data.turnos)
                                    warningSweetAlert(response.data.message)
                                } else {
                                errorSweetAlert(`${response.value.data.message}<br>Error: ${response.value.data.error}<br>Location: ${response.value.data.location}<br>Line: ${response.value.data.line}`)
                            }
                        } else {
                        errorSweetAlert('Ocurrió un error al cargar los turnos.')
                        }
                    } catch (error) {
                                errorSweetAlert('Ocurrió un error al cargar los turnos.')
                    }

            }
        }
    })
</script>