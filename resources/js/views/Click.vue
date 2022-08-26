<template>
    <div class="relative container w-1/2 h-full mx-auto mt-[130px] p-10">
        <button class="w-full p-4 text-white bg-green-500" @click="clickme">Initiate</button>
    </div>
</template>

<script>
export default {
    data(){
        
    },
    methods: {
        clickme(){
            axios.post("/api/admin/time_in", {
                student_name: "Samantha",
                parent_name: "Jane Doe",
            })
            .then(function (response){
                this.emitter.emit('triggerToast', {
                    
                });
                console.log(response);
            })
            .catch(function (error){
                console.log(error);
            });
        },
    },
}
</script>

<style>

</style>