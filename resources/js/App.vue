<template>
    <AdminTopNavComponent v-if="$store.state.showAdminNav" />
    <div class="flex flex-row">
        <AdminSideNavComponent v-if="$store.state.showAdminNav" />
        <router-view></router-view>
    </div>
</template>

<script>
import DashboardUser from './views/user/Dashboard.vue'
import AdminTopNavComponent from './components/AdminTopNavigationComponent.vue'
import AdminSideNavComponent from './components/AdminSideNavigationComponent.vue'

export default {
    name: 'App',
    data(){
        return {

        }
    },   
    components: { DashboardUser, AdminSideNavComponent, AdminTopNavComponent },
    methods: {
        logout(e){
            e.preventDefault()
            this.isLoggedIn = false
            this.$router.push('/')
        },
        toggleDD(myDropMenu){
            document.getElementById(myDropMenu).classList.toggle("invisible")
        }
    }
}
</script>

<style>
#app {
    font-family: 'Georama', Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    color: #2c3e50;
}
</style>

