import { createWebHistory, createRouter } from 'vue-router'
import Login from '../views/Login.vue'
import Click from '../views/Click.vue'

import LoginUser from '../views/user/Login.vue'
import DashboardUser from '../views/user/Dashboard.vue'

import DashboardAdmin from '../views/admin/Dashboard.vue'
import Attendance from '../views/admin/Attendance.vue'

export const routes = [
    // {
    //     path: '/',
    //     name: 'Login',
    //     component: Login
    // },
    {
        path: '/',
        name: 'Login - User',
        component: LoginUser
    },
    {
        path: '/admin/dashboard',
        name: 'Dashboard - Admin',
        component: DashboardAdmin
    },
    {
        path: '/user/dashboard',
        name: 'Dashboard - User',
        component: DashboardUser
    },
    {
        path: '/attendance',
        name: 'Attendance',
        component: Attendance
    },
    {
        path: '/click',
        name: 'Click',
        component: Click
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;