<template>
    <div class="content">
        <h1>Login</h1>
        <div v-if="errorMessages" class="errors">
            <p v-for="error in errorMessages" :key="error">
                {{ error }}
            </p>
        </div>
        <form @submit.prevent="handleLogin" class="login-form">
            <div class="form-input-fields">
                <label>Email: </label>
                <input type="text" name="email" required v-model="email">
            </div>
            <div class="form-input-fields">
                <label>Password: </label>
                <input type="password" name="password" required v-model="password">
            </div>
            <div class="login-btn">
                <input type="submit" value="Login">
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
        }
    },
    methods: {
        handleLogin(){
            // validation
            this.errorMessages = []
            this.email ? "" : this.errorMessages.push("Email is required.")
            this.password ? "" : this.errorMessages.push("Password is required.")
        }
    }
}
</script>