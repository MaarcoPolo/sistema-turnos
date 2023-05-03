<template>
    <div class="">
        <div class="custom-title-div-normal row justify-content-between">
            <div class="">
                <p class="custom-title-page">Catálogos</p>
            </div>
        </div>
        <div class="container mt-8">
            <div class="row justify-content-between mt-4">
                <div class="col-md-3 col-12 text-center mt-2">
                    <BotonCatalogo nombre_icon="usuarios.png" nombre_catalogo="Usuarios" @click="this.$router.push('/usuarios')" />
                </div>
                <div class="col-md-3 col-12 text-center mt-2">
                    <BotonCatalogo nombre_icon="usuarios.png" nombre_catalogo="Cajas" @click="this.$router.push('/cajas')" />
                </div>
                <div class="col-md-3 col-12 text-center">
                    <!-- <BotonCatalogo nombre_icon="materias.png" nombre_catalogo="Materias" @click="this.$router.push('/catalogo-materias')" /> -->
                </div>
                <div class="col-md-3 col-12 text-center">
                    <!-- <BotonCatalogo nombre_icon="salas.png" nombre_catalogo="Salas" @click="this.$router.push('/salas')" /> -->
                </div>
            </div>
            <div class="row justify-content-between mt-10">
                <!-- <div class="col-md-3 col-12 text-center">
                    <BotonCatalogo nombre_icon="jueces.png" nombre_catalogo="Jueces" @click="this.$router.push('/jueces')" />
                </div>
                <div class="col-md-3 col-12 text-center">
                    <BotonCatalogo nombre_icon="tipos-audiencias.png" nombre_catalogo="Tipos de Audiencias" @click="this.$router.push('/tipos-audiencias')" />
                </div>
                <div class="col-md-3 col-12 text-center">
                    <BotonCatalogo nombre_icon="logos.png" nombre_catalogo="Logos" @click="this.$router.push('/catalogo-logos')" />
                </div>
                <div class="col-md-3 col-12 text-center">
                    <BotonCatalogo nombre_icon="salas.png" nombre_catalogo="Expedientes" @click="this.$router.push('/catalogo-expedientillo')" />
                </div> -->
            </div>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from "vue";
    import BotonCatalogo from '../components/BotonCatalogo.vue'

    export default defineComponent({
        name: 'catalogos',
        components: {
            BotonCatalogo,
        }
    })
</script>