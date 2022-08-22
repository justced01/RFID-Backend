<template>
    <div class="relative container w-1/2 h-full mx-auto mt-[130px] p-10">
        <button class="w-full p-4 text-white bg-green-500" @click="clickme">CLICK ME</button>
    </div>
</template>

<script>
export default {
    data(){
    },
    methods: {
        clickme(){
            axios.post("/api/time_in", {
                student_name: "Jane Doe",
                parent_name: "John Doe",
            })
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });
        },
    },
}
</script>

<style>

</style>