<template>
    <div class="container-fluid imprimir-turno-body">
        <div class="container-fluid">
            <div class="row justify-content-between mt-4">
                <div class="col-md-1 col-12"></div>
                <div class="col-md-5 col-12 mt-4">
                    <div class="card-turno-3">
                        <img class="icono-pantalla" src="../../../public/icons/turno.png" alt="">
                        <div class="card-turno-titulo">
                            <p style="font-size: 2rem;">Turno</p>
                        </div>
                        <div class="card-turno-body-3">
                            <p class="card-numero-turno">{{ turnos.length > 0 ? turnos[0].turno : '--'}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-12 mt-4">
                    <div class="card-turno-3">
                        <img class="icono-pantalla" src="../../../public/icons/ventanilla.png" alt="">
                        <div class="card-turno-titulo">
                            <p style="font-size: 2rem;">Pasar a Ventanilla</p>
                        </div>
                        <div class="card-turno-body-3">
                            <p class="card-ventanilla-turno">{{ turnos.length > 0 ? turnos[0].caja : '--'}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 col-12"></div>
            </div>
            <div class="row justify-content-between mt-12 mb-8">
                <div class="col-md-5 col-12 mt-4">
                    <div class="card-turno-3 row justify-content-between">
                        <div class="col-6 p-0">
                            <div class="card-pantalla-tabla-titulo-turno">
                                <p>Turno</p>
                            </div>
                        </div>
                        <div class="col-6 p-0">
                            <div class="card-pantalla-tabla-titulo-ventanilla">
                                <p>Pasar a Ventanilla</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-turno-3 row justify-content-between">
                        <div class="col-6 card-pantalla-tabla-columna-turnos">
                            <div class="mb-4">
                                <p class="pantalla-tabla-turno">{{ turnos.length > 0 ? turnos[1].turno : '--'}}</p>
                                <img class="icono-flecha-turno" src="../../../public/icons/flecha-turno.png" alt="">
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-turno">{{ turnos.length > 0 ? turnos[2].turno : '--'}}</p>
                                <img class="icono-flecha-turno" src="../../../public/icons/flecha-turno.png" alt="">
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-turno">{{ turnos.length > 0 ? turnos[3].turno : '--'}}</p>
                                <img class="icono-flecha-turno" src="../../../public/icons/flecha-turno.png" alt="">
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-turno">{{ turnos.length > 0 ? turnos[4].turno : '--'}}</p>
                                <img class="icono-flecha-turno" src="../../../public/icons/flecha-turno.png" alt="">
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-turno">{{ turnos.length > 0 ? turnos[5].turno : '--'}}</p>
                                <img class="icono-flecha-turno" src="../../../public/icons/flecha-turno.png" alt="">
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-turno">{{ turnos.length > 0 ? turnos[6].turno : '--'}}</p>
                                <img class="icono-flecha-turno" src="../../../public/icons/flecha-turno.png" alt="">
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-turno">{{ turnos.length > 0 ? turnos[7].turno : '--'}}</p>
                                <img class="icono-flecha-turno" src="../../../public/icons/flecha-turno.png" alt="">
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-turno">{{ turnos.length > 0 ? turnos[8].turno : '--'}}</p>
                                <img class="icono-flecha-turno" src="../../../public/icons/flecha-turno.png" alt="">
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-turno">{{ turnos.length > 0 ? turnos[9].turno : '--'}}</p>
                                <img class="icono-flecha-turno" src="../../../public/icons/flecha-turno.png" alt="">
                            </div>
                            <!-- <div class="mb-4">
                                <p class="pantalla-tabla-turno">{{ turnos.length > 0 ? turnos[10].turno : '--'}}</p>
                                <img class="icono-flecha-turno" src="../../../public/icons/flecha-turno.png" alt="">
                            </div> -->
                        </div>
                        <div class="col-6 card-pantalla-tabla-columna-ventanillas">
                            <div class="mb-4">
                                <p class="pantalla-tabla-ventanilla">{{ turnos.length > 0 ? turnos[1].caja : '--'}}</p>
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-ventanilla">{{ turnos.length > 0 ? turnos[2].caja : '--'}}</p>
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-ventanilla">{{ turnos.length > 0 ? turnos[3].caja : '--'}}</p>
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-ventanilla">{{ turnos.length > 0 ? turnos[4].caja : '--'}}</p>
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-ventanilla">{{ turnos.length > 0 ? turnos[5].caja : '--'}}</p>
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-ventanilla">{{ turnos.length > 0 ? turnos[6].caja : '--'}}</p>
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-ventanilla">{{ turnos.length > 0 ? turnos[7].caja : '--'}}</p>
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-ventanilla">{{ turnos.length > 0 ? turnos[8].caja : '--'}}</p>
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-ventanilla">{{ turnos.length > 0 ? turnos[9].caja : '--'}}</p>
                            </div>
                            <!-- <div class="mb-4">
                                <p class="pantalla-tabla-ventanilla">{{ turnos.length > 0 ? turnos[10].caja : '--'}}</p>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12 mt-8">
                    <v-carousel class="custom-slider" cycle show-arrows="hover" hide-delimiters>
                        <v-carousel-item
                            v-for="(item,i) in imagenes_slider"
                            :key="i"
                            :src="item.src"
                            
                        ></v-carousel-item>
                    </v-carousel>
                    <!-- <video id="video-turnos" class="tag-video" autoplay loop muted controls>
                        <source src="../../../public/video/video-pantalla.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video> -->
                </div>
                <!-- <div class="col-md-1 col-12 mt-4"></div> -->
            </div>

            <button id="startbtn" @click="reproducir()" style="display: none;">Start</button>
            <audio controls id="music" autoplay style="display: none;">
                <source src="../../../public/video/timbre.mp3">
                Your browser does not support the audio element.
            </audio>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from "vue"
    import { errorSweetAlert, successSweetAlert, warningSweetAlert } from "../helpers/sweetAlertGlobals"

    export default defineComponent({
        name: 'pantalla-turnos-puebla',
        data(){
            return{
                turno:{
                    casa_justicia_id: 1,
                },
                imagenes_slider: [
                    {
                        src: '/img/slider/imagen_2.png',
                    },
                    {
                        src: '/img/slider/imagen_3.png',
                    },
                    {
                        src: '/img/slider/imagen_4.png',
                    },
                    {
                        src: '/img/slider/imagen_5.png',
                    },
                ]
            }
        },
        created(){
            this.turnosPantalla()
        },
        mounted() {
            Echo.channel('turnosPuebla').listen('LlamarTurnoPuebla', (e) => {
                this.turnosPantalla()
            })
        },
        computed:{
            turnos(){
                return this.$store.getters.getTurnosPantalla
            },
        },
        methods:{
            reproducir() {
                document.getElementById("music").play()
            },
            async turnosPantalla() {
                try {
                    let response = await axios.post('/api/turnos-pantalla', this.turno)
                    if (response.status === 200) {
                        if (response.data.status === "ok") {
                            this.$store.commit('setTurnosPantalla', response.data.turnos)
                            this.reproducir()
                        }else if(response.data.status === "no-data"){
                            this.$store.commit('setTurnosPantalla',response.data.turnos)
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