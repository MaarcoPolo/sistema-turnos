<template>
    <div class="container-fluid">
        <div class="row justify-content-center mt-8">
            <div class="card-titulo-ventanilla mt-2">
                <img class="icono-ventanilla" src="../../../public/icons/ventanilla.png" alt="">
                <p>{{this.user.user.nombre}}</p>
            </div>
        </div>
        <div class="row justify-content-center mt-8">
            <button v-if="!loading" class="boton-sencillo" @click="atenderTurno()">Atender Nuevo Turno</button>
            <span v-else class="loader-ventanilla"></span>
        </div>
        <div class="row justify-content-between mt-12">
            <div class="col-md-1 col-12"></div>
            <div class="col-md-5 col-12 mt-4">
                <div class="card-turno-2">
                    <div class="card-turno-titulo-2">
                        <p>Turno en Atención</p>
                    </div>
                    <div class="card-turno-body-2">
                        <p>{{ turnos.length > 0 ? turnos[0].turno : '--'}}</p>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-5 col-12 mt-4">
                <div class="card-turno-2">
                    <div class="card-turno-titulo-2">
                        <p>Turnos por Atender</p>
                    </div>
                    <div class="card-turno-body-turnos row justify-content-between">
                        <div class="col-6 columna-turnos columna-turnos-left mb-2">
                            <div class="turno-siguiente mb-4">
                                <p>{{turnos.length > 0 ? turnos[1].turno : '--'}}</p>
                            </div>
                            <div class="turno-siguiente mb-4">
                                <p>{{turnos.length > 0 ? turnos[2].turno : '--'}}</p>
                            </div>
                            <div class="turno-siguiente mb-4">
                                <p>{{turnos.length > 0 ? turnos[3].turno : '--'}}</p>
                            </div>
                        </div>
                        <div class="col-6 columna-turnos columna-turnos-right mb-2">
                            <div class="turno-siguiente mb-4">
                                <p>{{turnos.length > 0 ? turnos[4].turno : '--'}}</p>
                            </div>
                            <div class="turno-siguiente mb-4">
                                <p>{{turnos.length > 0 ? turnos[5].turno : '--'}}</p>
                            </div>
                            <div class="turno-siguiente mb-4">
                                <p>{{turnos.length > 0 ? turnos[6].turno : '--'}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="col-md-1 col-12"></div>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from "vue"
    import { errorSweetAlert, successSweetAlert, warningSweetAlert, infoSweetAlert } from "../helpers/sweetAlertGlobals"

    export default defineComponent({
        name: 'ventanilla',
        data() {
            return {
                usuario: {
                    id: null,
                    sede_id: null
                },
                loading: false,
            }
        },
        created(){
            // this.cargarTurnos()
        },
        mounted() {
            if(this.user.user.casa_justicia_id == 1)
            {
                Echo.channel('ventanillasPuebla').listen('CargarTurnosPuebla', (e) => {
                this.cargarTurnos()
                
                })
            }
            if(this.user.user.casa_justicia_id == 2)
            {
                Echo.channel('ventanillasCholula').listen('CargarTurnosCholula', (e) => {
                this.cargarTurnos()
                
                })
            }
            if(this.user.user.casa_justicia_id == 3)
            {
                Echo.channel('ventanillasHuejotzingo').listen('CargarTurnosHuejotzingo', (e) => {
                this.cargarTurnos()
                
                })
            }
            if(this.user.user.casa_justicia_id == 4)
            {
                Echo.channel('ventanillasLaborales').listen('CargarTurnosLaborales', (e) => {
                this.cargarTurnos()
                
                })
            }
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
        },
        methods:{
            async atenderTurno(){
                this.loading = true
                try {
                    this.usuario.id = this.user.user.id;
                    this.usuario.sede_id = this.user.user.casa_justicia_id;
                        let response = await axios.post('/api/atender-turno', this.usuario)
                        if (response.status === 200) {
                            if (response.data.status === "ok") {
                                this.$store.commit('setAtencionTurnos',response.data.turnos)
                                }else if(response.data.status === "no-data"){
                                    infoSweetAlert(response.data.message)
                                    this.loading = false
                                } else {
                                errorSweetAlert(`${response.value.data.message}<br>Error: ${response.value.data.error}<br>Location: ${response.value.data.location}<br>Line: ${response.value.data.line}`)
                            }
                        } else {
                        errorSweetAlert('Ocurrió un error al actualizar el turno.')
                        }
                    } catch (error) {
                                errorSweetAlert('Ocurrió un error al actualizar el turno.')
                    }
                this.loading = false
            },
        //     async cargarTurnos()
        //     {
            
        //         try {
        //             this.usuario.id = this.user.user.id;
        //             this.usuario.sede_id = this.user.user.casa_justicia_id;
        //             // console.log(this.usuario)
        //                 let response = await axios.post('/api/cargar-turnos', this.usuario)
        //                 if (response.status === 200) {
        //                     if (response.data.status === "ok") {
        //                         this.$store.commit('setAtencionTurnos',response.data.turnos)
        //                         // console.log(this.$store.state.turno.turnoGenerado)
        //                         // successSweetAlert(response.message)
        //                         // this.$router.push('/imprimir-turno-laborales')
        //                         }else if(response.data.status === "no-data"){
        //                             this.$store.commit('setAtencionTurnos',response.data.turnos)
        //                             infoSweetAlert(response.data.message)
        //                         } else {
        //                         errorSweetAlert(`${response.value.data.message}<br>Error: ${response.value.data.error}<br>Location: ${response.value.data.location}<br>Line: ${response.value.data.line}`)
        //                     }
        //                 } else {
        //                 errorSweetAlert('Ocurrió un error al cargar los turnos.')
        //                 }
        //             } catch (error) {
        //                         errorSweetAlert('Ocurrió un error al cargar los turnos.')
        //             }

        //     }
        }
    })
</script>