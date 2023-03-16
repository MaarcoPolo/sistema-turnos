<template>
    <v-card
      max-width="400"
      class="mx-auto mt-4 tarjeta"
    >
  
      <v-container >
        <v-row>
          <v-col cols="12">
            <v-card
              class="block"
            >
              <v-card-title class="text-h5">
                <div class="mt-4">
                     <img style="height: 10rem; widht: 10rem;" src="../../../public/img/logo_poder_judical_blanco.png" alt="">
                </div>
              </v-card-title>
              <v-toolbar-title 
                    class="text-center 
                           textotitulo mb-6">
                           <!-- TURNOS OFICIALÍA -->
              </v-toolbar-title>
            </v-card>
          </v-col>
          <!-- BOTON 1 -->
          <v-col cols="8" style="width: 100px; align-content: center;" class="pl-16">
          <v-card
            width="250px"
            height="50px"
            class="ficha1"
          >
           <div >
            <div class="d-flex flex-no-wrap justify-space-between ">
              <div>
                <v-toolbar-title 
                    class="text-left mt-4 pl-3">
                           TURNOS OFICIALÍA
                </v-toolbar-title>
              </div>

              <v-btn
                    class="ma-1"
                    color="purple"
                    icon="mdi mdi-account-arrow-down"
                    width="40px"
                    height="40px"
                ></v-btn>
            </div>
          </div>
          </v-card>
        </v-col>
            <!-- BOTON 2 -->
        <v-col cols="8" style="width: 100px; align-content: center;" class="pl-16">
          <v-card
            width="250px"
            height="50px"
            class="ficha1"
          >
           <div>
            <div class="d-flex flex-no-wrap justify-space-between ">
              <div>
                <v-toolbar-title 
                    class="text-left mt-4 pl-3">
                    TURNO-SALA
                </v-toolbar-title>
              </div>

              <v-btn
                    class="ma-1"
                    color="purple"
                    icon="mdi mdi-account-arrow-down"
                    width="40px"
                    height="40px"
                ></v-btn>
            </div>
          </div>
          </v-card>
        </v-col>
        <!-- BOTON 3 -->
        <v-col cols="8" style="width: 100px; align-content: center;" class="pl-16">
          <v-card
            width="250px"
            height="50px"
            class="ficha1"
          >
           <div>
            <div class="d-flex flex-no-wrap justify-space-between ">
              <div>
                <v-toolbar-title 
                    class="text-left mt-4 pl-3">
                    TURNO-INTERNO
                </v-toolbar-title>
              </div>

              <v-btn
                    class="ma-1"
                    color="purple"
                    icon="mdi mdi-account-arrow-down"
                    width="40px"
                    height="40px"
                ></v-btn>
            </div>
          </div>
          </v-card>
        </v-col>
        <!-- BOTON 4 -->
        <v-col cols="8" style="width: 100px; align-content: center;" class="pl-16">
          <v-card
            width="250px"
            height="50px"
            class="ficha1"
          >
           <div>
            <div class="d-flex flex-no-wrap justify-space-between ">
              <div>
                <v-toolbar-title 
                    class="text-left mt-4 pl-3">
                    ATENCIÓN RÁPIDA
                </v-toolbar-title>
              </div>

              <v-btn
                    class="ma-1"
                    color="purple"
                    icon="mdi mdi-account-arrow-down"
                    width="40px"
                    height="40px"
                ></v-btn>
            </div>
          </div>
          </v-card>
        </v-col>
         <!-- BOTON 5 -->
         <v-col cols="8" style="width: 100px; align-content: center;" class="pl-16">
          <v-card
            width="250px"
            height="50px"
            class="ficha1"
          >
           <div>
            <div class="d-flex flex-no-wrap justify-space-between ">
              <div>
                <v-toolbar-title 
                    class="text-left mt-4 pl-3">
                    TURNO-DEMANDA
                </v-toolbar-title>
              </div>

              <v-btn
                    class="ma-1"
                    color="purple"
                    icon="mdi mdi-account-arrow-down"
                    width="40px"
                    height="40px"
                ></v-btn>
            </div>
          </div>
          </v-card>
        </v-col>
         <!-- BOTON 6 -->
         <v-col cols="8" style="width: 100px; align-content: center;" class="pl-16">
          <v-card
            width="250px"
            height="50px"
            class="ficha1"
          >
           <div>
            <div class="d-flex flex-no-wrap justify-space-between ">
              <div>
                <v-toolbar-title 
                    class="text-left mt-4 pl-3">
                    ORAL FAMILIAR
                </v-toolbar-title>
              </div>

              <v-btn
                    class="ma-1"
                    color="purple"
                    icon="mdi mdi-account-arrow-down"
                    width="40px"
                    height="40px"
                ></v-btn>
            </div>
          </div>
          </v-card>
        </v-col>
          
           
        </v-row>
      </v-container>
    </v-card>
  </template>

<script>
    import { defineComponent } from "vue";

    export default defineComponent({
        name: 'home',
    })
</script>