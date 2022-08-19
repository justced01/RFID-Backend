<template>
    <div class="container">
        <header>
            <nav v-if="isLoggedIn">
                <router-link to="/" class="nav-item nav-link">USC</router-link>
                <router-link to="/dashboard">Dashboard</router-link>
                <router-link to="/attendance">Attendance</router-link>
                <a @click="logout">Logout</a>
            </nav> 
        </header>
        <router-link to="/Login">Login</router-link>
        <router-view></router-view>
        <footer>
            <p>Copyright 2022</p>
        </footer>
    </div>
</template>

<script>
    export default {
        name: 'App',
        data(){
            return{
                isLoggedIn: false,
            }
        },
        methods: {
            logout(){

            }
        }
    }
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
}
body {
    margin: 0;
    background-color: #eee;
}
.container {
    display: flex; 
    flex-direction: column;
    height: 100vh;
    margin: 0;
}
header {
    background-color: #10AE4D;
    min-height: 50px;
    width: 100%;
}
    header nav {
        padding: 10px;
    }
        nav a {
            color: white;
            font-size: 1.25em;
            font-weight: bold;
            padding: 15px 20px;
            text-decoration: none;
        }
        nav a.router-link-exact-active {
            background-color: #eee;
            border-radius: 5px;
            color: #10AE4D;
        }
footer {
    background-color: #10AE4D;
    color: white;
    margin-top: auto; 
    min-height: 50px;
    text-align: center;
}
</style>

