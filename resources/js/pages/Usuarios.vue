<template>
    <div class="container-fluid">
        <div class="custom-title-div-normal row justify-content-between">
            <div class="">
                <p class="custom-title-page">Usuarios</p>
            </div>
        </div>
    <!-- </div> -->
    <div class="container mt-6">
        <!-- INICIO BOTON NUEVA CAJA -->
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
                            @click="abrirModalNuevoUsuario()"
                            >
                            Nuevo Usuario
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
         <!--INICIO DE LA TABLA USUARIOS-->
         <div class="my-2 mb-12 py-6">
            <div class="">
                <div class="row justify-content-between">
                    <table class="table custom-border-table">
                        <thead class="headers-table">
                            <tr>
                                <th class="custom-title-table">Id</th>
                                <th class="custom-title-table">Nombre</th>
                                <th v-if="user.user.tipo_usuario_id == 1" class="custom-title-table">Sede</th>
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
                            <tr v-else v-for="usuario in datosPaginados" :key="usuario.id">
                                <td class="custom-data-table">
                                    {{usuario.numero_registro}}
                                </td>
                                <td class="custom-data-table text-uppercase">
                                    {{usuario.nombre}}
                                </td>
                                <td v-if="user.user.tipo_usuario_id == 1" class="custom-data-table text-uppercase">
                                        {{usuario.sede}}
                                    </td>
                                <td>
                                    <div class="text-center row justify-content-center">
                                        <div>
                                            <v-icon
                                                @click="abrirModalEditarUsuario(usuario)"
                                                class="mr-1"
                                                >
                                                mdi-text-box-edit-outline
                                            </v-icon>

                                            <v-tooltip
                                                activator="parent"
                                                location="bottom"
                                                >
                                                <span style="font-size: 15px;">Editar Usuario</span>
                                            </v-tooltip>
                                        </div>
                                        <div>
                                            <v-icon
                                                @click="eliminarUsuario(usuario)"
                                                class="ml-1"
                                                >
                                                mdi-trash-can
                                            </v-icon>

                                            <v-tooltip
                                                activator="parent"
                                                location="bottom"
                                                >
                                                <span style="font-size: 15px;">Eliminar Usuario</span>
                                            </v-tooltip>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <template v-if="usuarios && usuarios.length > 0">
                        <div class="row justify-content-between container">
                            <div>
                                <p class="custom-text-show-results mt-2">
                                    Mostrando
                                    <span>{{from}}</span>
                                    -
                                    <span>{{to}}</span>
                                    de
                                    <span>{{usuarios.length}}</span>
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
                            <p class="no-data-text">No hay usuarios disponibles</p>
                        </div>
                    </template>
                </div>
            </div>
        </div>
        <v-dialog v-model="dialogNuevoUsuario" max-width="100rem" persistent>
                <v-card>
                    <v-card-title class="text-center">
                        <h3 class="mt-5 custom-dialog-title">Nuevo Usuario</h3>
                    </v-card-title>
                    <v-card-text>
                        <div class="text-center my-3 custom-border">
                            <div class="custom-subtitle">
                                <p>Datos</p>
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <div class="col-md-4 col-12">
                                <div class="div-custom-input-caja">
                                    <label for="input_nombre">Nombre:</label>
                                    <input id="input_nombre" type="text" class="form-control" v-model="v$.usuario.nombre.$model">
                                    <p class="text-validation-red" v-if="v$.usuario.nombre.$error">*Campo obligatorio</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="div-custom-input-caja">
                                    <label for="input_apellidoP">Apellido paterno:</label>
                                    <input id="input_apellidoP" type="text" class="form-control" v-model="usuario.apellido_paterno">
                                    <!-- <p class="text-validation-red" v-if="v$.usuario.apellido_paterno.$error">*Campo obligatorio</p> -->
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="div-custom-input-caja">
                                    <label for="input_apellidoM">Apellido materno:</label>
                                    <input id="input_apellidoM" type="text" class="form-control" v-model="usuario.apellido_materno">
                                    <!-- <p class="text-validation-red" v-if="v$.usuario.apellido_materno.$error">*Campo obligatorio</p> -->
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-between mt-4">
                            <div class="col-md-4 col-12">
                                <div class="div-custom-input-caja">
                                    <label for="input_email">Correo:</label>
                                    <input id="input_email" type="text" class="form-control" v-model="usuario.email">
                                    <!-- <p class="text-validation-red" v-if="v$.usuario.email.$error">*Correo inválido</p> -->
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="div-custom-input-caja">
                                    <label for="input_username">Nombre de usuario:</label>
                                    <input id="input_username" type="text" autocomplete="off" class="form-control" v-model="v$.usuario.username.$model">
                                    <p class="text-validation-red" v-if="v$.usuario.username.$error">*Campo obligatorio</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="div-custom-input-caja">
                                    <label for="input_pass">Contraseña:</label>
                                    <input id="input_pass" type="text" autocomplete="off" class="form-control" v-model="v$.usuario.password.$model">
                                    <p class="text-validation-red" v-if="v$.usuario.password.$error">*Campo obligatorio</p>
                                </div>
                            </div>
                          
                        </div>
                        <div v-if="user.user.tipo_usuario_id == 2" class="row justify-content-between mt-4">
                            <div class="col-md-4 col-12"></div>
                            <div class="col-md-4 col-12">
                                <div class="div-custom-input-caja">
                                    <label for="select_ventanilla">Ventanillas disponibles:</label>
                                    <select id="select_ventanilla" class="form-control minimal custom-select text-uppercase" v-model="usuario.caja_id">
                                        <option  v-for="item in ventanillas" :key="item.num" :value="item.id">{{item.nombre}}</option>
                                    </select>
                                    <!-- <p class="text-validation-red" v-if="v$.usuario.password.$error">*Campo obligatorio</p> -->
                                </div>
                            </div>
                            <div class="col-md-4 col-12"></div>
                        </div>
                        <div v-if="user.user.tipo_usuario_id == 1" class="row justify-content-between mt-4">
                            <div class="col-md-4 col-12">
                                <div class="div-custom-input-caja">
                                    <label for="select_tipo_usuario">Tipo de usuario:</label>
                                    <select id="select_tipo_usuario" class="form-control minimal custom-select text-uppercase" v-model="v$.usuario.tipo_usuario_id.$model">
                                        <option  v-for="item in tipoUsuarios" :key="item.id" :value="item.id">{{item.nombre}}</option>
                                    </select>
                                    <p class="text-validation-red" v-if="v$.usuario.tipo_usuario_id.$error">*Campo obligatorio</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="div-custom-input-caja">
                                    <label for="select_sede">Sede:</label>
                                    <select id="select_sede" class="form-control minimal custom-select text-uppercase" v-model="v$.usuario.sede.$model">
                                        <option  v-for="item in sedes" :key="item.id" :value="item.id">{{item.nombre}}</option>
                                    </select>
                                    <p class="text-validation-red" v-if="v$.usuario.sede.$error">*Campo obligatorio</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="div-custom-input-caja">
                                    <label for="select_ventanilla">Ventanillas disponibles:</label>
                                    <select id="select_ventanilla" class="form-control minimal custom-select text-uppercase" v-model="usuario.caja_id">
                                        <option  v-for="item in ventanillas" :key="item.num" :value="item.id">{{item.nombre}}</option>
                                    </select>
                                    <!-- <p class="text-validation-red" v-if="v$.usuario.password.$error">*Campo obligatorio</p> -->
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row justify-content-between mt-4">
                            <div class="col-md-4 col-12">
                                <div class="div-custom-select-caja">
                                    <label for="select_tipo_usuario">Tipo de usuario:</label>
                                    <select name="select_tipo_usuario" class="form-control minimal custom-select text-uppercase" v-model="v$.usuario.tipo_usuario_id.$model" >
                                        <option v-for="item in tipoUsuario" :key="item.id" :value="item.id">{{item.nombre}}</option>
                                    </select>
                                    <p class="text-validation-red" v-if="v$.usuario.tipo_usuario_id.$error">*Campo obligatorio</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="div-custom-select-caja">
                                    <label for="select_area">Área:</label>
                                    <select name="select_casa_justicia" class="form-control minimal custom-select text-uppercase" v-model="v$.usuario.area_id.$model">
                                        <option v-for="item in areas" :key="item.id" :value="item.id">{{item.nombre}}</option>
                                    </select>
                                    <p class="text-validation-red" v-if="v$.usuario.area_id.$error">*Campo obligatorio</p>
                                </div>
                            </div>
                        </div> -->
                        <div class="text-center mb-4 mt-6">
                            <v-btn
                                class="custom-button mr-2"
                                color="#c4f45d"
                                @click="guardarNuevoUsuario()"
                                >
                                Guardar
                            </v-btn>
                            <v-btn
                                class="custom-button ml-2"
                                color="#6a73a0"
                                @click="cerrarModalNuevoUsuario()"
                                >
                                Cancelar
                            </v-btn>
                        </div>
                    </v-card-text>
                </v-card>
        </v-dialog>
        <!-- INICIO MODAL PARA EDITAR DATOS DEL USUARIO -->
        <v-dialog v-model="dialogEditarUsuario" max-width="100rem" persistent>
            <v-card>
                <v-card-title class="text-center">
                    <h3 class="mt-2 custom-dialog-title">Editar Usuario</h3>
                </v-card-title>
                <v-card-text>
                    <div class="text-center my-8 custom-border">
                        <div class="custom-subtitle">
                            <p>Datos</p>
                        </div>
                    </div>
                    
                    <div class="row justify-content-between">
                            <div class="col-md-4 col-12">
                                <div class="div-custom-input-caja">
                                    <label for="input_nombre">Nombre:</label>
                                    <input id="input_nombre" type="text" class="form-control" v-model="v$.usuario.nombre.$model">
                                    <p class="text-validation-red" v-if="v$.usuario.nombre.$error">*Campo obligatorio</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="div-custom-input-caja">
                                    <label for="input_apellidoP">Apellido paterno:</label>
                                    <input id="input_apellidoP" type="text" class="form-control" v-model="usuario.apellido_paterno">
                                    <!-- <p class="text-validation-red" v-if="v$.usuario.apellido_paterno.$error">*Campo obligatorio</p> -->
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="div-custom-input-caja">
                                    <label for="input_apellidoM">Apellido materno:</label>
                                    <input id="input_apellidoM" type="text" class="form-control" v-model="usuario.apellido_materno">
                                    <!-- <p class="text-validation-red" v-if="v$.usuario.apellido_materno.$error">*Campo obligatorio</p> -->
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-between mt-4">
                            <div class="col-md-4 col-12">
                                <div class="div-custom-input-caja">
                                    <label for="input_email">Correo:</label>
                                    <input id="input_email" type="text" class="form-control" v-model="usuario.email">
                                    <!-- <p class="text-validation-red" v-if="v$.usuario.email.$error">*Correo inválido</p> -->
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="div-custom-input-caja">
                                    <label for="input_username">Nombre de usuario:</label>
                                    <input id="input_username" type="text" class="form-control" v-model="v$.usuario.username.$model">
                                    <p class="text-validation-red" v-if="v$.usuario.username.$error">*Campo obligatorio</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="div-custom-input-caja">
                                    <label for="input_pass">Contraseña:</label>
                                    <input id="input_pass" type="text" class="form-control" v-model="v$.usuario.password.$model">
                                    <p class="text-validation-red" v-if="v$.usuario.password.$error">*Campo obligatorio</p>
                                </div>
                            </div>
                        </div>
                        <div v-if="user.user.tipo_usuario_id == 1" class="row justify-content-between mt-4">
                            <div class="col-md-6 col-12">
                                <div class="div-custom-input-caja">
                                    <label for="select_tipo_usuario">Tipo de usuario:</label>
                                    <select id="select_tipo_usuario" class="form-control minimal custom-select text-uppercase" v-model="v$.usuario.tipo_usuario_id.$model">
                                        <option  v-for="item in tipoUsuarios" :key="item.id" :value="item.id">{{item.nombre}}</option>
                                    </select>
                                    <p class="text-validation-red" v-if="v$.usuario.tipo_usuario_id.$error">*Campo obligatorio</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="div-custom-input-caja">
                                    <label for="select_sede">Sede:</label>
                                    <select id="select_sede" class="form-control minimal custom-select text-uppercase" v-model="v$.usuario.sede.$model">
                                        <option  v-for="item in sedes" :key="item.id" :value="item.id">{{item.nombre}}</option>
                                    </select>
                                    <p class="text-validation-red" v-if="v$.usuario.sede.$error">*Campo obligatorio</p>
                                </div>
                            </div>
                            <!-- <div class="col-md-4 col-12">
                                <div class="div-custom-input-caja">
                                    <label for="select_ventanilla">Ventanillas disponibles:</label>
                                    <select id="select_ventanilla" class="form-control minimal custom-select text-uppercase" v-model="usuario.caja_id">
                                        <option  v-for="item in ventanillas" :key="item.num" :value="item.id">{{item.nombre}}</option>
                                    </select>
                                    <p class="text-validation-red" v-if="v$.usuario.password.$error">*Campo obligatorio</p>
                                </div>
                            </div> -->
                        </div>
                        <div class="row justify-content-between mt-4">
                            <div class="col-md-6 col-12">
                                <div class="div-custom-input-caja">
                                    <label for="input_ventanilla">Ventanilla asignada:</label>
                                    <input id="input_ventanilla" disabled autocomplete="off" type="text" class="form-control" v-model="usuario.ventanilla">
                                    <!-- <p class="text-validation-red" v-if="v$.usuario.ventanilla.$error">*Campo obligatorio</p> -->
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="div-custom-input-caja">
                                    <label for="select_disponible">Ventanillas disponibles:</label>
                                    <select id="select_disponible" class="form-control minimal custom-select text-uppercase" v-model="usuario.caja_id">
                                        <option  v-for="item in ventanillas" :key="item.num" :value="item.id">{{item.nombre}}</option>
                                    </select>
                                    <!-- <p class="text-validation-red" v-if="v$.usuario.password.$error">*Campo obligatorio</p> -->
                                </div>
                            </div>
                        </div>
                    <div class="text-center mb-4 mt-6">
                        <v-btn
                            class="custom-button mr-2"
                            color="#c4f45d"
                            @click="guardarCambiosEditarUsuario()"
                            >
                            Guardar
                        </v-btn>
                        <v-btn
                            class="custom-button ml-2"
                            color="#6a73a0"
                            @click="CancelarEditarUsuario()"
                            >
                            Cancelar
                        </v-btn>
                    </div>
                </v-card-text>
            </v-card>
        </v-dialog>
    </div>
    </div>
