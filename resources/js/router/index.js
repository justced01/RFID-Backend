import { createWebHistory, createRouter } from 'vue-router'
import Login from '../views/Login.vue'
import Click from '../views/Click.vue'

import LoginUser from '../views/user/Login.vue'
import DashboardUser from '../views/user/Dashboard.vue'
import Notification from '../views/user/Notification.vue'
import AttendanceHistory from '../views/user/AttendanceHistory.vue'
import AttendanceRecord from '../views/user/AttendanceRecord.vue'


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
        component: LoginUser,
    },
    {
        path: '/admin/dashboard',
        name: 'Dashboard - Admin',
        component: DashboardAdmin
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
    {
        path: '/user/dashboard',
        name: 'Dashboard - User',
        component: DashboardUser,
    },
    {
        path: '/user/notification',
        name: 'Notification',
        component: Notification
    },
    {
        path: '/user/attendance_history',
        name: 'Attendance History',
        component: AttendanceHistory
    },
    {
        path: '/user/attendance_record',
        name: 'Attendance Record',
        component: AttendanceRecord
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;