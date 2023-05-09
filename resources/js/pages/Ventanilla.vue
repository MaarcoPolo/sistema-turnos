<template>
    <div class="container-fluid">
        <div class="row justify-content-center mt-8">
            <div class="card-titulo-ventanilla mt-2">
                <img class="icono-ventanilla" src="../../../public/icons/ventanilla.png" alt="">
                <p>Ventanilla 1</p>
            </div>
        </div>
        <div class="row justify-content-center mt-8">
            <button class="boton-sencillo">Atender Nuevo Turno</button>
        </div>
        <div class="row justify-content-between mt-12">
            <div class="col-md-1 col-12"></div>
            <div class="col-md-5 col-12 mt-4">
                <div class="card-turno-2">
                    <div class="card-turno-titulo-2">
                        <p>Turno en Atención</p>
                    </div>
                    <div class="card-turno-body-2">
                        <p>T528</p>
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
                                <p>T529</p>
                            </div>
                            <div class="turno-siguiente mb-4">
                                <p>T530</p>
                            </div>
                            <div class="turno-siguiente mb-4">
                                <p>T531</p>
                            </div>
                        </div>
                        <div class="col-6 columna-turnos columna-turnos-right mb-2">
                            <div class="turno-siguiente mb-4">
                                <p>T532</p>
                            </div>
                            <div class="turno-siguiente mb-4">
                                <p>T533</p>
                            </div>
                            <div class="turno-siguiente mb-4">
                                <p>T534</p>
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
    import { defineComponent } from "vue";

    export default defineComponent({
        name: 'ventanilla',
        data() {
            return {

            }
        },
        computed: {
            user() {
                return this.$store.getters.user
            },
            currentRoute() {
                return this.$route.name
            }
        }
    })
</script>