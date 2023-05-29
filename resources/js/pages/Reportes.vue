<template>
    <div class="container-fluid">
        <div class="custom-title-div-normal row justify-content-between">
            <div class="">
                <p class="custom-title-page">Reportes</p>
            </div>
        </div>
        <div class="container mt-8">
            <div class="row justify-content-around mt-4">
                <div class="col-md-3 col-12 text-center mt-2" v-if="this.user.user.casa_justicia_id == 1 || this.user.user.tipo_usuario_id == 1">
                    <BotonCatalogo nombre_icon="usuarios.png" nombre_catalogo="Puebla" @click="generarReporte(1)" />
                </div>
                <div class="col-md-3 col-12 text-center mt-2" v-if="this.user.user.casa_justicia_id == 2 || this.user.user.tipo_usuario_id == 1">
                    <BotonCatalogo nombre_icon="usuarios.png" nombre_catalogo="Cholula" @click="generarReporte(2)" />
                </div>
                <div class="col-md-3 col-12 text-center mt-2" v-if="this.user.user.casa_justicia_id == 3 || this.user.user.tipo_usuario_id == 1">
                    <BotonCatalogo nombre_icon="usuarios.png" nombre_catalogo="Huejotzingo" @click="generarReporte(3)" />
                </div>
                <!-- <div class="col-md-3 col-12 text-center mt-2">
                    <BotonCatalogo nombre_icon="usuarios.png" nombre_catalogo="Puebla" @click="generarReporte()" />
                </div> -->
            </div>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import BotonCatalogo from '../components/BotonCatalogo.vue'
    
    export default defineComponent({
        name: 'reportes',
        data() {
            return {
                variables_reporte: {
                    id_sede: 1,
                }
            }
        },
        components: {
            BotonCatalogo,
        },
        computed:{
            user() {
                return this.$store.getters.user
            },
        },
        methods: {
            async generarReporte(id_sede) {
                this.variables_reporte.id_sede = id_sede
                try {
                    let response = await axios.post('/api/reportes/generar-reporte-tiempo-real', this.variables_reporte, {
                        responseType: 'arraybuffer'
                    }).then((response) => {
                        let blob = new Blob([response.data], { type: 'application/pdf' })
                        let link = document.createElement('a')
                        link.href = window.URL.createObjectURL(blob)
                        link.download = `Reporte_Turnos_Oficialia.pdf`
                        link.click()
                    })
                } catch (error) {
                    
                }
            }
        }
    })
</script>