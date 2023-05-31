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
                    <img class="boton-generar-turno" src="../../../public/img/generar-turno.png" alt="" @click="generarTurno(1)">
                </div>
                <div class="col-md-6 col-12">
                    <img class="boton-generar-turno" src="../../../public/img/generar-turno-demanda.png" alt="" @click="generarTurno(5)">
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-md-6 col-12">
                    <img class="boton-generar-turno" src="../../../public/img/oral-familiar.png" alt="" @click="generarTurno(6)">
                </div>
                <div class="col-md-6 col-12">
                    <!-- <img class="boton-generar-turno" src="../../../public/img/atencion-rapida.png" alt="" @click="generarTurno(4)"> -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from "vue"
    import { errorSweetAlert, successSweetAlert } from "../helpers/sweetAlertGlobals"

    export default defineComponent({
        name: 'kiosco-cholula',
        data(){
            return{
                turno:{
                    tipo_turno_id: null,
                    casa_justicia_id: 2,
                }
                    
                
                
            }
        },
        methods: {
           async generarTurno(turno) {
                this.turno.tipo_turno_id = turno;
                // console.log(this.turno)
                try {
                        let response = await axios.post('/api/generar-turno', this.turno)
                        if (response.status === 200) {
                            if (response.data.status === "ok") {
                                this.$store.commit('setTurnoGenerado',response.data.turno)
                                // console.log(this.$store.state.turno.turnoGenerado)
                                // successSweetAlert(response.message)
                                this.$router.push('/imprimir-turno-cholula')
                                
                                } else {
                                errorSweetAlert(`${response.value.data.message}<br>Error: ${response.value.data.error}<br>Location: ${response.value.data.location}<br>Line: ${response.value.data.line}`)
                            }
                        } else {
                        errorSweetAlert('Ocurrió un error al generar el turno.')
                        }
                    } catch (error) {
                                errorSweetAlert('Ocurrió un error al generar el turno.')
                    }
            }
           
            
        }
    })
</script>