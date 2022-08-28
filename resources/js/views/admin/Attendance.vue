<template>
    <div class="relative container w-full h-full mx-auto mt-[100px] p-2 ">
        <!-- <button @click="getAttendance" class="p-4 bg-red-500">click</button> -->
        <h1 class="my-4 text-4xl text-black font-bold">Attendance Logs</h1> 
        <table class="table-auto min-w-full bg-white shadow border border-slate-300 rounded-md">
            <tr class="bg-[#F9F9F9] text-left">
                <th class="px-6 py-2">No.</th>
                <th class="px-6 py-2">Students</th>
                <th class="px-6 py-2">Parents/Guardians</th>
                <th class="px-6 py-2">Time In</th>
                <th class="px-6 py-2">Time Out</th>
                <th class="px-6 py-2">Date</th>
                <th class="px-6 py-2">RFID Tag</th>
            </tr>
            <tr v-for="record in records" :key="record.id">
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">{{ record.attendance_id }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">{{ record.student_name }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">{{ record.parent_name }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">{{ record.time_in }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">{{ record.time_out }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">{{ record.date }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">{{ record.rfid }}</td>
            </tr>
        </table>
    </div>
</template>

<script>
export default {
    data(){
        return {
            isLoggedIn: true,
            records: null,
        };
    },
    methods: {

    },
    mounted(){
        setInterval(() => {
            axios.get('/api/admin/show_attendance')  
            .then(response => (this.records = response.data.data))
        }, 5000);
    },
};
</script>