<template>
    <div class="relative w-[428px] h-[926px] bg-white mx-auto">
        <div class="flex flex-row items-center justify-center mb-1 px-7 py-3">
            <h1 class="mx-auto text-[18px] font-[400] leading-[21px] text-[#0E0E0E]">Notifications</h1>
        </div>
        <div class="flex flex-row justify-center">
            <a @click="showLogs" :class="{ active: logs }" class="px-10 pb-4 text-[16px] font-[400] leading-[24px] text-black border-b-2 focus:outline-none focus:text-[#00A950] focus:border-b-2 focus:border-[#00A950] focus:pb-4">Logs</a>
            <a @click="showTeacherDesk" :class="{ active: teacherDesk }" class="px-10 pb-4 text-[16px] font-[400] leading-[24px] text-black focus:outline-none focus:text-[#00A950] focus:border-b-2 focus:border-[#00A950] focus:pb-4">Teacher Desk</a>
            <a @click="showHistory" :class="{ active: history }" class="px-10 pb-4 text-[16px] font-[400] leading-[24px] text-black focus:outline-none focus:text-[#00A950] focus:border-b-2 focus:border-[#00A950] focus:pb-4">History</a>
        </div>
        <div class="flex flex-col p-5">
            <LogsComponent v-if="logs"/>
            <TeacherDeskComponent v-if="teacherDesk"/>
            <HistoryComponent v-if="history"/>
        </div>
        <NavigationComponent />
    </div>
</template>

<script>
import NavigationComponent from '../../components/NavigationComponent.vue'
import LogsComponent from '../../components/LogsComponent.vue'
import TeacherDeskComponent from '../../components/TeacherDeskComponent.vue'
import HistoryComponent from '../../components/HistoryComponent.vue'

export default {
    data(){
        return {
            logs: true,
            teacherDesk: false,
            history: false,
            baseUrl: window.location.origin,
        }
    },
    components: { NavigationComponent, LogsComponent, TeacherDeskComponent, HistoryComponent },
    methods: { 
        showLogs(){
            this.logs = true
            this.teacherDesk = false
            this.history = false
        },
        showTeacherDesk(){
            this.logs = false
            this.teacherDesk = true
            this.history = false
        },
        showHistory(){
            this.logs = false
            this.teacherDesk = false
            this.history = true
        },
    }
}
</script>

<style>
.active {
    border-bottom: 2px solid #00A950;
}
</style>