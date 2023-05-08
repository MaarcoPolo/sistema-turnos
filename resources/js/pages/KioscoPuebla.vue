<template>
    <div class="container-fluid kiosco-body">
        <div class="custom-title-div-normal-2 row justify-content-between">
            <div class="">
                <p class="custom-title-page-2"></p>
            </div>
        </div>
        <div class="pt-6">
            <img class="division" src="../../../public/img/solicitar-turno-division.png" alt="">
            <div class="row justify-content-between">
                <div class="col-md-6 col-12">
                    <img class="boton-generar-turno" src="../../../public/img/generar-turno.png" alt="" @click="generarTurno()">
                </div>
                <div class="col-md-6 col-12">
                    <img class="boton-generar-turno" src="../../../public/img/generar-turno-sala.png" alt="" @click="generarTurno()">
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-md-6 col-12">
                    <img class="boton-generar-turno" src="../../../public/img/generar-turno-interno.png" alt="" @click="generarTurno()">
                </div>
                <div class="col-md-6 col-12">
                    <img class="boton-generar-turno" src="../../../public/img/atencion-rapida.png" alt="" @click="generarTurno()">
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-md-6 col-12">
                    <img class="boton-generar-turno" src="../../../public/img/generar-turno-demanda.png" alt="" @click="generarTurno()">
                </div>
                <div class="col-md-6 col-12">
                    <img class="boton-generar-turno" src="../../../public/img/oral-familiar.png" alt="" @click="generarTurno()">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from "vue";

    export default defineComponent({
        name: 'kiosco-puebla',
        methods: {
            generarTurno() {
                this.$router.push('/imprimir-turno-puebla')
            }
        }
    })
</script>