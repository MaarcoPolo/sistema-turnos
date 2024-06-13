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
                    <BotonCatalogo v-if="!loading_1" nombre_icon="usuarios.png" nombre_catalogo="Puebla" @click="generarReporte(1)" />
                    <span v-else class="loader-reportes"></span>
                </div>
                <div class="col-md-3 col-12 text-center mt-2" v-if="this.user.user.casa_justicia_id == 2 || this.user.user.tipo_usuario_id == 1">
                    <BotonCatalogo v-if="!loading_2" nombre_icon="usuarios.png" nombre_catalogo="Cholula" @click="generarReporte(2)" />
                    <span v-else class="loader-reportes"></span>
                </div>
                <div class="col-md-3 col-12 text-center mt-2" v-if="this.user.user.casa_justicia_id == 3 || this.user.user.tipo_usuario_id == 1">
                    <BotonCatalogo v-if="!loading_3" nombre_icon="usuarios.png" nombre_catalogo="Huejotzingo" @click="generarReporte(3)" />
                    <span v-else class="loader-reportes"></span>
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
                    id_sede: 1,
                },
                loading_1: false,
                loading_2: false,
                loading_3: false,
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
                let sede_nombre
                switch (id_sede) {
                    case 1:
                        this.loading_1 = true
                        sede_nombre = 'Puebla'
                        break
                    case 2:
                        this.loading_2 = true
                        sede_nombre = 'Cholula'
                        break
                    case 3:
                        this.loading_3 = true
                        sede_nombre = 'Huejotzingo'
                        break
                }
                this.variables_reporte.id_sede = id_sede
                try {
                    let response = await axios.post('/api/reportes/generar-reporte-tiempo-real', this.variables_reporte, {
                        responseType: 'arraybuffer'
                    }).then((response) => {
                        let blob = new Blob([response.data], { type: 'application/pdf' })
                        let link = document.createElement('a')
                        link.href = window.URL.createObjectURL(blob)
                        link.download = `Reporte_Turnos_Oficialia_${sede_nombre}.pdf`
                        link.click()
                    })
                } catch (error) {
                    
                }
                this.loading_1 = false
                this.loading_2 = false
                this.loading_3 = false
            }
        }
    })
</script>