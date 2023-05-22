<template>
    <div class="container-fluid">
        <div class="custom-title-div-normal row justify-content-between">
            <div class="">
                <p class="custom-title-page">Administrar Ventanillas</p>
            </div>
        </div>
        <div class="row justify-content-around mt-10 mx-2">
            <div class="col-md-6 col-12">
                <div class="home-main-card p-4">
                    <div class="card-titulo-administrar-ventanillas my-6">
                        <img class="icono-administrar-ventanillas" src="../../../public/icons/turno.png" alt="">
                        <p>Total de turnos por atender</p>
                    </div>
                    <div v-if="user.user.tipo_usuario_id == 1" class="col-6 p-2">
                        <div class="div-custom-input-caja">
                            <label for="select_nombre">Casa de Justicia:</label>
                            <select v-model="sede" name="select_casa_justicia" class="form-control minimal custom-select text-uppercase">
                                <option  v-for="item in sedes" :key="item.id" :value="item.id">{{item.nombre}}</option>
                            </select>
                            <!-- <p class="text-validation-red" v-if="v$.form.sede.$error">*Campo obligatorio</p> -->
                        </div>
                    </div>
                    <!-- SUPERADMINISTRADOR /ADMINISTRADOR PUEBLA-->
                    <template v-if="user.user.tipo_usuario_id == 1 || user.user.tipo_usuario_id == 2 && user.user.casa_justicia_id == 1">
                        <div class="row justify-content-between mt-6">
                            <div class="col-md-4 col-12 mt-6">
                                <div class="card-tipo-turno">
                                    <div class="card-tipo-turno-body">
                                        <p>{{turnos}}</p>
                                    </div>
                                    <div class="card-tipo-turno-titulo">
                                        <p>Turno</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-12 mt-6">
                                <div class="card-tipo-turno">
                                    <div class="card-tipo-turno-body">
                                        <p>{{ salas }}</p>
                                    </div>
                                    <div class="card-tipo-turno-titulo">
                                        <p>Sala</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-12 mt-6">
                                <div class="card-tipo-turno">
                                    <div class="card-tipo-turno-body">
                                        <p>{{ internos }}</p>
                                    </div>
                                    <div class="card-tipo-turno-titulo">
                                        <p>Interno</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-between mt-6">
                            <div class="col-md-4 col-12 mt-6">
                                <div class="card-tipo-turno">
                                    <div class="card-tipo-turno-body">
                                        <p>{{ demandas }}</p>
                                    </div>
                                    <div class="card-tipo-turno-titulo">
                                        <p>Demanda</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-12 mt-6">
                                <div class="card-tipo-turno">
                                    <div class="card-tipo-turno-body">
                                        <p>{{ rapidos }}</p>
                                    </div>
                                    <div class="card-tipo-turno-titulo">
                                        <p>A. Rápida</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-12 mt-6">
                                <div class="card-tipo-turno">
                                    <div class="card-tipo-turno-body">
                                        <p>{{ familiares }}</p>
                                    </div>
                                    <div class="card-tipo-turno-titulo">
                                        <p>O. Familiar</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                    <!-- ADMINISTRADOR CHOLULA -->
                    <template v-if="user.user.tipo_usuario_id == 2 && user.user.casa_justicia_id == 2">
                        <div class="row justify-content-between mt-6"></div>
                        <div class="row justify-content-between mt-6"></div>
                        <div class="row justify-content-between mt-6"></div>
                        <div class="row justify-content-between mt-6"></div>
                        <div class="row justify-content-between mt-6">
                            <div class="col-md-4 col-12 mt-6">
                                <div class="card-tipo-turno">
                                    <div class="card-tipo-turno-body">
                                        <p>{{ turnos }}</p>
                                    </div>
                                    <div class="card-tipo-turno-titulo">
                                        <p>Turno</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-12 mt-6">
                                <div class="card-tipo-turno">
                                    <div class="card-tipo-turno-body">
                                        <p>{{ demandas }}</p>
                                    </div>
                                    <div class="card-tipo-turno-titulo">
                                        <p>Demanda</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-12 mt-6">
                                <div class="card-tipo-turno">
                                    <div class="card-tipo-turno-body">
                                        <p>{{ familiares }}</p>
                                    </div>
                                    <div class="card-tipo-turno-titulo">
                                        <p>O. Familiar</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                    <!-- ADMINISTRADOR HUEJOTZINGO -->
                    <template v-if="user.user.tipo_usuario_id == 2 && user.user.casa_justicia_id == 3">
                        <div class="row justify-content-between mt-6"></div>
                        <div class="row justify-content-between mt-6"></div>
                        <div class="row justify-content-between mt-6"></div>
                        <div class="row justify-content-between mt-6"></div>
                        <div class="row justify-content-between mt-6">
                            <div class="col-md-6 col-12 mt-6">
                                <div class="card-tipo-turno-h">
                                    <div class="card-tipo-turno-body">
                                        <p>{{ turnos }}</p>
                                    </div>
                                    <div class="card-tipo-turno-titulo">
                                        <p>Turno</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12 mt-6">
                                <div class="card-tipo-turno-h">
                                    <div class="card-tipo-turno-body">
                                        <p>{{ demandas }}</p>
                                    </div>
                                    <div class="card-tipo-turno-titulo">
                                        <p>Demanda</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                    <!-- ADMINISTRADOR LABORALES -->
                    <template v-if="user.user.tipo_usuario_id == 2 && user.user.casa_justicia_id == 4">
                        <div class="row justify-content-between mt-6"></div>
                        <div class="row justify-content-between mt-6"></div>
                        <div class="row justify-content-between mt-6"></div>
                        <div class="row justify-content-between mt-6"></div>
                        <div class="row justify-content-between mt-6">
                            <div class="col-md-4 col-12 mt-6"></div>
                            <div class="col-md-4 col-12 mt-6">
                                <div class="card-tipo-turno-l">
                                    <div class="card-tipo-turno-body">
                                        <p>{{ turnos }}</p>
                                    </div>
                                    <div class="card-tipo-turno-titulo">
                                        <p>Turno</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-12 mt-6"></div>
                        </div>
                    </template>
                    <div class="row justify-content-between mt-6">
                        <div class="col-md-4 col-12 mt-6"></div>
                        <div class="col-md-4 col-12 mt-6"></div>
                        <div class="col-md-4 col-12 mt-6"></div>
                        <div class="col-md-4 col-12 mt-6"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="home-main-card p-4">
                    <div class="card-titulo-administrar-ventanillas my-6">
                        <img class="icono-administrar-ventanillas" src="../../../public/icons/ventanilla.png" alt="">
                        <p>Ventanillas</p>
                    </div>
                    <div class="container mt-10">
                        <div class="row justify-content-between">
                            <table class="table">
                                <thead class="head-ventanillas">
                                    <tr>
                                        <th class="title-table-ventanillas">Ventanilla</th>
                                        <th class="title-table-ventanillas">Tipo Ventanilla</th>
                                        <th v-if="user.user.tipo_usuario_id == 1" class="title-table-ventanillas">Casa de Justicia</th>
                                        <th class="title-table-ventanillas">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="loading">
                                        <th colspan="3">
                                            <p class="text-center text-loading-data-table">Cargando datos...</p>
                                            <div class="linear-activity">
                                                <div class="indeterminate"></div>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr v-else v-for="ventanilla in datosPaginados" :key="ventanilla.id">
                                        <td class="data-table-ventanillas">
                                            {{ventanilla.nombre}}
                                        </td>
                                        <td class="data-table-ventanillas">
                                            {{ventanilla.tipo_ventanilla}}
                                        </td>
                                        <td v-if="user.user.tipo_usuario_id == 1" class="data-table-ventanillas">
                                            {{ventanilla.sede}}
                                        </td>
                                        <td>
                                            <div class="text-center row justify-content-center">
                                                <div>
                                                    <v-icon
                                                        @click="abrirModalCambiarTipoVentanilla(ventanilla)"
                                                        class="icon-sync-ventanillas"
                                                        size="default"
                                                        >
                                                        mdi-sync
                                                    </v-icon>
    
                                                    <v-tooltip
                                                        activator="parent"
                                                        location="bottom"
                                                        >
                                                        <span style="font-size: 15px;">Cambiar Tipo de Atención</span>
                                                    </v-tooltip>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <template v-if="cajas && cajas.length > 0">
                                <div class="row justify-content-between container m-auto">
                                    <div class="m-auto">
                                        <p class="text-results-ventanillas mt-2">
                                            Mostrando
                                            <span>{{from}}</span>
                                            -
                                            <span>{{to}}</span>
                                            de
                                            <span>{{cajas.length}}</span>
                                            resultados
                                        </p>
                                    </div>
                                    <div class="m-auto">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination pagination-lg justify-content-center">
                                                <li class="page-item cursor-paginator" @click="getFirstPage()">
                                                    <a class="page-link" aria-label="Previous">
                                                        <span aria-hidden="true">&lt;&lt;</span>
                                                        <span class="sr-only">First</span>
                                                    </a>
                                                </li>
                                                <li class="page-item cursor-paginator" @click="getPreviousPage()">
                                                    <a class="page-link" aria-label="Previous">
                                                        <span aria-hidden="true">&lt;</span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                </li>
                                                <li v-for="pagina in pages" @click="getDataPagina(pagina), setCurrentPage(pagina)" :key="pagina" class="page-item cursor-paginator" :class="isActive(pagina)">
                                                    <a class="page-link">
                                                        {{pagina}}
                                                    </a>
                                                </li>
                                                <li class="page-item cursor-paginator" @click="getNextPage()">
                                                    <a class="page-link" aria-label="Next">
                                                        <span aria-hidden="true">&gt;</span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </li>
                                                <li class="page-item cursor-paginator" @click="getLastPage()">
                                                    <a class="page-link" aria-label="Next">
                                                        <span aria-hidden="true">&gt;&gt;</span>
                                                        <span class="sr-only">Last</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </template>
                            <template v-else-if="!loading">
                                <div class="text-center">
                                    <p class="no-data-text">No hay ventanillas disponibles</p>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- INICIO MODAL CAMBIAR TIPO DE VENTANILLA -->
        <v-dialog v-model="modalCambiarTipoVentanilla" max-width="50rem" persistent>
            <v-card>
                <v-card-text>
                    <div class="text-center my-4 custom-border">
                        <div class="custom-subtitle">
                            <p>Cambiar Tipo de Ventanilla</p>
                        </div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-12">
                            <div class="div-custom-input-ventanilla">
                                <label for="input_num_oficio">Ventanilla:</label>
                                <input disabled id="input_num_oficio" type="text" class="form-control" v-model="form_ventanilla.nombre" autocomplete="off">
                                <!-- <p class="text-validation-red" v-if="v$.form.num_oficio.$error">*Campo obligatorio</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-between mt-5">
                        <div class="col-12">
                            <div class="div-custom-select-audiencia">
                                <label for="select_num_oficio">Tipo de Ventanilla:</label>
                                <select name="select_tipo_usuario" class="form-control minimal custom-select text-uppercase" v-model="form_ventanilla.tipo_ventanilla">
                                    <option  v-for="item in tiposVentanillas" :key="item.id" :value="item.id">{{item.nombre}}</option>
                                </select>
                                <!-- <p class="text-validation-red" v-if="v$.form.tipo_documento.$error">*Campo obligatorio</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="text-center mb-4 mt-6">
                        <v-btn
                            class="custom-button mr-2"
                            color="#c4f45d"
                            @click="guardarCambiosVentanilla()"
                            >
                            Guardar
                        </v-btn>
                        <v-btn
                            class="custom-button ml-2"
                            color="#6a73a0"
                            @click="cerrarModalCambiarTipoVentanilla()"
                            >
                            Cancelar
                        </v-btn>
                    </div>
                </v-card-text>
            </v-card>
        </v-dialog>
        <!-- FIN MODAL CAMBIAR TIPO DE VENTANILLA -->
    </div>
