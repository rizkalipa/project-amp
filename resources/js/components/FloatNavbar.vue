<template>
    <transition name="fade">
        <div v-show="floatNavbar" class="fixed w-full p-8">
            <Navbar class="w-full px-3 bg-white rounded shadow-md" />
        </div>
    </transition>
</template>

<script>
    export default {
        name: "FloatNavbar",
        data() {
            return {
                floatNavbar: false,
            }
        },
        methods: {
            scrollWindow() {
                if (window.pageYOffset > 100) {
                    this.floatNavbar = true
                } else if (window.pageYOffset < 100) {
                    this.floatNavbar = false
                }
            }
        },
        created() {
            window.addEventListener('scroll', this.scrollWindow)
        },
        destroyed() {
            window.removeEventListener('scroll', this.scrollWindow)
        }
    };
</script>

<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .2s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>
