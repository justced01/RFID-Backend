<template>
    <transition name="fade">
        <div v-if="show" class="loader flex flex-col justify-between items-center absolute h-full w-full p-10 bg-green-500 z-30">
            <div>
                <img :src="'images/usc-logo-with-logo.png'" class="mx-auto">
            </div>
            <div>
                <p class="text-white">Click to continue</p>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    name: 'Preloader',
    data(){
        return {
            show: true
        }
    },
    mounted(){
		if(this.show) this.showToggle()
	},
	methods: {
		showToggle(){
			setTimeout(() => {
				this.show = false
			}, 1500)
		}
	}
}
</script>

<style>
.fade-enter-active, .fade-leave-active {
    transition: opacity 1s;
}
.fade-enter, .fade-leave-to {
    opacity: 0;
}


</style>