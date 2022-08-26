<template>
    <div class="relative w-[428px] h-[926px] bg-white mx-auto">
        <div class="w-full h-[392px] flex flex-col rounded-t-[42px] bg-[#00A950]">
            <div class="flex flex-row items-center justify-center px-5 py-3">
                <a @click="$router.go(-1)" class="text-[13px] font-[400] leading-[16px] text-[#77C90D]">
                    <img :src="baseUrl + '/images/icons/arrow-left-icon.png'" class="inline"> 
                Back</a>
                <h1 class="mx-auto ml-[95px] text-[24px] font-[500] leading-[29px] text-white">Samantha</h1>
            </div>
            <div class="flex flex-col items-center mb-6">
                <img :src="baseUrl + '/images/samantha.png'" class="w-[136px] h-[136px] mb-3"> 
                <p class="text-[12px] font-[400] leading-[12px] text-[#FFF2B3]">Sam is at school</p>
                <div class="flex flex-row mb-1">
                    <span class="text-[37px] font-[700] leading-[42px] text-white">08:48</span>
                    <div class="mt-2 ml-1 flex flex-col text-[#FFF2B3]">
                        <span class="text-[10px] font-[400] leading-[12px]">AM</span>
                        <span class="text-[10px] font-[400] leading-[12px]">PM</span>
                    </div>
                </div>
                <p class="text-[12px] font-[400] leading-[12px] text-[#FFF2B3]">Monday - July 04, 2022</p>
            </div>
            <div class="flex flex-col items-center text-center">
                <p class="mb-1 text-[10px] font-[500] leading-[12px] text-[#FFF2B3]"><img :src="baseUrl + '/images/icons/temperature-icon.png'" class="inline">Temperature</p>
                <p class="mb-1 ml-2 text-[26px] font-[700] leading-[30px] text-white">36.2°</p>
                <p class="w-[60px] h-[16px] mb-1 px-3 py-0.5 text-[12px] font-[500] leading-[12px] rounded-full bg-white text-[#447604]">Normal</p>
            </div>
        </div>
        <div class="px-6 py-4">
            <p class="text-[13px] font-[400] leading-[16px] text-[#848484]">Attendance History</p>
            <div class="px-3 py-2">
                <ul>
                    <li class="flex flex-row justify-between items-center mb-6">
                        <div class="flex flex-row items-center">
                            <img :src="baseUrl + '/images/icons/circle-arrow-up-icon.png'" class="w-[34px] h-[34px] mr-3">
                            <div class="flex flex-col">
                                <p class="mb-1 text-[16px] font-[500] leading-[19px] text-[#0E0E0E]">Login Successfully</p>
                                <p class="text-[13px] font-[400] leading-[16px] text-[#848484]">Today - July 04, 2022</p>
                            </div>
                        </div>
                        <p class="text-[14px] font-[500] leading-[17px] text-[#06943F]">07:05 am</p>
                    </li>
                    <li class="flex flex-row justify-between items-center mb-4">
                        <div class="flex flex-row items-center">
                            <img :src="baseUrl + '/images/icons/circle-arrow-up-icon.png'" class="w-[34px] h-[34px] mr-3">
                            <div class="flex flex-col">
                                <p class="mb-1 text-[16px] font-[500] leading-[19px] text-[#0E0E0E]">Login Successfully</p>
                                <p class="text-[13px] font-[400] leading-[16px] text-[#848484]">Yesterday - July 03, 2022</p>
                            </div>
                        </div>
                        <p class="text-[14px] font-[500] leading-[17px] text-[#06943F]">07:05 am</p>
                    </li>
                    <li class="flex flex-row justify-between items-center mb-4">
                        <div class="flex flex-row items-center">
                            <img :src="baseUrl + '/images/icons/circle-arrow-up-icon.png'" class="w-[34px] h-[34px] mr-3">
                            <div class="flex flex-col">
                                <p class="mb-1 text-[16px] font-[500] leading-[19px] text-[#0E0E0E]">Logout Failed</p>
                                <p class="text-[13px] font-[400] leading-[16px] text-[#848484]">Friday - July 01, 2022</p>
                            </div>
                        </div>
                        <p class="text-[14px] font-[500] leading-[17px] text-[#C50E0E]">Missed</p>
                    </li>
                    <li class="flex flex-row justify-between items-center mb-4">
                        <div class="flex flex-row items-center">
                            <img :src="baseUrl + '/images/icons/circle-arrow-up-icon.png'" class="w-[34px] h-[34px] mr-3">
                            <div class="flex flex-col">
                                <p class="mb-1 text-[16px] font-[500] leading-[19px] text-[#0E0E0E]">Login Successfully</p>
                                <p class="text-[13px] font-[400] leading-[16px] text-[#848484]">Friday - July 04, 2022</p>
                            </div>
                        </div>
                        <p class="text-[14px] font-[500] leading-[17px] text-[#06943F]">07:05 am</p>
                    </li>
                </ul>
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