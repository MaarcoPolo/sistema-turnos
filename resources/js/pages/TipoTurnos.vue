<template>
    <div class="container-fluid">
        <div class="custom-title-div-normal row justify-content-between">
            <div class="">
                <p class="custom-title-page">Tipo de Turnos</p>
            </div>
        </div>
        <div class="container mt-6">
            <div class="row justify-content-between">
                    <div class="col-md-4 col-12"></div>
                    <div class="col-md-4 col-12"></div>
                    <div class="col-md-4 col-12 row justify-content-between">
                        <div class="col-md-3 col-12"></div>
                        <div class="col-md-9 col-12 div-custom-button-filter-normal">
                            <v-btn
                                class="custom-button"
                                block
                                color="#c4f45d"
                                @click="abrirModalNuevoTipoTurno()"
                                >
                                Nuevo Tipo de Turno
                            </v-btn>
                        </div>
                    </div>
            </div>
            <!-- INICIO FILTROS Y BUSCADOR -->
            <div class="row justify-content-between mt-8">
                <div class="col-md-4 col-12">
                    <v-btn class="boton-regresar" variant="text" prepend-icon="mdi-arrow-left" @click="this.$router.push('/catalogos')">Regresar</v-btn>
                </div>
                <div class="col-md-4 col-12">
                </div>
                <div class="col-md-4 col-12">
                    <div class="principal-div-custom-select">
                        <div class="first-div-custom-select">
                            <img src="../../../public/icons/buscar.png" alt="">
                        </div>
                        <div class="second-div-custom-select">
                            <input v-model="buscar" placeholder="Buscar..." type="search" autocomplete="off" class="form-control custom-input">
                        </div>
                    </div>
                </div>
            </div>
            <!--INICIO DE LA TABLA-->
            <div class="my-2 mb-12 py-6">
                <div class="">
                    <div class="row justify-content-between">
                        <table class="table custom-border-table">
                            <thead class="headers-table">
                                <tr>
                                    <th class="custom-title-table">Id</th>
                                    <th class="custom-title-table">Nombre</th>
                                    <th class="custom-title-table">Nomenclatura</th>
                                    <th class="custom-title-table">Descripción</th>
                                    <th class="custom-title-table">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="loading">
                                    <th colspan="5">
                                        <p class="text-center text-loading-data-table">Cargando datos...</p>
                                        <div class="linear-activity">
                                            <div class="indeterminate"></div>
                                        </div>
                                    </th>
                                </tr>
                                <tr v-else v-for="tipos_turnos in datosPaginados" :key="tipos_turnos.id">
                                    <td class="custom-data-table">
                                        {{tipos_turnos.num_registro}}
                                    </td>
                                    <td class="custom-data-table text-uppercase">
                                        {{tipos_turnos.nombre}}
                                    </td>
                                    <td class="custom-data-table text-uppercase">
                                        {{tipos_turnos.nomenclatura}}
                                    </td>
                                    <td class="custom-data-table text-uppercase">
                                        {{tipos_turnos.descripcion}}
                                    </td>
                                    <td>
                                        <div class="text-center row justify-content-center">
                                            <div>
                                                <v-icon 
                                                    @click="abrirModalEditarTipoTurno(tipo_turno)"
                                                    class="mr-1"
                                                    >
                                                    mdi-text-box-edit-outline
                                                </v-icon>
    
                                                <v-tooltip
                                                    activator="parent"
                                                    location="bottom"
                                                    >
                                                    <span style="font-size: 15px;">Editar Tipo de Turno</span>
                                                </v-tooltip>
                                            </div>
                                            <div>
                                                <v-icon
                                                    @click="eliminarTipoTurno(tipo_turno)"
                                                    class="ml-1"
                                                    
                                                    >
                                                    mdi-account-off
                                                </v-icon>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <template v-if="tiposTurnos && tiposTurnos.length > 0">
                            <div class="row justify-content-between container">
                                <div>
                                    <p class="custom-text-show-results mt-2">
                                        Mostrando
                                        <span>{{from}}</span>
                                        -
                                        <span>{{to}}</span>
                                        de
                                        <span>{{tiposTurnos.length}}</span>
                                        resultados
                                    </p>
                                </div>
                                <div>
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
                                <p class="no-data-text">No hay tipos de turnos disponibles</p>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>

        <!-- INICIO MODAL AGREGAR NUEVA CAJA-->
        <v-dialog v-model="dialogNuevoTipoTurno" max-width="50rem" persistent>
            <v-card>
                <v-card-text>
                    <div class="text-center my-8 custom-border">
                        <div class="custom-subtitle">
                            <p>Nuevo tipo de turno</p>
                        </div>
                    </div>
                    <div class="row justify-content-between mt-5">
                        <div class="col-12">
                            <div class="div-custom-input-caja">
                                <label for="input_nombre">Nombre del tipo de turno:</label>
                                <input id="input_nombre" type="text" class="form-control minimal custom-input text-uppercase" v-model="v$.form.nombre.$model">
                                <p class="text-validation-red" v-if="v$.form.nombre.$error">*Campo obligatorio</p>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="div-custom-input-caja">
                                <label for="input_nomenclatura">Nomenclatura:</label>
                                <input id="input_nomenclatura" type="text" class="form-control minimal custom-input text-uppercase" v-model="v$.form.nomenclatura.$model">
                                <p class="text-validation-red" v-if="v$.form.nomenclatura.$error">*Campo obligatorio</p>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="div-custom-input-caja">
                                <label for="input_descripcion">Descripción:</label>
                                <input id="input_descripcion" type="text" class="form-control minimal custom-input text-uppercase" v-model="form.descripcion">
                            </div>
                        </div>
                    </div>
                    <div class="text-center mb-4 mt-6">
                        <v-btn
                            
                            class="custom-button mr-2"
                            color="#c4f45d"
                            @click="guardarNuevoTipoTurno()"
                            >
                            Guardar
                        </v-btn>
                        <v-btn
                            class="custom-button ml-2"
                            color="#6a73a0"
                            @click="cerrarModalNuevoTipoTurno()"
                            >
                            Cancelar
                        </v-btn>
                    </div>
                </v-card-text>
            </v-card>
        </v-dialog>

        <!-- INICIO MODAL EDITAR CAJA-->
        <v-dialog v-model="dialogEditarTipoTurno" max-width="50rem" persistent>
            <v-card>
                <v-card-text>
                    <div class="text-center my-8 custom-border">
                        <div class="custom-subtitle">
                            <p>Editar el tipo de turno</p>
                        </div>
                    </div>
                    <div class="">
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-12 mt-4">
                            <div class="div-custom-input-caja">
                                <label for="input_nombre">Nombre:</label>
                                <input id="input_nombre" autocomplete="off"  class="form-control" v-model="v$.editar.nombre.$model">
                                <p class="text-validation-red" v-if="v$.editar.nombre.$error">*Campo obligatorio</p>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="div-custom-input-caja">
                                <label for="input_nomenclatura">Nomenclatura:</label>
                                <input id="input_nomenclatura" type="text" class="form-control minimal custom-input text-uppercase" v-model="v$.editar.nomenclatura.$model">
                                <p class="text-validation-red" v-if="v$.editar.nomenclatura.$error">*Campo obligatorio</p>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="div-custom-input-caja">
                                <label for="input_descripcion">Descripción:</label>
                                <input id="input_descripcion" type="text" class="form-control minimal custom-input text-uppercase" v-model="editar.descripcion">
                            </div>
                        </div>
                    </div>
                    <div class="text-center mb-4 mt-6">
                        <v-btn
                            
                            class="custom-button mr-2"
                            color="#c4f45d"
                            @click="guardarCambiosEditarTipoTurno()"
                            >
                            Guardar
                        </v-btn>
                        <v-btn
                            class="custom-button ml-2"
                            color="#6a73a0"
                            @click="cerrarModalNuevoTipoTurno()"
                            >
                            Cancelar
                        </v-btn>
                    </div>
                </v-card-text>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
    import { defineComponent } from "vue";
    import { errorSweetAlert, successSweetAlert, warningSweetAlert } from "../helpers/sweetAlertGlobals"
    //@vuelidate para que funcione hay que instalar un plugging, ir a package.json y agregar
        // "@vuelidate/core": "^2.0.0",
        // "@vuelidate/validators": "^2.0.0",
    // agregar en dependencies y despues hacer un npm install y correr el servidor para que funcione
    import useValidate from '@vuelidate/core' 
    import { required} from '@vuelidate/validators'

    export default defineComponent({
        name: 'TipoTurnos',
        data(){
            return{
                showNav: false,
                loading: false,
                elementosPorPagina: 10,
                paginaActual: 1,
                datosPaginados: [],
                mostrar: false,
                from: '',
                to: '',
                numShown: 5,
                current: 1,
                buscar: '',
                dialogNuevoTipoTurno: false,
                dialogEditarTipoTurno: false,
                form:{
                    id:null,
                    nombre:'',
                    nomenclatura:null,
                    descripcion:null,
                },
                editar:{
                    id:null,
                    nombre:'',
                    nomenclatura:null,
                    descripcion:null
                },
            }
        },
        setup(){
            return{
                v$: useValidate()
            }
        },
        validations(){
                return{
                    form:{
                        nombre:{
                            required
                        },
                        nomenclatura:{
                            required
                        }, 
                    },
                    editar:{
                        nombre:{
                            required
                        },
                        nomenclatura:{
                            required
                        }
                    }
                }
        },
    created(){
        this.getCatalogoTiposTurnos()
    },
    computed:{
        pages(){
            const numShown = Math.min(this.numShown, this.totalPaginas())
            let first = this.current - Math.floor(numShown / 2)
            first = Math.max(first, 1)
            first = Math.min(first, this.totalPaginas() - numShown + 1)
            return [...Array(numShown)].map((k, i) => i + first)
        },
        tiposTurnos(){
                return this.$store.getters.getCatalogoTiposTurnos
        },
        currentRoute(){
            return this.$route.name
        },

    },
    watch:{
        buscar: function(){
            if(!this.buscar.length == 0){
                this.datosPaginados = this.tiposTurnos.filter(item => {
                    return item.nombre.toLowerCase().includes(this.buscar.toLowerCase())
                    || item.nomenclatura.toLowerCase().includes(this.buscar.toLowerCase())
                    || item.descripcion.toLowerCase().includes(this.buscar.toLowerCase())
                })
            }else{
                this.getDataPagina(1)
            }
        },
        mostrar: function(){
            if(this.mostrar){
                this.getDataPagina(1)
            }
        },
    },
    methods:{
            logout(){
                this.$store.dispatch('logout')
            },
            totalPaginas(){
                return Math.ceil(this.tiposTurnos.length / this.elementosPorPagina)
            },
            getDataPagina(noPagina){
                this.paginaActual = noPagina
                this.datosPaginados = []

                let ini = (noPagina * this.elementosPorPagina) - this.elementosPorPagina
                let fin = (noPagina * this.elementosPorPagina)

                for(let index = ini; index < fin; index++){
                    if(this.tiposTurnos[index]){
                        this.datosPaginados.push(this.tiposTurnos[index])
                    }
                }

                // Para el texto "Mostrando 1 - 10 de 20 resultados"
                this.from = ini+1
                if(noPagina < this.totalPaginas()){
                    this.to = fin
                }else{
                    this.to = this.tiposTurnos.length
                }
            },
            getFirstPage(){
                this.paginaActual = 1
                this.setCurrentPage(this.paginaActual)
                this.getDataPagina(this.paginaActual)
            },
            getPreviousPage(){
                if(this.paginaActual > 1){
                    this.paginaActual--
                }
                this.setCurrentPage(this.paginaActual)
                this.getDataPagina(this.paginaActual)
            },
            getNextPage(){
                if(this.paginaActual < this.totalPaginas()){
                    this.paginaActual++
                }
                this.setCurrentPage(this.paginaActual)
                this.getDataPagina(this.paginaActual)
            },
            getLastPage(){
                this.paginaActual = this.totalPaginas()
                this.setCurrentPage(this.paginaActual)
                this.getDataPagina(this.paginaActual)
            },
            isActive(noPagina){
                return noPagina == this.paginaActual ? 'active' : ''
            },
            setCurrentPage(pagina){
                this.current = pagina
            },
            abrirModalNuevoTipoTurno(){
                this.dialogNuevoTipoTurno = true
            },
            async getCatalogoTiposTurnos(){
                try {
                    let response = await axios.get('/api/tipos-turnos')
                    if(response.status === 200){
                        if(response.data.status === "ok"){
                            this.$store.commit('setCatalogoTiposTurnos', response.data.tipos_turnos)
                            this.mostrar = true
                        }else{
                            errorSweetAlert(`${response.data.message}<br>Error: ${response.data.error}<br>Location: ${response.data.location}<br>Line: ${response.data.line}`)
                        }
                    }else{
                        errorSweetAlert('Ocurrió un error al obtener los tipos de turnos')
                    }
                }catch(error){
                    errorSweetAlert('Ocurrió un error al obtener los tipos de turnos')
                }
            },
            cerrarModalNuevoTipoTurno(){
                this.dialogNuevoTipoTurno = false
                this.dialogEditarTipoTurno = false
                this.form.nombre = ''
                this.form.nomenclatura = ''
                this.form.descripcion = ''
            },
            abrirModalEditarTipoTurno(tipos_turnos){
            console.log(tipos_turnos);

                this.dialogEditarTipoTurno = true 
                this.editar.id = tipos_turnos.id
                this.editar.nombre = tipos_turnos.nombre
                this.editar.nomenclatura = tipos_turnos.nomenclatura
                this.editar.descripcion = tipos_turnos.descripcion

            },
            async guardarNuevoTipoTurno(){

                const isFormCorrect = await this.v$.form.$validate()              
                if(!isFormCorrect) return
                Swal.fire({
                    title: '¿Guardar nuevo Tipo de Turno?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085D6',
                    cancelButtonColor: '#D33',
                    confirmButtonText: 'Si, guardar',
                    cancelButtonText: 'Cancelar',
                    showLoaderOnConfirm: true,
                    preConfirm: async()=>{
                        try{
                                this.loading = true
                                let response = await axios.post('/api/tipos-turnos/crear-tipo', this.form)
                                return response
                            }catch(error){
                                errorSweetAlert('Ocurrió un error al guardar el tipo de turno.')
                            }
                        },
                        allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                        if(result.isConfirmed){
                            if(result.value.status === 200){
                                if(result.value.data.status === "ok"){
                                    successSweetAlert(result.value.data.message)
                                    this.$store.commit('setCatalogoTiposTurnos', response.data.tipos_turnos)
                                    this.loading = false
                                    this.cerrarModalNuevoTipoTurno()
                                    this.getDataPagina(1)
                                }else if(result.value.data.status==="exists"){
                                    warningSweetAlert(result.value.data.message)
                                    this.loading = false
                                }else{
                                    errorSweetAlert(`${result.value.data.message}<br>Error: ${result.value.data.error}<br>Location: ${result.value.data.location}<br>Line: ${result.value.data.line}`)
                                }
                            }else{
                                errorSweetAlert('Ocurrió un error al guardar el nuevo tipo de turno')
                            }
                        }
                    })
            },
            async guardarCambiosEditarTipoTurno(){
                const isFormCorrect = await this.v$.editar.$validate()              
                if (!isFormCorrect) return
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
                                this.loading = true
                                // this.editar.sede = this.user.user.casa_justicia_id
                                // this.editar.tipo_usuario = this.user.user.tipo_usuario_id
                                let response = await axios.post('/api/tipos-turnos/actualizar-tipo', this.editar)
                                return response
                            } catch (error) {
                                errorSweetAlert('Ocurrió un error al actualizar los tipos de turnos.')
                            }
                        },
                        allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                        if (result.isConfirmed) {
                            if (result.value.status === 200) {
                                if (result.value.data.status === "ok") {
                                    successSweetAlert(result.value.data.message)
                                    this.$store.commit('setCatalogoTiposTurnos', response.data.tipos_turnos)
                                    this.cerrarModalNuevoTipoTurno()
                                    this.loading = false
                                    this.getDataPagina(1)
                                }else {
                                    errorSweetAlert(`${result.value.data.message}<br>Error: ${result.value.data.error}<br>Location: ${result.value.data.location}<br>Line: ${result.value.data.line}`)
                                }
                            } else {
                                errorSweetAlert('Ocurrió un error al actualizar los datos del tipo de turno.')
                            }
                        }
                    })
                },
                async eliminarTipoTurno(tiposTurnos){
                    Swal.fire({
                        title: '¿Desea Eliminar este tipo de turno?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085D6',
                        cancelButtonColor: '#D33',
                        confirmButtonText: 'Si, eliminar',
                        cancelButtonText: 'Cancelar',
                        showLoaderOnConfirm: true,
                        preConfirm: async () => {
                            try{
                                this.loading= true
                                //caja.tipo_usuario = this.user.user.tipo_usuario_id
                                //console.log(caja)
                                let response = await axios.post('/api/tipos-turnos/eliminar-tipo', tipo_turno)
                                return response
                                }catch(error){
                                    errorSweetAlert('Ocurrió un error al eliminar esta Ventanilla.')
                                }
                        },
                        allowOutsideClick: () => !Swal.isLoading()
                        }).then((result) => {
                        if(result.isConfirmed){
                            if(result.value.status === 200){
                                if(result.value.data.status === "ok"){
                                    successSweetAlert(result.value.data.message)
                                    this.$store.commit('setCatalogoTiposTurnos', response.data.tipos_turnos)
                                    this.loading = false
                                    this.getDataPagina(1)
                                    }else{
                                        errorSweetAlert(`${result.value.data.message}<br>Error: ${result.value.data.error}<br>Location: ${result.value.data.location}<br>Line: ${result.value.data.line}`)
                                    }
                                }else{
                                    errorSweetAlert('Ocurrió un error al eliminar la Ventanilla.')
                                }
                            }
                        })
                    }  
            }
    })
</script>