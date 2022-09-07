<template>
    <div class="relative w-[428px] h-[926px] bg-white mx-auto">
        <LoaderComponent />
        <div class="flex flex-col justify-around items-center h-full p-5">
            <div class="basis-1/4">
                <img :src="'images/usc-logo-with-logo.png'" class="mt-5 drop-shadow-none">
            </div>
            <div class="basis-1/4 text-center">
                <h1 class="text-[27px] font-medium">School Attendance Management System</h1>
            </div>
            <div class="basis-1/6">
                <h2 class="text-[27px] font-medium">Login</h2>
            </div>
            <div class="basis-3/4">
                <form @submit.prevent="handleLogin" class="flex flex-col w-[364px] ">
                    <div class="flex flex-col flex-start relative">
                        <img :src="'images/icons/message-icon.png'" class="absolute left-3 bottom-8">
                        <label class="text-[13px] font-medium">Email Address</label>
                        <input type="text" name="email" placeholder="Email address" v-model="user.email" required 
                            class="my-3 rounded-lg py-[16px] px-[8px] pl-10 border border-[#464646] placeholder:text-[13px] placeholder:font-medium">
                    </div>
                    <div class="flex flex-col flex-start relative">
                        <img :src="'images/icons/password-icon.png'" class="absolute left-3 bottom-8">
                        <label class="text-[13px] font-medium">Password</label>
                        <img :src="'images/icons/show-password.png'" @click="toggleShow()" class="absolute right-4 bottom-8">
                        <input type="password" name="password" placeholder="Password" required
                            v-if="hidePassword" 
                            v-model="user.password"  
                            class="my-3 rounded-lg py-[16px] px-[8px] pl-10 border border-[#464646] placeholder:text-[13px] placeholder:font-medium">
                        <input type="text" name="password" placeholder="Password" required
                            v-else 
                            v-model="user.password"
                            class="my-3 rounded-lg py-[16px] px-[8px] pl-10 border border-[#464646] placeholder:text-[13px] placeholder:font-medium">
                    </div>
                    <div class="text-right">
                        <router-link to="/forgot-password" class="w-[40px] text-[#00A950]">Forgot Password</router-link>
                    </div>
                    <div class="flex flex-col">
                        <input type="submit" value="Login" class="bg-[#00A950] text-white w-full my-3 p-5 rounded-lg">
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import LoaderComponent from '../../components/LoaderComponent.vue'

export default {
    name: 'Login User Page',
    data(){
        return {
            hidePassword: true,
            user: {
                email: '',
                password: '',
            },
            errorMessages: [],
        }
    },
    components: { LoaderComponent },
    methods: {
        toggleShow(){
            this.hidePassword = !this.hidePassword
        },
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

<style>
.bg-usc-loader {
    background-image: url('images/bg-loader.png');
}
</style>