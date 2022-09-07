<template>
    <div class="relative container w-1/2 h-full mx-auto mt-[130px] p-10">
        <button class="w-full mb-4 p-4 text-white bg-green-500" @click="time_in">Initiate Login</button>
        <button class="w-full p-4 text-white bg-green-500" @click="time_out">Initiate Logout</button>
    </div>
</template>

<script>
export default {
    data(){
        
    },
    methods: {
        time_in(){
            axios.post('/api/admin/time_in')
            .then(response => {
                axios.post('/api/admin/add_notification', {
                    title: 'Login',
                    description: 'has login to school at',
                    status: 'success'
                })
                axios.get('/api/admin/show_notification')
                axios.get('/api/admin/update_count_notification')
                axios.get('/api/admin/update_student_card')
                console.log(response);
            })
            .catch(error => {
                console.log(error);
            });
        },
        time_out(){
            axios.post('/api/admin/time_out')
            .then(response => {
                axios.post('/api/admin/add_notification', {
                    title: 'Logout',
                    description: 'has logout to school at',
                    status: 'success'
                })
                axios.get('/api/admin/show_notification')
                axios.get('/api/admin/update_count_notification')
                axios.get('/api/admin/update_student_card')
                console.log(response);
            })
            .catch(error => {
                console.log(error);
            });
        },
    },
}
</script>

<style>

</style>