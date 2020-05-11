<template>
    <div class="min-h-screen">
        <TopBanner>
            <h1 class="text-3xl font-bold">Welcome to our site!</h1>
        </TopBanner>

        <div class="w-2/5 mx-auto bg-gray-200 rounded p-5">
            <LoadingScreen v-if="loading" />
            <form method="POST" @submit.prevent="login">
                <h1 class="mb-8">Fill your credentials below</h1>

                <div class="flex flex-col">
                    <input type="text" class="my-2 py-2 text-black bg-white focus:bg-transparent border-l-2 pl-3 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out"
                           placeholder="Email ..." name="email" autocomplete="off" v-model="username">
                    <input type="password" class="my-2 py-2 text-black bg-white focus:bg-transparent border-l-2 pl-3 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out"
                           placeholder="Password ..." name="password" v-model="password">
                </div>
                <div class="mt-8 flex items-center">
                    <button type="submit" class="text-white bg-green-500 rounded-full py-2 px-6 hover:bg-green-600 focus:outline-none transition duration-300 ease-in-out">
                        Login
                    </button>
                    <p class="ml-5">Register</p>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import TopBanner from "../components/TopBanner";
    export default {
        name: "Login",
        components: {TopBanner},
        data() {
            return {
                username: '',
                password: '',
                loading: false,
            }
        },
        methods: {
            login() {
                this.loading = true
                this.$store.dispatch('login', { username: this.username, password: this.password })
                    .then(response => {
                        this.$store.dispatch('getUser')
                        this.$router.push('/')
                        this.loading = false
                    })
                    .catch(error => {
                        this.loading = false
                    })
            }
        }
    }
</script>

<style scoped>

</style>
