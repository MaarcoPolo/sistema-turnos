<template>
    <div class="container-fluid">
        <div class="custom-title-div-normal row justify-content-between">
            <div class="">
                <p class="custom-title-page">Reportes</p>
            </div>
        </div>
        <div class="container mt-8">
            <div class="row justify-content-between mt-4">
                <div class="col-md-3 col-12 text-center mt-2">
                    <BotonCatalogo nombre_icon="usuarios.png" nombre_catalogo="Puebla" @click="generarReporte()" />
                </div>
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

                }
            }
        },
        components: {
            BotonCatalogo,
        },
        methods: {
            async generarReporte() {
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