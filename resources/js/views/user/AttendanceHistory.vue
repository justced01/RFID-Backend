<template>
    <div class="relative w-[428px] h-[926px] bg-white mx-auto">
        <div class="w-full h-[392px] flex flex-col rounded-t-[42px] bg-[#00A950]">
            <div class="flex flex-row items-center justify-center px-5 py-3">
                <a @click="$router.go(-1)" class="text-[13px] font-[400] leading-[16px] text-[#77C90D]">
                    <img :src="baseUrl + '/images/icons/arrow-left-icon.png'" class="inline"> 
                Back</a>
                <h1 class="mx-auto ml-[95px] text-[24px] font-[500] leading-[29px] text-white">{{ $store.state.currentStudent.student.student_name }}</h1>
            </div>
            <div class="flex flex-col items-center mb-6">
                <img :src="baseUrl + '/images' + $store.state.currentStudent.student.profile_path" class="w-[136px] h-[136px] mb-3"> 
                <p class="text-[12px] font-[400] leading-[12px] text-[#FFF2B3]">{{ $store.state.currentStudent.student.student_name }} is at school</p>
                <div class="flex flex-row mb-1">
                    <span class="text-[37px] font-[700] leading-[42px] text-white">{{ timestamp }}</span>
                    <div class="mt-2 ml-1 flex flex-col text-[#FFF2B3]">
                        <span :class="{ 'opacity-100': am }" class="text-[10px] font-[400] leading-[12px] opacity-50">AM</span>
                        <span :class="{ 'opacity-100': pm }" class="text-[10px] font-[400] leading-[12px] opacity-50">PM</span>
                    </div>
                </div>
                <p class="text-[12px] font-[400] leading-[12px] text-[#FFF2B3]">{{ date }}</p>
            </div>
            <div class="flex flex-col items-center text-center">
                <p class="mb-1 text-[10px] font-[500] leading-[12px] text-[#FFF2B3]"><img :src="baseUrl + '/images/icons/temperature-icon.png'" class="inline">Temperature</p>
                <p class="mb-1 ml-2 text-[26px] font-[700] leading-[30px] text-white">{{ $store.state.currentStudent.student.temperature }}°</p>
                <p class="w-[60px] h-[16px] mb-1 px-3 py-0.5 text-[12px] font-[500] leading-[12px] rounded-full bg-white text-[#447604]">Normal</p>
            </div>
        </div>
        <div class="w-full h-[400px] px-6 py-4 overflow-auto">
            <p class="text-[13px] font-[400] leading-[16px] text-[#848484]">Attendance History</p>
            <div class="px-3 py-2">
                <ul v-if="attendanceHistory.length !== 0">
                    <li v-for="history in attendanceHistory" :key="history.attendance_id" class="flex flex-row justify-between items-center mb-6">
                        <div class="flex flex-row items-center">
                            <img :src="baseUrl + '/images/icons/circle-arrow-up-icon.png'" class="w-[34px] h-[34px] mr-3">
                            <div class="flex flex-col">
                                <p v-if="history.time_in ? status = 'Login Successfully' : status = 'Logout Successfully'" class="mb-1 text-[16px] font-[500] leading-[19px] text-[#0E0E0E]">{{ status }}</p>
                                <p class="text-[13px] font-[400] leading-[16px] text-[#848484]">{{ convertDate(history.date) }}</p>
                            </div>
                        </div>
                        <p class="text-[14px] font-[500] leading-[17px] text-[#06943F]">{{ history.time_in ? convertTime(history.time_in) : convertTime(history.time_out) }}</p>
                    </li>
                </ul>
            </div>
        </div>
        <NavigationComponent />
    </div>
</template>

<script>
import moment from 'moment'
import NavigationComponent from '../../components/NavigationComponent.vue'

export default {
    data(){
        return {
            baseUrl: window.location.origin,
            attendanceHistory: {},
            am: false,
            pm: false,
            status: '',
        }
    },
    components: { NavigationComponent },
    computed: {
        timestamp(){
            if(this.$store.state.currentStudent.student.time_in !== null){
                if(moment(this.$store.state.currentStudent.student.time_in, 'HH:mm:ss').format('hh:mm A').includes('AM')){
                    this.am = true
                }
                else {
                    this.pm = true
                }
                return moment(this.$store.state.currentStudent.student.time_in, 'HH:mm:ss').format('hh:mm')
            }
            else {
                if(moment(this.$store.state.currentStudent.student.time_out, 'HH:mm:ss').format('hh:mm A').includes('AM')){
                    this.am = true
                }
                else {
                    this.pm = true
                }
                return moment(this.$store.state.currentStudent.student.time_out, 'HH:mm:ss').format('hh:mm')
            }

        },
        date: function(){
            return moment(this.$store.state.currentStudent.student.date).format('dddd - MMMM DD, YYYY')
        },
    },
    created(){
        axios.post('/api/users/get_student_logs', { 
            headers: { Authorization: `Bearer ${localStorage.getItem('user_token')}` },
            student_id: this.$store.state.currentStudent.student.student_id
        })  
        .then(response => {
            this.attendanceHistory = response.data.data
        })
    },
    methods: {
        convertDate(date){
            return moment(date).format('dddd - MMMM DD, YYYY')  
        },
        convertTime(time){
            return moment(time, 'HH:mm:ss').format('hh:mm a')
        }
    },
}
</script>

<style>

</style>