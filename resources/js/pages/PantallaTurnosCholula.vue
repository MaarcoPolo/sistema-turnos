<template>
    <div class="container-fluid imprimir-turno-body">
        <div class="custom-title-div-normal-2 row justify-content-between">
            <div class="">
                <p class="custom-title-page-2"></p>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-between mt-12">
                <div class="col-md-1 col-12"></div>
                <div class="col-md-5 col-12 mt-4">
                    <div class="card-turno-3">
                        <img class="icono-pantalla" src="../../../public/icons/turno.png" alt="">
                        <div class="card-turno-titulo">
                            <p>Turno</p>
                        </div>
                        <div class="card-turno-body-3">
                            <p class="card-numero-turno">{{ turnos.length > 0 ? turnos[0].turno : ''}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-12 mt-4">
                    <div class="card-turno-3">
                        <img class="icono-pantalla" src="../../../public/icons/ventanilla.png" alt="">
                        <div class="card-turno-titulo">
                            <p>Ventanilla </p>
                        </div>
                        <div class="card-turno-body-3">
                            <p class="card-ventanilla-turno">{{ turnos.length > 0 ? turnos[0].caja : ''}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 col-12"></div>
            </div>
            <div class="row justify-content-between mt-12">
                <div class="col-md-5 col-12 mt-4">
                    <div class="card-turno-3 row justify-content-between">
                        <div class="col-6 p-0">
                            <div class="card-pantalla-tabla-titulo-turno">
                                <p>Turno</p>
                            </div>
                        </div>
                        <div class="col-6 p-0">
                            <div class="card-pantalla-tabla-titulo-ventanilla">
                                <p>Ventanilla </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-turno-3 row justify-content-between">
                        <div class="col-6 card-pantalla-tabla-columna-turnos">
                            <div class="mb-4">
                                <p class="pantalla-tabla-turno">{{ turnos.length > 0 ? turnos[1].turno : ''}}</p>
                                <img class="icono-flecha-turno" src="../../../public/icons/flecha-turno.png" alt="">
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-turno">{{ turnos.length > 0 ? turnos[2].turno : ''}}</p>
                                <img class="icono-flecha-turno" src="../../../public/icons/flecha-turno.png" alt="">
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-turno">{{ turnos.length > 0 ? turnos[3].turno : ''}}</p>
                                <img class="icono-flecha-turno" src="../../../public/icons/flecha-turno.png" alt="">
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-turno">{{ turnos.length > 0 ? turnos[4].turno : ''}}</p>
                                <img class="icono-flecha-turno" src="../../../public/icons/flecha-turno.png" alt="">
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-turno">{{ turnos.length > 0 ? turnos[5].turno : ''}}</p>
                                <img class="icono-flecha-turno" src="../../../public/icons/flecha-turno.png" alt="">
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-turno">{{ turnos.length > 0 ? turnos[6].turno : ''}}</p>
                                <img class="icono-flecha-turno" src="../../../public/icons/flecha-turno.png" alt="">
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-turno">{{ turnos.length > 0 ? turnos[7].turno : ''}}</p>
                                <img class="icono-flecha-turno" src="../../../public/icons/flecha-turno.png" alt="">
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-turno">{{ turnos.length > 0 ? turnos[8].turno : ''}}</p>
                                <img class="icono-flecha-turno" src="../../../public/icons/flecha-turno.png" alt="">
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-turno">{{ turnos.length > 0 ? turnos[9].turno : ''}}</p>
                                <img class="icono-flecha-turno" src="../../../public/icons/flecha-turno.png" alt="">
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-turno">{{ turnos.length > 0 ? turnos[10].turno : ''}}</p>
                                <img class="icono-flecha-turno" src="../../../public/icons/flecha-turno.png" alt="">
                            </div>
                        </div>
                        <div class="col-6 card-pantalla-tabla-columna-ventanillas">
                            <div class="mb-4">
                                <p class="pantalla-tabla-ventanilla">{{ turnos.length > 0 ? turnos[1].caja : ''}}</p>
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-ventanilla">{{ turnos.length > 0 ? turnos[2].caja : ''}}</p>
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-ventanilla">{{ turnos.length > 0 ? turnos[3].caja : ''}}</p>
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-ventanilla">{{ turnos.length > 0 ? turnos[4].caja : ''}}</p>
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-ventanilla">{{ turnos.length > 0 ? turnos[5].caja : ''}}</p>
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-ventanilla">{{ turnos.length > 0 ? turnos[6].caja : ''}}</p>
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-ventanilla">{{ turnos.length > 0 ? turnos[7].caja : ''}}</p>
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-ventanilla">{{ turnos.length > 0 ? turnos[8].caja : ''}}</p>
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-ventanilla">{{ turnos.length > 0 ? turnos[9].caja : ''}}</p>
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-ventanilla">{{ turnos.length > 0 ? turnos[10].caja : ''}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12 mt-4">
                        <video width="100%" height="90%" controls loop autoplay>
                            <source src="../../../public/video/video-pantalla.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from "vue"
    import { errorSweetAlert, successSweetAlert, warningSweetAlert } from "../helpers/sweetAlertGlobals"


    export default defineComponent({
        name: 'pantalla-turnos-cholula',
      
        data(){
            return{
                turno:{
                    casa_justicia_id: 2,
                }   
            }
        },
        created(){
            this.turnosPantalla()
        },
        mounted() {
            Echo.channel('turnosCholula').listen('LlamarTurnoCholula', (e) => {
                // console.log(e)
                this.turnosPantalla()
                
            })
        },
        computed:{
            turnos(){
                return this.$store.getters.getTurnosPantalla
            },
        },
        methods:{
            async turnosPantalla() {
                try {
                    let response = await axios.post('/api/turnos-pantalla', this.turno)
                    if (response.status === 200) {
                        if (response.data.status === "ok") {
                            this.$store.commit('setTurnosPantalla', response.data.turnos)
                            // this.turnos = response.data.turnos
                        }else if(response.data.status === "no-data"){
                                    this.$store.commit('setTurnosPantalla',response.data.turnos)
                                    // warningSweetAlert(response.data.message)
                        } else {
                            errorSweetAlert(`${response.data.message}<br>Error: ${response.data.error}<br>Location: ${response.data.location}<br>Line: ${response.data.line}`)
                        }
                    } else {
                        errorSweetAlert('Ocurrió un error al obtener los turnos.')
                    }
                } catch (error) {
                    errorSweetAlert('Ocurrió un error al obtener los turnos.')
                }
            },

        }

    })
</script>