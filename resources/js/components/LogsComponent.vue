<template>
    <!-- <div class="flex flex-row items-center mb-2 px-[8px] py-[12px] bg-[#E6FFED] rounded">
        <img :src="baseUrl + '/images/samantha.png'" class="w-[52px] h-[52px] mr-4">
        <div class="flex flex-row justify-between items-center w-full">
            <div>
                <p class="mb-0.5 text-[16px] font-[500] leading-[19px] text-[#0E0E0E]">Samantha</p>
                <p class="mb-0.5 text-[13px] font-[400] leading-[16px] text-[#464646]">has login to school at</p>
                <p class="text-[12px] font-[400] leading-[14px] text-[#447604]">Today - July 04, 2022  - 10:00 am</p>
            </div>
            <img :src="baseUrl + '/images/icons/dot-icon.png'" class="w-[6px] h-[6px]">
        </div>
    </div> -->
    <div v-if="notifications">
        <div v-for="notification in notifications" :key="notification.id" class="flex flex-row items-center mb-2 px-[8px] py-[12px] rounded bg-[#E6FFED]">
            <img :src="baseUrl + '/images' + notification.profile_path" class="w-[52px] h-[52px] mr-4">
            <div class="flex flex-row justify-between items-center w-full">
                <div>
                    <p class="mb-0.5 text-[16px] font-[500] leading-[19px] text-[#0E0E0E]">{{ notification.student_name }}</p>
                    <p class="mb-0.5 text-[13px] font-[400] leading-[16px] text-[#464646]">{{ notification.description }}</p>
                    <p class="text-[12px] font-[400] leading-[14px] text-[#848484]">{{ datetime(notification.created_at )}}</p>
                </div>
                <!-- <img :src="baseUrl + '/images/icons/dot-icon.png'" class="w-[6px] h-[6px]"> -->
            </div>
        </div>
    </div>
</template>

<script>
import moment from 'moment'

export default {
    data(){
        return {
            baseUrl: window.location.origin,
            notifications: {},
        }
    },
    created(){
        axios.post('/api/users/get_notification', { 
            headers: { Authorization: `Bearer ${localStorage.getItem('user_token')}` },
        })  
        .then(response => {
            this.notifications = response.data.data
        })
    },
    methods: {
        datetime(datetime){
            return moment(datetime).format('dddd - MMMM DD, YYYY - hh:mm A')
        },
    }
}
</script>

<style>

</style>