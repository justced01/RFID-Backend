import './bootstrap'

import { createApp } from 'vue'
import router from './router'
import axios from 'axios'
import mitt from 'mitt'
import App from './App.vue'
import store from './store/index'

const emitter = mitt()

const app = createApp(App)
app.config.globalProperties.emitter = emitter
app.use(store)
app.use(router)
app.mount('#app')