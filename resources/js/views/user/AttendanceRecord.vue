<template>
    <div class="relative w-[428px] h-[926px] bg-white mx-auto">
        <div class="flex flex-row items-center justify-center mb-1 px-7 py-3">
            <a @click="$router.go(-1)" class="text-[13px] font-[400] leading-[16px] text-[#464646]">
                <img :src="baseUrl + '/images/icons/arrow-left-black-icon.png'" class="inline"> 
            Back</a>
            <h1 class="mx-auto text-[18px] font-[400] leading-[21px] text-[#0E0E0E]">Attendance Record</h1>
            <router-link to="#">
                <img :src="baseUrl + '/images/icons/calendar-day-icon.png'" class="inline"> 
            </router-link>
        </div>
        <div class="flex flex-row justify-between items-center px-7 py-4 bg-[#00A950]">
            <p class="ml-1 text-[16px] font-[400] leading-[19px] text-white">August</p>
            <div class="flex flex-row">
                <img :src="baseUrl + '/images/icons/arrow-left-white-icon.png'" class="pr-4">
                <img :src="baseUrl + '/images/icons/arrow-right-white-icon.png'" >
            </div>
        </div>
        <div class="flex flex-row justify-between items-center px-8 py-4">
            <div class="flex flex-col">
                <p class="mb-1 text-[12px] font-[400] leading-[14px] text-[#848484]">Present</p>
                <p class="text-[16px] font-[500] leading-[19px] text-black">24 Days</p>
            </div>
            <div class="flex flex-col">
                <p class="mb-1 text-[12px] font-[400] leading-[14px] text-[#848484]">Absent</p>
                <p class="text-[16px] font-[500] leading-[19px] text-black">0 Days</p>
            </div>
            <div class="flex flex-col">
                <p class="mb-1 text-[12px] font-[400] leading-[14px] text-[#848484]">Half Day</p>
                <p class="text-[16px] font-[500] leading-[19px] text-black">0.5 Days</p>
            </div>
            <div class="flex flex-col">
                <p class="mb-1 text-[12px] font-[400] leading-[14px] text-[#848484]">Holidays</p>
                <p class="text-[16px] font-[500] leading-[19px] text-black">4 Days</p>
            </div>
        </div>
        <div class="flex flex-col bg-[#F9F9F9]">
            <div class="flex flex-row items-center px-8 py-3">
                <div class="flex flex-col items-center mr-10">
                    <p class="mb-0 text-[10px] font-[400] leading-[12px] text-black">AUG</p>
                    <p class="mb-0 text-[25px] font-[600] leading-[30px] text-[#00A950]">12</p>
                    <p class="mb-0 text-[10px] font-[400] leading-[12px] text-black">FRI</p>
                </div>
                <div class="flex flex-col">
                    <p class="text-[16px] font-[500] leading-[19px] mb-1 text-black">Time In 06:57 AM</p>
                    <p class="text-[10px] font-[400] leading-[12px] text-[#848484]"><img :src="baseUrl + '/images/icons/location-green-icon.png'" class="inline mr-1">South Campus</p>
                </div>
            </div>
            <div class="flex flex-row items-center px-8 py-3">
                <div class="flex flex-col items-center mr-10">
                    <p class="mb-0 text-[10px] font-[400] leading-[12px] text-black">AUG</p>
                    <p class="mb-0 text-[25px] font-[600] leading-[30px] text-[#00A950]">11</p>
                    <p class="mb-0 text-[10px] font-[400] leading-[12px] text-black">THU</p>
                </div>
                <div class="flex flex-col">
                    <p class="text-[16px] font-[500] leading-[19px] mb-1 text-black">Time Out 06:57 AM</p>
                    <p class="text-[10px] font-[400] leading-[12px] text-[#848484]"><img :src="baseUrl + '/images/icons/location-green-icon.png'" class="inline mr-1">South Campus</p>
                </div>
            </div>
            <div class="flex flex-row items-center px-8 py-3">
                <div class="flex flex-col items-center mr-10">
                    <p class="mb-0 text-[10px] font-[400] leading-[12px] text-black">AUG</p>
                    <p class="mb-0 text-[25px] font-[600] leading-[30px] text-[#00A950]">12</p>
                    <p class="mb-0 text-[10px] font-[400] leading-[12px] text-black">FRI</p>
                </div>
                <div class="flex flex-col">
                    <p class="text-[16px] font-[500] leading-[19px] mb-1 text-black">Time In 06:57 AM</p>
                    <p class="text-[10px] font-[400] leading-[12px] text-[#848484]"><img :src="baseUrl + '/images/icons/location-green-icon.png'" class="inline mr-1">South Campus</p>
                </div>
            </div>
            <div class="flex flex-row items-center px-8 py-3">
                <div class="flex flex-col items-center mr-10">
                    <p class="mb-0 text-[10px] font-[400] leading-[12px] text-black">AUG</p>
                    <p class="mb-0 text-[25px] font-[600] leading-[30px] text-[#00A950]">12</p>
                    <p class="mb-0 text-[10px] font-[400] leading-[12px] text-black">FRI</p>
                </div>
                <div class="flex flex-col">
                    <p class="text-[16px] font-[500] leading-[19px] mb-1 text-black">Time In 06:57 AM</p>
                    <p class="text-[10px] font-[400] leading-[12px] text-[#848484]"><img :src="baseUrl + '/images/icons/location-green-icon.png'" class="inline mr-1">South Campus</p>
                </div>
            </div>
        </div>
        <NavigationComponent />
    </div>
</template>

<script>
import NavigationComponent from '../../components/NavigationComponent.vue'

export default {
    data(){
        return {
            baseUrl: window.location.origin,
        }
    },
    components: { NavigationComponent },
}
</script>

<style>

</style>