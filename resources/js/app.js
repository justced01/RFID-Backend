import './bootstrap'

import { createApp } from 'vue'
import router from './router'
import axios from 'axios'
import App from './App.vue'

createApp(App)
    .use(router)
    .mount('#app')