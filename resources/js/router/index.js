import { createWebHistory, createRouter } from 'vue-router';

import Login from '../components/Login.vue';
import Dashboard from '../components/Dashboard.vue';


export const routes = [
    {
        path: '/',
        name: 'login',
        component: Login
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;