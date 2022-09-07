<template>
    <nav class="flex flex-row justify-around w-full px-3 py-4 fixed left-0 bottom-0 bg-white z-10">
        <div class="">
            <img :src="baseUrl + '/images/icons/home-icon.png'" class="mx-auto">
            <router-link to="/user/dashboard" class="text-[13px] font-[400] text-[#447604]">Home</router-link>
        </div>
        <div class="relative">
            <span v-if="countNotifications != 0" class="absolute left-9 h-[17px] w-[17px] text-[11px] text-center rounded-full text-white bg-red-500">{{ countNotifications }}</span>
            <img :src="baseUrl + '/images/icons/notification-icon.png'" class="mx-auto">
            <router-link to="/user/notification" class="text-[13px] font-[400]">Notifications</router-link>
        </div>
        <div>
            <img :src="baseUrl + '/images/icons/message-icon-v2.png'" class="mx-auto">
            <router-link to="#" class="text-[13px] font-[400]">Messages</router-link>
        </div>
        <div>
            <img :src="baseUrl + '/images/icons/setting.png'" class="mx-auto">
            <router-link to="#" class="text-[13px] font-[400]">Settings</router-link>
        </div>
    </nav>
</template>

<script>
export default {
    data(){
        return {
            baseUrl: window.location.origin,
            countNotifications: null
        }
    },
    created(){
        axios.post('/api/users/get_notification', { headers: { Authorization: `Bearer ${localStorage.getItem('user_token')}` } })
        .then(response => {
            this.countNotifications = response.data.data.length
        })
        Echo.channel('count-notification')
            .listen('UpdateCountNotification', (e) => {
                axios.post('/api/users/get_notification', { headers: { Authorization: `Bearer ${localStorage.getItem('user_token')}` } })
                .then(response => {
                    this.countNotifications = response.data.data.length
                })
        })
    },
}
</script>

<style>

</style>