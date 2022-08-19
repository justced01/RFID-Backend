<template>
    <div class="content">
        <h1>Login</h1>
        <p>Welcome!</p>
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

            if(this.errorMessages.length === 0){
                axios.post('api/users/login', {
                    email: this.email,
                    password: this.password
                })
                .then(response => {
                    if(response.data.status === 200){
                        let accessToken = response.data.access_token
                        let user = response.data.user_data
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
    .login-form {
        margin: 30px;
        padding: 10px;
        text-align: left;
    }
        .form-input-fields, .login-btn {
            margin: 10px;
        }
        .form-input-fields {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
            .form-input-fields input[type=text], .form-input-fields input[type=password] {
                background-color: #eee;
                border: 1px solid silver;
                border-radius: 5px;
                padding: 7px;
                width: 230px;
            }
            .login-btn {
                margin-top: 20px;
                text-align: right;
            }
                .login-btn input {
                    background-color: #10AE4D;
                    border-radius: 7px;
                    border: none;
                    color: white;
                    cursor: pointer;
                    font-weight: bold;
                    padding: 10px 25px;
                }
                .login-btn input:hover {
                    background-color: #008131;
                }
.errors {
    color: crimson;
}
</style>