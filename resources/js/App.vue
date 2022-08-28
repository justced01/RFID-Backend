<template>
    <!--Nav-->
    <nav v-if="isLoggedIn" class="pt-2 md:pt-2 pb-1 px-5 mt-0 h-auto fixed w-full z-20 top-0">
        <div class="flex flex-wrap items-center">
            <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-black">
                <router-link to="/" class="font-bold text-xl">USC CMS</router-link>
            </div>
            <div class="flex flex-1 md:w-1/3 justify-center md:justify-start text-black px-2">
                <span class="relative w-full">
                    <input type="search" placeholder="Search" class="w-full bg-white text-black transition border border-transparent focus:outline-none focus:border-gray-400 rounded py-3 px-2 pl-10 appearance-none leading-normal">
                    <div class="absolute search-icon" style="top: 1rem; left: .8rem;">
                        <svg class="fill-current pointer-events-none text-black w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
                        </svg>
                    </div>
                </span>
            </div>
            <div class="flex w-full pt-2 content-center justify-between md:w-1/3 md:justify-end">
                <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                    <li class="flex-1 md:flex-none md:mr-3">
                        <a class="inline-block py-2 px-4 text-black no-underline" href="#"></a>
                    </li>
                    <li class="flex-1 md:flex-none md:mr-3">
                        <div class="relative inline-block">
                            <button @click="toggleDD('myDropdown')" class="drop-button text-black focus:outline-none"> <span class="pr-2"><i class="em em-robot_face border border-green-500 text-xl rounded-full"></i></span>Jane Doe <svg class="h-3 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg></button>
                            <div id="myDropdown" class="dropdownlist absolute bg-white text-black right-0 mt-3 p-3 overflow-auto z-30 rounded-md invisible">
                                <a href="#" class="p-2 hover:bg-gray-200 text-black text-sm no-underline hover:no-underline block"><i class="fa fa-user fa-fw"></i> Profile</a>
                                <a href="#" class="p-2 hover:bg-gray-200 text-black text-sm no-underline hover:no-underline block"><i class="fa fa-cog fa-fw"></i> Change Password</a>
                                <div class="border border-gray-800"></div>
                                <a href="#" class="p-2 hover:bg-gray-200 text-black text-sm no-underline hover:no-underline block"><i class="fas fa-sign-out-alt fa-fw"></i> Log Out</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="flex flex-col md:flex-row">
        <div class="fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48 bg-red">
            <div class="md:mt-12 md:w-58 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                <ul v-if="isLoggedIn" class="list-reset flex flex-col h-screen py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
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
                            <router-link to="/attendance" class="flex py-1 md:py-3 pl-1 align-middle text-[#447604] no-underline hover:text-[#447604] hover:bg-gray-200">
                                <i class="fa fa-folder pr-0 md:pr-3"></i>
                                <div class="flex justify-between w-full pb-1 md:pb-0 text-xs md:text-base text-black">
                                    <span class="text-md font-bold">Attendance Logs</span>
                                    <span class="text-xs text-[#447604] ml-5 p-1 bg-[#E6ECE1] rounded-full">24</span>
                                </div>
                            </router-link>
                        </li>
                        <li class="mr-3 flex-1">
                            <router-link to="/calender" class="flex py-1 md:py-3 pl-1 align-middle text-[#447604] no-underline hover:text-[#447604] hover:bg-gray-200">
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
                            <router-link to="/click" class="block py-1 md:py-3 pl-1 align-middle text-[#447604] font-bold no-underline hover:text-[#447604] hover:bg-gray-200">
                                <i class="fas fa-sign-out-alt pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-black block md:inline-block">Click Here</span>
                            </router-link>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
import DashboardUser from './views/user/Dashboard.vue'
export default {
    name: 'App',
    data(){
        return {
            isLoggedIn: false,
        }
    },   
    components: { 
        DashboardUser 
    },
    mounted: function(){ 
        this.emitter.on('loggedIn', data => {
            this.isLoggedIn = data
        })
    },  
    methods: {
        logout(e){
            e.preventDefault()
            this.isLoggedIn = false
            this.$router.push('/')
        },
        toggleDD(myDropMenu) {
            document.getElementById(myDropMenu).classList.toggle("invisible")
        }
    }
}
</script>

<style>
#app {
  font-family: 'Georama', Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
}
footer {
    background-color: #10AE4D;
    color: white;
    margin-top: auto; 
    min-height: 50px;
    text-align: center;
}
</style>

