import { createWebHistory, createRouter } from 'vue-router';
import Home from '../views/Home.vue';
import Login from '../views/Login.vue';

import DashboardUser from '../views/user/Dashboard.vue';

import DashboardAdmin from '../views/admin/Dashboard.vue';
import Attendance from '../views/admin/Attendance.vue';

export const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/login',
        name: 'Login',
        component: Login
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
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;