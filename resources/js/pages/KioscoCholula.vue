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
                <div class="col-md-6 col-12 text-center div-boton-generar-turno">
                    <img v-if="!loader_1" class="boton-generar-turno" src="../../../public/img/generar-turno.png" alt="" @click="generarTurno(1)">
                    <span v-else class="loader"></span>
                </div>
                <div class="col-md-6 col-12 text-center div-boton-generar-turno">
                    <img v-if="!loader_5" class="boton-generar-turno" src="../../../public/img/generar-turno-demanda.png" alt="" @click="generarTurno(5)">
                    <span v-else class="loader"></span>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-md-6 col-12 text-center div-boton-generar-turno">
                    <img v-if="!loader_6" class="boton-generar-turno" src="../../../public/img/oral-familiar.png" alt="" @click="generarTurno(6)">
                    <span v-else class="loader"></span>
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
                },
                loader_1: false,
                loader_5: false,
                loader_6: false,    
                
                
            }
        },
        methods: {
           async generarTurno(turno) {
            switch (turno) {
                    case 1:
                        this.loader_1 = true
                        break
                    case 5:
                        this.loader_5 = true
                        break
                    case 6:
                        this.loader_6 = true
                        break
                }
                // console.log(this.turno)
                try {
                        this.turno.tipo_turno_id = turno;
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
                    this.loader_1 = false
                    this.loader_5 = false
                    this.loader_6 = false
            }
           
            
        }
    })
</script>