</template>

<script>
    import { defineComponent } from "vue";
    import { errorSweetAlert, successSweetAlert, warningSweetAlert } from "../helpers/sweetAlertGlobals"

    export default defineComponent({
        name: 'home',
        data() {
            return {
                loading: false,
                elementosPorPagina: 5,
                paginaActual: 1,
                datosPaginados: [],
                mostrar: false,
                from: '',
                to: '',
                numShown: 5,
                current: 1,
                buscar: '',
                
                modalCambiarTipoVentanilla: false,
                form_ventanilla: {
                    id: null,
                    nombre: '',
                    tipo_ventanilla: '',
                },
                usuario:{
                    tipo: null,
                    sede: null,

                },
                turnos: 0,
                salas: 0,
                internos: 0,
                rapidos: 0,
                demandas: 0,
                familiares: 0,
                sede: null,


             
            }
        },
        created() {
            this.getTurnosPendientes()
            this.getCajas()
            this.getCatalogoTiposTurnos()
            this.getCasasJusticia()
           
        },
        computed: {
            pages() {
                const numShown = Math.min(this.numShown, this.totalPaginas())
                let first = this.current - Math.floor(numShown / 2)
                first = Math.max(first, 1)
                first = Math.min(first, this.totalPaginas() - numShown + 1)
                return [...Array(numShown)].map((k, i) => i + first)
            },
            user() {
                return this.$store.getters.user
            },
            currentRoute() {
                return this.$route.name
            },
            cajas() {
                return this.$store.getters.getCajas
            },
            tiposVentanillas() {
                return this.$store.getters.getCatalogoTiposTurnos
            },
            sedes() {
                return this.$store.getters.getCasasJusticia
            },
           
        },
        watch: {
            'sede': function () {
                this.usuario.sede = this.sede
                // console.log(this.usuario)
                this.getTurnosPendientes()
            },
            buscar: function () {
                // if (!this.buscar.length == 0) {
                //     this.datosPaginados = this.ventanillas.filter(item => {
                //         return item.num_oficio.toLowerCase().includes(this.buscar.toLowerCase())
                //         || item.descripcion.toLowerCase().includes(this.buscar.toLowerCase())
                //         || item.tipo_documento.toLowerCase().includes(this.buscar.toLowerCase())
                //         || item.fecha_oficio.toLowerCase().includes(this.buscar.toLowerCase())
                //         || item.estatus.toLowerCase().includes(this.buscar.toLowerCase())
                //         || item.area.toLowerCase().includes(this.buscar.toLowerCase())
                //     })
                // } else {
                //     this.getDataPagina(1)
                // }
            },
            mostrar: function () {
                if (this.mostrar) {
                    this.getDataPagina(1)
                }
            },
        },
        methods: {
            async getTurnosPendientes() {
               
                try {
                    if(this.user.user.tipo_usuario_id == 2){
                        this.usuario.sede = this.user.user.casa_justicia_id
                    }
                    // this.usuario.tipo = this.user.user.tipo_usuario_id
                    
                    let response = await axios.post('/api/turnos-pendientes', this.usuario)
                    if (response.status === 200) {
                        if (response.data.status === "ok") {
                            this.turnos = response.data.pendientes.turnos
                            this.salas = response.data.pendientes.salas
                            this.internos = response.data.pendientes.internos
                            this.rapidos = response.data.pendientes.rapidos
                            this.demandas = response.data.pendientes.demandas
                            this.familiares = response.data.pendientes.familiares
                          
                        } else {
                            errorSweetAlert(`${response.data.message}<br>Error: ${response.data.error}<br>Location: ${response.data.location}<br>Line: ${response.data.line}`)
                        }
                    } else {
                        errorSweetAlert('Ocurrió un error al obtener los turnos pendientes')
                    }
                } catch (error) {
                    errorSweetAlert('Ocurrió un error al obtener los turnos pendientes')
                }
                
            },
            async getCasasJusticia() {
                try {
                    let response = await axios.get('/api/casas-justicia')
                    if (response.status === 200) {
                        if (response.data.status === "ok") {
                            this.$store.commit('setCasasJusticia', response.data.sedes)
                        } else {
                            errorSweetAlert(`${response.data.message}<br>Error: ${response.data.error}<br>Location: ${response.data.location}<br>Line: ${response.data.line}`)
                        }
                    } else {
                        errorSweetAlert('Ocurrió un error al obtener las casas de justicia')
                    }
                } catch (error) {
                    errorSweetAlert('Ocurrió un error al obtener las casas de justicia')
                }
            },
            async getCajas() {
                this.loading = true
                try {
                    this.usuario.tipo = this.user.user.tipo_usuario_id
                    this.usuario.sede = this.user.user.casa_justicia_id
                    let response = await axios.post('/api/cajas', this.usuario)
                    if (response.status === 200) {
                        if (response.data.status === "ok") {
                            this.$store.commit('setCajas', response.data.cajas)
                            this.mostrar = true
                        } else {
                            errorSweetAlert(`${response.data.message}<br>Error: ${response.data.error}<br>Location: ${response.data.location}<br>Line: ${response.data.line}`)
                        }
                    } else {
                        errorSweetAlert('Ocurrió un error al obtener las Ventanillas')
                    }
                } catch (error) {
                    errorSweetAlert('Ocurrió un error al obtener las Ventanillas')
                }
                this.loading = false
            },
            async getCatalogoTiposTurnos() {
                try {
                    let response = await axios.get('/api/tipos-turnos')
                    if (response.status === 200) {
                        if (response.data.status === "ok") {
                            this.$store.commit('setCatalogoTiposTurnos', response.data.tipos_turnos)
                        } else {
                            errorSweetAlert(`${response.data.message}<br>Error: ${response.data.error}<br>Location: ${response.data.location}<br>Line: ${response.data.line}`)
                        }
                    } else {
                        errorSweetAlert('Ocurrió un error al obtener los tipos de turnos')
                    }
                } catch (error) {
                    errorSweetAlert('Ocurrió un error al obtener los tipos de turnos')
                }
            },
           
            abrirModalCambiarTipoVentanilla(ventanilla) {
                this.form_ventanilla.id = ventanilla.id
                this.form_ventanilla.nombre = ventanilla.nombre
                this.form_ventanilla.tipo_ventanilla = ventanilla.tipo_id
                this.modalCambiarTipoVentanilla = true
            },
            cerrarModalCambiarTipoVentanilla() {
                this.modalCambiarTipoVentanilla = false
            },
            async guardarCambiosVentanilla() {
                // const isFormCorrect = await this.v$.editar.$validate()              
                // if (!isFormCorrect) return
                // console.log(this.form_ventanilla)
                    Swal.fire({
                        title: '¿Guardar cambios?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085D6',
                        cancelButtonColor: '#D33',
                        confirmButtonText: 'Si, guardar',
                        cancelButtonText: 'Cancelar',
                        showLoaderOnConfirm: true,
                        preConfirm: async () => {
                            try {
                                let response = await axios.post('/api/cajas/actualizar-tipo-caja', this.form_ventanilla)
                                return response
                            } catch (error) {
                                errorSweetAlert('Ocurrió un error al actualizar el tipo de Ventanilla.')
                            }
                        },
                        allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                        if (result.isConfirmed) {
                            if (result.value.status === 200) {
                                if (result.value.data.status === "ok") {
                                    successSweetAlert(result.value.data.message)
                                    this.$store.commit('setCajas', result.value.data.cajas)
                                    this.cerrarModalCambiarTipoVentanilla()
                                    this.getDataPagina(1)
                                }else {
                                    errorSweetAlert(`${result.value.data.message}<br>Error: ${result.value.data.error}<br>Location: ${result.value.data.location}<br>Line: ${result.value.data.line}`)
                                }
                            } else {
                                errorSweetAlert('Ocurrió un error al actualizar el tipo de Ventanilla.')
                            }
                        }
                    })
              
           },
            totalPaginas() {
                return Math.ceil(this.cajas.length / this.elementosPorPagina)
            },
            getDataPagina(noPagina) {
                this.paginaActual = noPagina
                this.datosPaginados = []

                let ini = (noPagina * this.elementosPorPagina) - this.elementosPorPagina
                let fin = (noPagina * this.elementosPorPagina)

                for (let index = ini; index < fin; index++) {
                    if (this.cajas[index]) {
                        this.datosPaginados.push(this.cajas[index])
                    }
                }

                // Para el texto "Mostrando 1 - 10 de 20 resultados"
                this.from = ini+1
                if (noPagina < this.totalPaginas()) {
                    this.to = fin
                } else {
                    this.to = this.cajas.length
                }
            },
            getFirstPage() {
                this.paginaActual = 1
                this.setCurrentPage(this.paginaActual)
                this.getDataPagina(this.paginaActual)
            },
            getPreviousPage() {
                if (this.paginaActual > 1) {
                    this.paginaActual--
                }
                this.setCurrentPage(this.paginaActual)
                this.getDataPagina(this.paginaActual)
            },
            getNextPage() {
                if (this.paginaActual < this.totalPaginas()) {
                    this.paginaActual++
                }
                this.setCurrentPage(this.paginaActual)
                this.getDataPagina(this.paginaActual)
            },
            getLastPage() {
                this.paginaActual = this.totalPaginas()
                this.setCurrentPage(this.paginaActual)
                this.getDataPagina(this.paginaActual)
            },
            isActive (noPagina) {
                return noPagina == this.paginaActual ? 'active' : ''
            },
            setCurrentPage(pagina) {
                this.current = pagina
            },
        }
    })
</script>