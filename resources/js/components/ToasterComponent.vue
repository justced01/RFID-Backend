<template>
    <div class="flex items-center absolute h-full w-full bg-gray-500 z-30 backdrop" @click="redirectAttendanceHistory">
        <div class="flex flex-row h-[95px] w-[372px] absolute left-6 top-0 p-4 bg-green-500 rounded-lg">
            <img :src="baseUrl + '/images/samantha.png'" class="w-[60px] h-[60px] mr-5">
            <div class="w-full">
                <p class="text-[22px] font-[600] leading-[26px] text-white tracking-[0.8px]">Samantha</p>
                <p class="w-[191px] h-[28px] text-[12px] font-[400] leading-[14px] text-[#FFF2B3]">Great! Your daughter just arrived at the school.</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            user: null,
            baseUrl: window.location.origin
        }
    },
    methods: {
        redirectAttendanceHistory(){
            this.$router.push('/user/attendance_history')
        }
    }
}
</script>

<style>
.backdrop {
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
</style>