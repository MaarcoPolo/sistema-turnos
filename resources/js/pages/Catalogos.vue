<template>
    <div class="container-fluid">
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
                    <BotonCatalogo nombre_icon="usuarios.png" nombre_catalogo="Ventanillas" @click="this.$router.push('/cajas')" />
                </div>
                <div class="col-md-3 col-12 text-center"></div>
                <div class="col-md-3 col-12 text-center"></div>
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