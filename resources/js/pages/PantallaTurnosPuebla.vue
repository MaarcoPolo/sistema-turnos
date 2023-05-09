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
                            <p class="card-numero-turno">T528</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-12 mt-4">
                    <div class="card-turno-3">
                        <img class="icono-pantalla" src="../../../public/icons/ventanilla.png" alt="">
                        <div class="card-turno-titulo">
                            <p>Ventanilla</p>
                        </div>
                        <div class="card-turno-body-3">
                            <p class="card-ventanilla-turno">Ventanilla 1</p>
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
                                <p>Ventanilla</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-turno-3 row justify-content-between">
                        <div class="col-6 card-pantalla-tabla-columna-turnos">
                            <div class="mb-4">
                                <p class="pantalla-tabla-turno">A523</p>
                                <img class="icono-flecha-turno" src="../../../public/icons/flecha-turno.png" alt="">
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-turno">7522</p>
                                <img class="icono-flecha-turno" src="../../../public/icons/flecha-turno.png" alt="">
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-turno">T521</p>
                                <img class="icono-flecha-turno" src="../../../public/icons/flecha-turno.png" alt="">
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-turno">R520</p>
                                <img class="icono-flecha-turno" src="../../../public/icons/flecha-turno.png" alt="">
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-turno">J519</p>
                                <img class="icono-flecha-turno" src="../../../public/icons/flecha-turno.png" alt="">
                            </div>
                        </div>
                        <div class="col-6 card-pantalla-tabla-columna-ventanillas">
                            <div class="mb-4">
                                <p class="pantalla-tabla-ventanilla">11</p>
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-ventanilla">6</p>
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-ventanilla">1</p>
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-ventanilla">3</p>
                            </div>
                            <div class="mb-4">
                                <p class="pantalla-tabla-ventanilla">2</p>
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
    import { defineComponent } from "vue";

    export default defineComponent({
        name: 'pantalla-turnos-puebla',
    })
</script>