<template>
    <div class="w-[380px] h-[192px] flex flex-row justify-between p-5 bg-[#00A950] rounded-[12px]" @click="$store.commit('setStudent', this.latestTimeIn)">
        <div class="flex flex-col">
            <div class="mb-4">
                <p class="text-[10px] font-[400] leading-[12px] text-[#FFF2B3]">{{ status }}</p>
                <div class="flex flex-row">
                    <span class="text-[35px] font-[700] leading-[42px] text-white">{{ timestamp }}</span>
                    <div class="mt-2 ml-1 flex flex-col text-[#FFF2B3]">
                        <span :class="{ 'opacity-100': am }" class="text-[10px] font-[400] leading-[12px] opacity-50">AM</span>
                        <span :class="{ 'opacity-100': pm }" class="text-[10px] font-[400] leading-[12px] opacity-50">PM</span>
                    </div>
                </div>
                <p class="text-[10px] font-[400] leading-[12px] text-[#FFF2B3]">{{ date }}</p>
            </div>
            <div class="flex flex-col ">
                <p class="text-[10px] font-[400] leading-[12px] text-[#FFF2B3]"><img :src="baseUrl + '/images/icons/temperature-icon.png'" class="inline">Temperature</p>
                <p class="text-[25px] font-[700] leading-[30px] text-white">{{ latestTimeIn.temperature }}°</p>
                <p class="w-[60px] h-[16px] px-3 py-0.5 text-[10px] font-[500] leading-[12px] rounded-full bg-white text-[#447604]">Normal</p>
            </div>
        </div>
        <div class="flex flex-col items-end ">
            <img :src="baseUrl + '/images' + latestTimeIn.profile_path" class="w-[90px] h-[90px]">
            <p class="text-[25px] font-[600] leading-[32px] text-white text-right tracking-[0.8px]">{{ latestTimeIn.student_name }}</p>
            <p class="w-[134px] h-[24px] text-[10px] font-[400] leading-[12px] text-right text-[#FFF2B3]">Great! Your daughter just arrived at the school.</p>
        </div>
    </div>
</template>

<script>
import moment from 'moment'

export default {
    data(){
        return {
            baseUrl: window.location.origin,
            latestTimeIn: [],
            status: null,
            am: false,
            pm: false,
        }
    },
    created(){
        axios.post('/api/users/show_student_history', { headers: { Authorization: `Bearer ${localStorage.getItem('user_token')}` } })  
            .then(response => (this.latestTimeIn = response.data.data))
        Echo.channel('update-student-card')
            .listen('UpdateStudentCard', (e) => {
                axios.post('/api/users/show_student_history', { headers: { Authorization: `Bearer ${localStorage.getItem('user_token')}` } })
                .then(response => {
                    this.latestTimeIn = response.data.data
                })
        })
    },
    mounted(){
        this.latestTimeIn.time_in !== null ? this.status = 'Time IN' : this.status = 'Time OUT' 
    },
    methods: {
    },
    computed: {
        timestamp(){
            if(this.latestTimeIn.time_in !== null){
                if(moment(this.latestTimeIn.time_in, 'HH:mm:ss').format('hh:mm A').includes('AM')){
                    this.am = true
                }
                else {
                    this.pm = true
                }
                return moment(this.latestTimeIn.time_in, 'HH:mm:ss').format('hh:mm')
            }
            else {
                if(moment(this.latestTimeIn.time_out, 'HH:mm:ss').format('hh:mm A').includes('AM')){
                    this.am = true
                }
                else {
                    this.pm = true
                }
                return moment(this.latestTimeIn.time_out, 'HH:mm:ss').format('hh:mm')
            }
        },
        date: function(){
            return moment(this.latestTimeIn.date).format('dddd - MMMM DD, YYYY')
        },
    }
}
</script>

<style>

</style>