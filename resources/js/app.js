import './bootstrap'

import { createApp } from 'vue'
import router from './router'
import axios from 'axios'
import mitt from 'mitt';
import App from './App.vue'

const emitter = mitt();

const app = createApp(App)
app.config.globalProperties.emitter = emitter
app.use(router)
app.mount('#app')