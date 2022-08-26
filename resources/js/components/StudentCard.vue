<template>
    <div class="w-[380px] h-[192px] flex flex-row justify-between p-5 bg-[#00A950] rounded-[12px]" @click="triggerToast">
        <div class="flex flex-col">
            <div class="mb-4">
                <p class="text-[10px] font-[400] leading-[12px] text-[#FFF2B3]">Time IN</p>
                <div class="flex flex-row">
                    <span class="text-[35px] font-[700] leading-[42px] text-white">08:48</span>
                    <div class="mt-2 ml-1 flex flex-col text-[#FFF2B3]">
                        <span class="text-[10px] font-[400] leading-[12px]">AM</span>
                        <span class="text-[10px] font-[400] leading-[12px]">PM</span>
                    </div>
                </div>
                <p class="text-[10px] font-[400] leading-[12px] text-[#FFF2B3]">Monday - July 04, 2022</p>
            </div>
            <div class="flex flex-col ">
                <p class="text-[10px] font-[400] leading-[12px] text-[#FFF2B3]"><img :src="baseUrl + '/images/icons/temperature-icon.png'" class="inline">Temperature</p>
                <p class="text-[25px] font-[700] leading-[30px] text-white">36.2°</p>
                <p class="w-[60px] h-[16px] px-3 py-0.5 text-[10px] font-[500] leading-[12px] rounded-full bg-white text-[#447604]">Normal</p>
            </div>
        </div>
        <div class="flex flex-col items-end ">
            <img :src="baseUrl + '/images/samantha.png'">
            <p class="text-[25px] font-[600] leading-[32px] text-white text-right tracking-[0.8px]">Samantha</p>
            <p class="w-[134px] h-[24px] text-[10px] font-[400] leading-[12px] text-right text-[#FFF2B3]">Great! Your daughter just arrived at the school.</p>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            baseUrl: window.location.origin,
        }
    },
}
</script>

<style>

</style>