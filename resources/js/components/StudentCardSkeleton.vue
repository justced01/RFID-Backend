<template>
    <div class="w-[380px] h-[192px] flex flex-row justify-between p-5 bg-[#00A950] rounded-[12px] " @click="triggerToast">
        <div class="flex flex-col animate-pulse">
            <div class="mb-4">
                <p class="bg-white h-[12px] w-[40px] mb-1 rounded-md opacity-50"></p>
                <div class="flex flex-row">
                    <span class="bg-white h-[35px] w-[120px] mb-1 rounded-md opacity-50"></span>
                </div>
                <p class="bg-white h-[12px] w-[100px] rounded-md opacity-50"></p>
            </div>
            <div class="flex flex-col">
                <p class="bg-white h-[12px] w-[70px] mb-1 rounded-md opacity-50"></p>
                <p class="bg-white h-[35px] w-[55px] mb-1 rounded-md opacity-50"></p>
                <p class="w-[60px] h-[12px] bg-white rounded-md opacity-50"></p>
            </div>
        </div>
        <div class="flex flex-col items-end animate-pulse">
            <div class="rounded-full bg-white h-[80px] w-[80px] mb-2 opacity-50"></div>
            <p class="bg-white h-[35px] w-[120px] mb-1 rounded-md opacity-50"></p>
            <p class="w-[110px] h-[12px] bg-white rounded-md opacity-50"></p>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            
        }
    },
}
</script>

<style>

</style>