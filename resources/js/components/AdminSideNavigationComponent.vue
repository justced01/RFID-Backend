<template>
    <div class="fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48 bg-red">
        <div class="md:mt-12 md:w-58 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
            <ul class="list-reset flex flex-col h-screen py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
                <div>
                    <li class="mr-3 flex-1">
                        <router-link to="/admin/dashboard" class="flex py-1 md:py-3 pl-1 align-middle text-[#447604] no-underline hover:text-[#447604] hover:bg-gray-200">
                            <i class="fas fa-user pr-0 md:pr-3"></i>
                            <div class="flex justify-between w-full pb-1 md:pb-0 text-xs md:text-base text-black">
                                <span class="text-md font-bold">Users</span>
                                <span class="text-xs text-[#447604] ml-5 p-1 bg-[#E6ECE1] rounded-full">24</span>
                            </div>
                        </router-link>
                    </li>
                    <li class="mr-3 flex-1">
                        <router-link to="/admin/attendance" class="flex py-1 md:py-3 pl-1 align-middle text-[#447604] no-underline hover:text-[#447604] hover:bg-gray-200">
                            <i class="fa fa-folder pr-0 md:pr-3"></i>
                            <div class="flex justify-between w-full pb-1 md:pb-0 text-xs md:text-base text-black">
                                <span class="text-md font-bold">Attendance Logs</span>
                                <span class="text-xs text-[#447604] ml-5 p-1 bg-[#E6ECE1] rounded-full">24</span>
                            </div>
                        </router-link>
                    </li>
                    <li class="mr-3 flex-1">
                        <router-link to="#" class="flex py-1 md:py-3 pl-1 align-middle text-[#447604] no-underline hover:text-[#447604] hover:bg-gray-200">
                            <i class="fa-regular fa-calendar pr-0 md:pr-3"></i>
                            <div class="flex justify-between w-full pb-1 md:pb-0 text-xs md:text-base text-black">
                                <span class="text-md font-bold">Calendar</span>
                                <span class="text-xs text-[#447604] ml-5 p-1 bg-[#E6ECE1] rounded-full">24</span>
                            </div>
                        </router-link>
                    </li>
                <li class="mr-3 flex-1">
                        <a href="#" class="flex py-1 md:py-3 pl-1 align-middle text-[#447604] no-underline hover:text-[#447604] hover:bg-gray-200">
                            <i class="fa-regular fa-clock pr-0 md:pr-2"></i>
                            <div class="flex justify-between w-full pb-1 md:pb-0 text-xs md:text-base text-black">
                                <span class="text-md font-bold">Announcements</span>
                                <span class="text-xs text-[#447604] ml-5 p-1 bg-[#E6ECE1] rounded-full">24</span>
                            </div>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="#" class="flex py-1 md:py-3 pl-1 align-middle text-[#447604] no-underline hover:text-[#447604] hover:bg-gray-200">
                            <i class="fa fa-flag pr-0 md:pr-3"></i>
                            <div class="flex justify-between w-full pb-1 md:pb-0 text-xs md:text-base text-black">
                                <span class="text-md font-bold">Report Logs</span>
                                <span class="text-xs text-[#447604] ml-5 p-1 bg-[#E6ECE1] rounded-full">24</span>
                            </div>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-[#447604] font-bold no-underline hover:text-[#447604] hover:bg-gray-200">
                            <i class="fa-solid fa-sliders pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-black block md:inline-block">Settings</span>
                        </a>
                    </li>
                </div>
                <div>
                    <li class="mr-3 flex-1">
                        <a @click="logout" class="block py-1 md:py-3 pl-1 align-middle text-[#447604] font-bold no-underline cursor-pointer hover:text-[#447604] hover:bg-gray-200">
                            <i class="fas fa-sign-out-alt pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-black block md:inline-block">Logout</span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <router-link to="/admin/click" class="block py-1 md:py-3 pl-1 align-middle text-[#447604] font-bold no-underline hover:text-[#447604] hover:bg-gray-200">
                            <i class="fas fa-sign-out-alt pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-black block md:inline-block">Click Here</span>
                        </router-link>
                    </li>
                </div>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Admin Navigation',
    data(){

    },
    methods: {
        logout(e){
            e.preventDefault()
            this.$store.commit('showAdminNav')
            this.$store.commit('destroyToken')
            this.$router.push('/')
        },
    }
}
</script>

<style>

</style>