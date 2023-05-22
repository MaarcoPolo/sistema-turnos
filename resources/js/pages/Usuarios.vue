<template>
    <div class="container-fluid">
        <div class="custom-title-div-normal row justify-content-between">
            <div class="">
                <p class="custom-title-page">Usuarios</p>
            </div>
        </div>
        <div class="container mt-6">
            <!-- INICIO BOTON NUEV0O USUARIO -->
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
                                @click="abrirModalNuevaCaja()"
                                >
                                Nuevo usuario
                            </v-btn>
                        </div>
                    </div>
            </div>
            <!-- INICIO FILTROS Y BUSCADOR -->
            <div class="row justify-content-between mt-8">
                <div class="col-md-4 col-12">
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
                                    <th v-if="user.user.tipo_usuario_id ==1" class="custom-title-table">Casa de Justicia</th>
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
                                <tr v-else v-for="caja in datosPaginados" :key="caja.id">
                                    <td class="custom-data-table">
                                        {{caja.num_registro}}
                                    </td>
                                    <td class="custom-data-table text-uppercase">
                                        {{caja.nombre}}
                                    </td>
                                    <td v-if="user.user.tipo_usuario_id ==1" class="custom-data-table text-uppercase">
                                        {{caja.sede}}
                                    </td>
                                    <td>
                                        <div class="text-center row justify-content-center">
                                            <div>
                                                <v-icon
                                                    @click="abrirModalEditarCaja(caja)"
                                                    class="mr-1"
                                                    >
                                                    mdi-text-box-edit-outline
                                                </v-icon>
    
                                                <v-tooltip
                                                    activator="parent"
                                                    location="bottom"
                                                    >
                                                    <span style="font-size: 15px;">Editar Ventanilla</span>
                                                </v-tooltip>
                                            </div>
                                            <div>
                                                <v-icon
                                                    @click="eliminarCaja(caja)"
                                                    class="ml-1"
                                                    >
                                                    mdi-trash-can
                                                </v-icon>
    
                                                <v-tooltip
                                                    activator="parent"
                                                    location="bottom"
                                                    >
                                                    <span style="font-size: 15px;">Eliminar Ventanilla</span>
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
                            <div class="row justify-content-between container">
                                <div>
                                    <p class="custom-text-show-results mt-2">
                                        Mostrando
                                        <span>{{from}}</span>
                                        -
                                        <span>{{to}}</span>
                                        de
                                        <span>{{cajas.length}}</span>
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
                                <p class="no-data-text">No hay ventanillas disponibles</p>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>

        <!-- INICIO MODAL AGREGAR NUEVA CAJA-->
        <v-dialog v-model="dialogNuevaCaja" max-width="50rem" persistent>
            <v-card>
                <v-card-text>
                    <div class="text-center my-8 custom-border">
                        <div class="custom-subtitle">
                            <p>Nueva Caja</p>
                        </div>
                    </div>
                    <div class="row justify-content-between mt-5">
                        <div class="col-12">
                            <div class="div-custom-input-caja">
                                <label for="input_nombre">Nombre de la Caja:</label>
                                <input id="input_nombre" type="text" class="form-control minimal custom-input text-uppercase" v-model="v$.form.nombre.$model">
                                <p class="text-validation-red" v-if="v$.form.nombre.$error">*Campo obligatorio</p>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="div-custom-input-caja">
                                <label for="select_nombre">Tipo de Caja:</label>
                                <select name="select_tipo_usuario" class="form-control minimal custom-select text-uppercase" v-model="v$.form.tipo.$model">
                                    <option  v-for="item in tiposVentanillas" :key="item.id" :value="item.id">{{item.nombre}}</option>
                                </select>
                                <p class="text-validation-red" v-if="v$.form.tipo.$error">*Campo obligatorio</p>
                            </div>
                        </div>
                        <div v-if="user.user.tipo_usuario_id == 1" class="col-12 mt-4">
                            <div class="div-custom-input-caja">
                                <label for="select_nombre">Casa de Justicia:</label>
                                <select name="select_casa_justicia" class="form-control minimal custom-select text-uppercase" v-model="v$.form.sede.$model">
                                    <option  v-for="item in sedes" :key="item.id" :value="item.id">{{item.nombre}}</option>
                                </select>
                                <p class="text-validation-red" v-if="v$.form.sede.$error">*Campo obligatorio</p>
                            </div>
                        </div>
                       
                            
                    </div>
                    <div class="text-center mb-4 mt-6">
                        <v-btn
                            
                            class="custom-button mr-2"
                            color="#c4f45d"
                            @click="guardarNuevaCaja()"
                            >
                            Guardar
                        </v-btn>
                        <v-btn
                            class="custom-button ml-2"
                            color="#6a73a0"
                            @click="cerrarModalNuevaCaja()"
                            >
                            Cancelar
                        </v-btn>
                    </div>
                </v-card-text>
            </v-card>
        </v-dialog>

        <!-- INICIO MODAL EDITAR CAJA-->
        <v-dialog v-model="dialogEditarCaja" max-width="50rem" persistent>
            <v-card>
                <v-card-text>
                    <div class="text-center my-8 custom-border">
                        <div class="custom-subtitle">
                            <p>Editar Caja</p>
                        </div>
                    </div>
                    <div class="">
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-12">
                            <div class="div-custom-input-caja">
                                <label for="input_nombre">Nombre:</label>
                                <input id="input_input_nombre" autocomplete="off"  class="form-control" v-model="v$.editar.nombre.$model">
                                <p class="text-validation-red" v-if="v$.editar.nombre.$error">*Campo obligatorio</p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mb-4 mt-6">
                        <v-btn
                            
                            class="custom-button mr-2"
                            color="#c4f45d"
                            @click="guardarCambiosEditarCaja()"
                            >
                            Guardar
                        </v-btn>
                        <v-btn
                            class="custom-button ml-2"
                            color="#6a73a0"
                            @click="cerrarModalNuevaCaja()"
                            >
                            Cancelar
                        </v-btn>
                    </div>
                </v-card-text>
            </v-card>
        </v-dialog>
    </div>
    <div class="container mt-16">
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
                                <!-- <th class="custom-title-table">Tipo de Ventanilla</th> -->
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
                                    {{usuario.id}}
                                </td>
                                <td class="custom-data-table text-uppercase">
                                    {{usuario.nombre}}
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
                                    <input id="input_apellidoP" type="text" class="form-control" v-model="v$.usuario.apellido_paterno.$model">
                                    <p class="text-validation-red" v-if="v$.usuario.apellido_paterno.$error">*Campo obligatorio</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="div-custom-input-caja">
                                    <label for="input_apellidoM">Apellido materno:</label>
                                    <input id="input_apellidoM" type="text" class="form-control" v-model="v$.usuario.apellido_materno.$model">
                                    <p class="text-validation-red" v-if="v$.usuario.apellido_materno.$error">*Campo obligatorio</p>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-between mt-4">
                            <div class="col-md-4 col-12">
                                <div class="div-custom-input-caja">
                                    <label for="input_email">Correo:</label>
                                    <input id="input_email" type="text" class="form-control" v-model="v$.usuario.email.$model">
                                    <p class="text-validation-red" v-if="v$.usuario.email.$error">*Correo inválido</p>
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
    </div>
</template>

<script>
    import { defineComponent } from "vue";

    export default defineComponent({
        name: 'usuarios',
    })
</script>