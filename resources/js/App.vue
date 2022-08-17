<template>
    <div class="content">
        <h1>{{ title }}</h1>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: "App",
        data() {
            return {
                title: 'Login',
            }
        },
    }
</script>

<style>
body {
  margin: 0;
  background-color: #eee;
}
</style>

