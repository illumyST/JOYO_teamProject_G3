import { createApp } from 'vue'

import '@/assets/css/reset.css'
import My from './My.vue'
import router from '@/router/index.js'
import axios from 'axios'
import VueAxios from 'vue-axios'


createApp(My).use(VueAxios, axios).use(router)
.mount('#app')