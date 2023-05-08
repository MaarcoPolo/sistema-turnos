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
                    <div class="card-turno-titulo">
                        <p>Nuevo Turno</p>
                    </div>
                    <div class="card-turno-body">
                        <p>T528</p>
                    </div>
                    <div class="row justify-content-between mt-6">
                        <div class="col-md-6 col-12">
                            <div class="custom-card-action" @click="imprimirTurno()">
                                <div class="custom-card-action-icon">
                                    <img src="../../../public/icons/imprimir.png" alt="">
                                </div>
                                <div class="">
                                    <v-btn
                                        class="custom-card-button"
                                        color="#c4f45d"
                                        >
                                        Imprimir
                                    </v-btn>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="custom-card-action" @click="volverKiosco()">
                                <div class="custom-card-action-icon">
                                    <img src="../../../public/icons/regresar.png" alt="">
                                </div>
                                <div class="">
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
    </div>
</template>

<script>
    import { defineComponent } from "vue";

    export default defineComponent({
        name: 'imprimir-turno-puebla',
        methods: {
            imprimirTurno() {
                console.log("Imprimiendo...")
            },
            volverKiosco() {
                this.$router.push('/kiosco-puebla')
            }
        }
    })
</script>