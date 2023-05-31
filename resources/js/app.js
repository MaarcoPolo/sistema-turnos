import './bootstrap';

import '@mdi/font/css/materialdesignicons.css'

import { createApp } from 'vue'
import App from './layouts/App.vue'
import router from './router.js'
import store from './store'
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import swal from 'sweetalert2';

import './../sass/app.scss'

const vuetify = createVuetify({
    components,
    directives,
    icons: {
        defaultSet: 'mdi', // This is already the default value - only for display purposes
      },
})

window.Swal = swal;

createApp(App)
    .use(router)
    .use(store)
    .use(vuetify)
    .mount("#app")