</template>

<script>
    import { defineComponent } from "vue";
    import { errorSweetAlert, successSweetAlert } from "../helpers/sweetAlertGlobals"
    import useValidate from '@vuelidate/core'
    import { required, email, helpers } from '@vuelidate/validators'

    export default defineComponent({
        name: 'usuarios',
        data () {
            return { 
                showNav: false,
                dialogNuevoUsuario: false,
                dialogEditarUsuario: false,
                usuario: {
                    id: null,
                    nombre: '',
                    apellido_paterno:'',
                    apellido_materno:'',
                    email:'',
                    password:'',
                    sede: null,
                    tipo_usuario: null,
                    caja_id: null,
                    ventanilla: '',
                    tipo_usuario_id: null
                    // username:'',
                    // area_id:'',
                    // numero:'',
                },
                v:{
                    sede: null
                },
                
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
            }
        },
        setup() {
            return {
                v$: useValidate()
            }
        },
        validations() {
                return {
                    usuario: {
                        nombre: {
                            required
                        },
                        tipo_usuario_id: {
                            required
                        },
                        sede: {
                            required
                        },
                        // email: {
                        //     required, 
                        //     email
                        // },
                        password: {
                            required
                        },
                        username: {
                            required
                        },
                        // tipo_usuario_id: {
                        //     required
                        // },
                        // area_id: {
                        //     required
                        // },
                        
                    }
                }
        },
        created() {
            this.getUsuarios()
            this.ventanillasDisponibles()
            this.getCasasJusticia()
            this.getTipoUsuarios()
        },
        computed: {
        pages() {
            const numShown = Math.min(this.numShown, this.totalPaginas())
            let first = this.current - Math.floor(numShown / 2)
            first = Math.max(first, 1)
            first = Math.min(first, this.totalPaginas() - numShown + 1)
            return [...Array(numShown)].map((k, i) => i + first)
        },
        ventanillas() {
                return this.$store.getters.getVentanillasDisponibles
        },
        usuarios() {
                return this.$store.getters.getUsuarios
        },
        user() {
                return this.$store.getters.user
        },
        currentRoute() {
            return this.$route.name
        },
        sedes() {
                return this.$store.getters.getCasasJusticia
        },
        tipoUsuarios() {
                return this.$store.getters.getTipoUsuarios
        },
      },
        watch: {
            buscar: function () {
                if (!this.buscar.length == 0) {
                    this.datosPaginados = this.usuarios.filter(item => {
                        return item.nombre.toLowerCase().includes(this.buscar.toLowerCase())
                        || item.sede.toLowerCase().includes(this.buscar.toLowerCase())
                    
                    })
                } else {
                    this.getDataPagina(1)
                }
            },
            mostrar: function () {
                if (this.mostrar) {
                    this.getDataPagina(1)
                }
            },
            'usuario.sede': function () {
                this.v.sede = this.usuario.sede
                // console.log(this.usuario)
                this.ventanillasDisponibles()
            },
        },
        methods: {
        logout() {
                this.$store.dispatch('logout')
            },
            totalPaginas() {
                return Math.ceil(this.usuarios.length / this.elementosPorPagina)
            },
            getDataPagina(noPagina) {
                this.paginaActual = noPagina
                this.datosPaginados = []

                let ini = (noPagina * this.elementosPorPagina) - this.elementosPorPagina
                let fin = (noPagina * this.elementosPorPagina)

                for (let index = ini; index < fin; index++) {
                    if (this.usuarios[index]) {
                        this.datosPaginados.push(this.usuarios[index])
                    }
                }

                // Para el texto "Mostrando 1 - 10 de 20 resultados"
                this.from = ini+1
                if (noPagina < this.totalPaginas()) {
                    this.to = fin
                } else {
                    this.to = this.usuarios.length
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
            abrirModalNuevoUsuario(){
                this.dialogNuevoUsuario = true
            },
            async getUsuarios() {
                this.loading = true
                try {
                    if(this.user.user.tipo_usuario_id == 2){
                        this.usuario.sede = this.user.user.casa_justicia_id
                        this.usuario.tipo_usuario = this.user.user.tipo_usuario_id
                    }else{
                        this.usuario.tipo_usuario = 1
                    }
                   
                    let response = await axios.post('/api/usuarios', this.usuario)
                    if (response.status === 200) {
                        if (response.data.status === "ok") {
                            this.$store.commit('setUsuarios', response.data.usuarios)
                            // this.oficios = response.data.oficios
                            this.mostrar = true
                        } else {
                            errorSweetAlert(`${response.data.message}<br>Error: ${response.data.error}<br>Location: ${response.data.location}<br>Line: ${response.data.line}`)
                        }
                    } else {
                        errorSweetAlert('Ocurrió un error al obtener los Usuarios')
                    }
                } catch (error) {
                    errorSweetAlert('Ocurrió un error al obtener los Usuarios')
                }
                this.loading = false
            },
            async getTipoUsuarios() {
                // this.loading = true
                try {
                    // this.usuario.tipo = this.user.user.tipo_usuario_id
                    // this.usuario.sede = this.user.user.casa_justicia_id
                    let response = await axios.get('/api/tipo-usuarios')
                    if (response.status === 200) {
                        if (response.data.status === "ok") {
                            this.$store.commit('setTipoUsuarios', response.data.tipoUsuarios)
                            // this.oficios = response.data.oficios
                            // this.mostrar = true
                        } else {
                            errorSweetAlert(`${response.data.message}<br>Error: ${response.data.error}<br>Location: ${response.data.location}<br>Line: ${response.data.line}`)
                        }
                    } else {
                        errorSweetAlert('Ocurrió un error al obtener los tipos de usuarios')
                    }
                } catch (error) {
                    errorSweetAlert('Ocurrió un error al obtener los tipos de usuarios')
                }
                // this.loading = false
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
            async ventanillasDisponibles() {
                // this.loading = true
                try {
                    if(this.user.user.tipo_usuario_id == 2){
                        this.v.sede = this.user.user.casa_justicia_id
                    }
                    
                    // this.usuario.tipo_usuario = this.user.user.tipo_usuario_id
                    let response = await axios.post('/api/cajas-disponibles', this.v)
                    if (response.status === 200) {
                        if (response.data.status === "ok") {
                            this.$store.commit('setVentanillasDisponibles', response.data.ventanillas)
                            
                            // this.oficios = response.data.oficios
                            // this.mostrar = true
                        } else {
                            errorSweetAlert(`${response.data.message}<br>Error: ${response.data.error}<br>Location: ${response.data.location}<br>Line: ${response.data.line}`)
                        }
                    } else {
                        errorSweetAlert('Ocurrió un error al obtener las ventanillas')
                    }
                } catch (error) {
                    errorSweetAlert('Ocurrió un error al obtener las ventanillas')
                }
                // this.loading = false
            },
            cerrarModalNuevoUsuario(){
                this.dialogNuevoUsuario = false
                this.dialogEditarUsuario = false
                this.usuario.nombre =''
                this.usuario.username = ''
                this.usuario.password = ''
                this.usuario.tipo_usuario_id = ''
                this.usuario.sede = ''
                this.usuario.caja_id = ''
                
            },
            abrirModalEditarUsuario(usuario){
                // console.log(usuario)
                this.dialogEditarUsuario=true 
                // this.dialogEditarUsuario = true
                this.usuario.tipo_usuario_id = usuario.tipo_usuario_id
                this.usuario.sede = usuario.sede_id
                this.usuario.id = usuario.id
                this.usuario.nombre = usuario.nombre
                this.usuario.apellido_materno = usuario.apellido_materno
                this.usuario.apellido_paterno = usuario.apellido_paterno
                this.usuario.email = usuario.email
                this.usuario.password = usuario.password
                this.usuario.ventanilla = usuario.ventanilla
                // this.usuario.area_id = usuario.area_id
                this.usuario.username = usuario.username
                // this.ventanillasDisponibles()
            },
            async guardarNuevoUsuario() {
                if(this.user.user.tipo_usuario_id == 2){
                        this.usuario.sede = this.user.user.casa_justicia_id
                        this.usuario.tipo_usuario = this.user.user.tipo_usuario_id
                        this.usuario.tipo_usuario_id = 3;
                }else{
                        this.usuario.tipo_usuario = 1;

                }
                const isFormCorrect = await this.v$.usuario.$validate()              
                if (!isFormCorrect) return
                Swal.fire({
                    title: '¿Guardar nuevo Usuario?',
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
                                let response = await axios.post('/api/usuarios/crear-usuario', this.usuario)
                                return response
                            } catch (error) {
                                errorSweetAlert('Ocurrió un error al guardar el Usuario.')
                            }
                        },
                        allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                        if (result.isConfirmed) {
                            if (result.value.status === 200) {
                                if (result.value.data.status === "ok") {
                                    successSweetAlert(result.value.data.message)
                                    this.$store.commit('setUsuarios', result.value.data.usuarios)
                                    this.ventanillasDisponibles()
                                    this.loading = false
                                    this.cerrarModalNuevoUsuario()
                                    this.getDataPagina(1)
                                    // this.descargarCodigoOficio(result.value.data.oficio)
                                } else if(result.value.data.status==="exists"){
                                    warningSweetAlert(result.value.data.message)
                                    this.loading = false
                                }else {
                                    errorSweetAlert(`${result.value.data.message}<br>Error: ${result.value.data.error}<br>Location: ${result.value.data.location}<br>Line: ${result.value.data.line}`)
                                }
                            } else {
                                errorSweetAlert('Ocurrió un error al guardar el Usuario.')
                            }
                        }
                    })
            },
                // Abrir modal de editar usuario ya con los datos cargados
            //     EditarUsuario(usuario) {
            //     this.dialogEditarUsuario = true
            //     this.usuario.id = usuario.id
            //     this.usuario.nombre = usuario.nombre
            //     this.usuario.apellido_materno = usuario.apellido_materno
            //     this.usuario.apellido_paterno = usuario.apellido_paterno
            //     this.usuario.email = usuario.email
            //     this.usuario.password = usuario.password
            //     // this.usuario.tipo_usuario_id = usuario.tipo_usuario_id
            //     this.usuario.ventanilla = usuario.ventanilla
            //     this.usuario.username = usuario.username
            //     // this.usuario.email_confirm = usuario.email
            //     // this.usuario.password_confirm = usuario.password
            //     // this.usuario.numero = usuario.numero
            // },
            // boton para cerrar el modal
            CancelarEditarUsuario() {
                this.dialogEditarUsuario = false
                this.usuario.id = ''
                this.usuario.nombre = ''
                this.usuario.apellido_paterno = ''
                this.usuario.apellido_materno = ''
                this.usuario.email = ''
                // this.usuario.tipo_usuario_id = ''
                this.usuario.username = ''
                this.usuario.password = ''        
                // this.usuario.area_id = ''  
                // this.usuario.numero = '' 
                this.ventanillasDisponibles()   
            },
            async guardarCambiosEditarUsuario() {
                // if(this.user.user.tipo_usuario_id == 2){
                    // console.log(this.usuario)
                //     // this.usuario.tipo_usuario_id = this.user.user.tipo_usuario_id
                //     // this.usuario.sede = this.user.user.casa_justicia_id
                // }
                const isFormCorrect = await this.v$.usuario.$validate()              
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
                                
                                let response = await axios.post('/api/usuarios/actualizar-usuario', this.usuario)
                                return response
                            } catch (error) {
                                errorSweetAlert('Ocurrió un error al actualizar los datos del usuario.')
                            }
                        },
                        allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                        if (result.isConfirmed) {
                            if (result.value.status === 200) {
                                if (result.value.data.status === "ok") {
                                    successSweetAlert(result.value.data.message)
                                    this.$store.commit('setUsuarios', result.value.data.usuarios)
                                    this.CancelarEditarUsuario()
                                    this.getDataPagina(1)
                                } else {
                                    errorSweetAlert(`${result.value.data.message}<br>Error: ${result.value.data.error}<br>Location: ${result.value.data.location}<br>Line: ${result.value.data.line}`)
                                }
                            } else {
                                errorSweetAlert('Ocurrió un error al actualizar los datos del usuario.')
                            }
                        }
                    })
            },
           async eliminarUsuario(usuario) {
                Swal.fire({
                  title: '¿Eliminar Usuario?',
                  icon: 'question',
                  showCancelButton: true,
                  confirmButtonColor: '#3085D6',
                  cancelButtonColor: '#D33',
                  confirmButtonText: 'Si, eliminar',
                  cancelButtonText: 'Cancelar',
                  showLoaderOnConfirm: true,
                  preConfirm: async () => {
                      try {
                            usuario.tipo_usuario = this.user.user.tipo_usuario_id
                            usuario.sede = this.user.user.casa_justicia_id
                          let response = await axios.post('/api/usuarios/eliminar-usuario', usuario)
                          return response
                      } catch (error) {
                          errorSweetAlert('Ocurrió un error al eliminar este Usuario.')
                      }
                  },
                  allowOutsideClick: () => !Swal.isLoading()
              }).then((result) => {
                  if (result.isConfirmed) {
                      if (result.value.status === 200) {
                          if (result.value.data.status === "ok") {
                              successSweetAlert(result.value.data.message)
                              this.$store.commit('setUsuarios', result.value.data.usuarios)
                              this.getDataPagina(1)
                          } else {
                              errorSweetAlert(`${result.value.data.message}<br>Error: ${result.value.data.error}<br>Location: ${result.value.data.location}<br>Line: ${result.value.data.line}`)
                          }
                      } else {
                          errorSweetAlert('Ocurrió un error al eliminar el Usuario.')
                      }
                  }
              })
               
            }
        }
    })
</script>