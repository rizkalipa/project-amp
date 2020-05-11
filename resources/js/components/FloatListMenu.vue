<template>
    <div class="block bg-white shadow-md mt-5 rounded absolute">
        <router-link to="/login" v-if="!isLoggedIn">
            <p class="px-8 py-3 text-sm hover:bg-gray-300 rounded w-full" href="">Login</p>
        </router-link>
        <router-link to="/register" v-if="!isLoggedIn">
            <p class="px-8 py-3 text-sm hover:bg-gray-300 rounded w-full" href="">Register</p>
        </router-link>
        <router-link to="/logout" v-if="isLoggedIn">
            <p class="px-8 py-3 text-sm hover:bg-gray-300 rounded w-full" href="">Logout</p>
        </router-link>
    </div>
</template>

<script>
    export default {
        name: "FloatListMenu",
        computed: {
            isLoggedIn() {
                return this.$store.getters.isLoggedIn
            }
        }
    }
</script>

<style scoped>
    .block {
        left: 30px;
        right: 30px;
    }
</style>
