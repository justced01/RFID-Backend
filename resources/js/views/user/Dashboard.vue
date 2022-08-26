<template>
    <div class="relative w-[428px] h-[926px] bg-white mx-auto">
        <transition name="toast">
            <ToasterComponent v-if="showToast" />
        </transition>
        <div class="flex flex-col p-5 w-full h-auto relative overflow-scroll">
            <header class="flex flex-row justify-between mb-2">
                <div>
                    <p class="text-[18px] text-[#222222] font-[600]">Welcome Jane</p>
                    <p class="text-[12px] text-[#C1BFBF] font-[500]">Last login was on June 28, 2022 Friday</p>
                </div>
                <div>
                    <img :src="baseUrl + '/images/icons/logout-icon.png'" @click="logout">
                </div>
            </header>
            <div class="mb-4">
                <div class="w-full text-right text-[#B2B3B5]">1/3</div>
                <!-- <StudentCard /> -->
                <StudentCardSkeleton />
                <div class="dots mt-1 flex flex-row justify-center">
                    <span class="w-[8px] h-[8px] mx-0.5 rounded-full bg-[#464646]"></span>
                    <span class="w-[8px] h-[8px] mx-0.5 rounded-full bg-[#464646]"></span>
                    <span class="w-[8px] h-[8px] mx-0.5 rounded-full bg-[#464646]"></span>
                </div>
            </div>
            <div class="mb-6">
                <h2 class="mb-2 text-[16px] font-[500] leading-[19px]">Categories</h2>
                <div class="grid grid-rows-2 grid-flow-col gap-[8px] gap-y-4 place-items-center">
                    <router-link to="/user/attendance_record" class="w-[112px] h-[109px] p-3 rounded-lg text-center bg-[#215273]">
                        <img :src=" baseUrl + '/images/icons/attendance-icon.png'" class="mx-auto mb-2 p-5 rounded-full bg-[#2D6C97]">
                        <p class="text-white text-[14px] font-[400] leading-[17px] truncate">Attendance Record</p>
                    </router-link>
                    <div class="w-[112px] h-[109px] p-3 rounded-lg text-center bg-[#7CE495]">
                        <img :src=" baseUrl + '/images/icons/location-icon.png'" class="mx-auto mb-2 p-5 rounded-full bg-[#6EC984]">
                        <p class="text-white text-[14px] font-[400] leading-[17px]">GPS Tracking</p>
                    </div>
                    <div class="w-[112px] h-[109px] p-3 rounded-lg text-center bg-[#359D9E]">
                        <img :src=" baseUrl + '/images/icons/calendar-icon.png'" class="mx-auto mb-2 p-5 rounded-full bg-[#3DB1B3]">
                        <p class="text-white text-[14px] font-[400] leading-[17px]">Calendar</p>
                    </div>
                    <div class="w-[112px] h-[109px] p-3 rounded-lg text-center bg-[#58BB44]">
                        <img :src=" baseUrl + '/images/icons/payment-icon.png'" class="mx-auto mb-2 p-5 rounded-full bg-[#63CF4E]">
                        <p class="text-white text-[14px] font-[400] leading-[17px]">Payments</p>
                    </div>
                    <div class="w-[112px] h-[109px] p-3 rounded-lg text-center bg-[#5ADCA4]">
                        <img :src=" baseUrl + '/images/icons/announcement-icon.png'" class="mx-auto mb-2 p-5 rounded-full bg-[#55C595]">
                        <p class="text-white text-[14px] font-[400] leading-[17px]">Announcement</p>
                    </div>
                    <div class="w-[112px] h-[109px] p-3 rounded-lg text-center bg-[#305104]">
                        <img :src=" baseUrl + '/images/icons/billing-icon.png'" class="mx-auto mb-2 p-5 rounded-full bg-[#4D8303]">
                        <p class="text-white text-[14px] font-[400] leading-[17px]">Billing</p>
                    </div>
                </div>
            </div>
            <div >
                <div class="flex flex-row justify-between mb-2">
                    <h2 class="text-[16px] font-[500] leading-[19px]">News and Updates</h2>
                    <router-link to="#" class="text-[#0E62C5]">View all</router-link>
                </div>
                <div>
                    <img :src="baseUrl + '/images/announcement.png'">
                </div>
            </div>
            {{ baseUrl }}
            {{ accessToken }}
        </div>
        <NavigationComponent />
    </div>
</template>

<script>
import { ref } from 'vue'
import ToasterComponent from '../../components/ToasterComponent.vue'
import NavigationComponent from '../../components/NavigationComponent.vue'
import StudentCard from '../../components/StudentCard.vue'
import StudentCardSkeleton from '../../components/StudentCardSkeleton.vue'

export default {
    name: 'User Dashboard',
    data(){
        return {
            accessToken: '',
            baseUrl: window.location.origin,
        }
    },
    components: { ToasterComponent, NavigationComponent, StudentCard, StudentCardSkeleton },
    setup(){
        const showToast = ref(false)

        const triggerToast = () => {
            showToast.value = true
            setTimeout(() => showToast.value = false, 3000)
        }

        return { showToast, triggerToast }
    },
    // mounted(){
    //     axios.get('/api/users/show', { headers: {'Authorization' : `Bearer ${token}`}  })  
    //     .then( response => (
    //         this.user = response.data.data)
    //     )
    //     .catch((error) => {
    //         console.log(error)
    //     })
    // },  
    mounted: function(){ 
        this.emitter.on('send_access_token', data => {
            this.accessToken = data
        })
    }, 
    methods: {
        logout(e){
            e.preventDefault()
            this.$router.push('/')
        },
    }
}
</script>

<style>
.toast-enter-from {
    opacity: 0;
    transform: translateY(-60px);
}
.toast-enter-active {
    transition: all 0.3s ease;
}
.toast-leave-to {
    opacity: 0;
    transform: translateY(-60px);
}
.toast-leave-active {
    transition: all 0.3s ease;
}
</style>