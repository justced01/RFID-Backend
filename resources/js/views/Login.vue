<template>
    <div class="relative container w-1/4 h-full mx-auto mt-[130px] p-10 bg-white text-center">
        <h1 class="text-4xl font-bold">Login</h1>
        <p class="my-2">Welcome!</p>
        <div v-if="errorMessages" class="errors text-red-500">
            <p v-for="error in errorMessages" :key="error" class="my-1">
                {{ error }}
            </p>
        </div>
        <form @submit.prevent="handleLogin" class="flex flex-col my-5">
            <div class="flex flex-row my-2">
                <label class="basis-1/3">Email:</label>
                <input type="text" name="email" required v-model="email" class="px-2 py-0.5 basis-2/3 bg-gray-50 border border-slate-300 rounded-sm focus:border-blue-500">
            </div>
            <div class="flex flex-row my-2">
                <label class="basis-1/3">Password:</label>
                <input type="password" name="password" required v-model="password" class="px-2 py-0.5 basis-2/3 bg-gray-50 border border-slate-300 rounded-sm">
            </div>
            <div class="text-right my-2">
                <input type="submit" value="Login" class="px-4 py-2 rounded-md bg-green-600 hover:bg-green-800 text-white">
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data(){
        return {
            email: "",
            password: "",
            errorMessages: [],
            isLoggedIn: false,
        }
    },
    methods: {
        handleLogin(){
            // validation
            this.errorMessages = []
            this.email ? "" : this.errorMessages.push("Email is required.")
            this.password ? "" : this.errorMessages.push("Password is required.")

            if(this.errorMessages.length === 0){
                axios.post('api/users/login', {
                    email: this.email,
                    password: this.password
                })
                .then(response => {
                    if(response.data.status === 200){
                        this.emitter.emit('loggedIn', true);
                        this.$router.push(response.data.redirect)
                    } else {
                        this.errorMessages.push(response.data.message)
                    }
                })
                .catch(function(error) {
                    console.error(error);
                });
            }
        }
    }
}
</script>

<style scoped>
.content {
    background-color: white;
    margin: 6% 650px; 
    padding: 3%;
    text-align: center;
}

</style>