<template>
    <div class="w-1/4 absolute left-[40%] top-[20%] rounded-md border border-gray-300 shadow-md">
        <div class="p-10 bg-white text-center">
            <h1 class="text-2xl font-bold">USC Admin Login Portal</h1>
            <p class="my-2">Welcome!</p>
            <div v-if="errorMessages" class="errors text-red-500">
                <p v-for="error in errorMessages" :key="error" class="my-1">
                    {{ error }}
                </p>
            </div>
            <form @submit.prevent="handleLogin" class="flex flex-col my-5">
                <div class="flex flex-row my-2">
                    <label class="basis-1/3">Email:</label>
                    <input type="text" name="email" required 
                        v-model="user.email" 
                        class="px-2 py-0.5 basis-2/3 bg-gray-50 border border-slate-300 rounded-sm focus:border-blue-500">
                </div>
                <div class="flex flex-row my-2">
                    <label class="basis-1/3">Password:</label>
                    <input type="password" name="password" required 
                        v-model="user.password" 
                        class="px-2 py-0.5 basis-2/3 bg-gray-50 border border-slate-300 rounded-sm">
                </div>
                <div class="text-right my-2">
                    <input type="submit" value="Login" class="px-4 py-2 rounded-md bg-green-600 hover:bg-green-800 text-white">
                </div>
            </form>
            <router-link to="/user" class="text-right">User Login</router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Login Admin Page',
    data(){
        return {
            user: {
                email: '',
                password: '',
            },
            errorMessages: [],
        }
    },
    methods: {
        handleLogin(){
            // validation
            this.errorMessages = []
            this.user.email ? '' : this.errorMessages.push('Email is required.')
            this.user.password ? '' : this.errorMessages.push('Password is required.')

            if(this.errorMessages.length === 0){
                this.$store.dispatch('loginUser', this.user)
                this.$store.commit('isLoggedIn')
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