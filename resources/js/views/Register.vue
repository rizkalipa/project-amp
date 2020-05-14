<template>
    <div>
        <TopBanner>
            <h1 class="text-3xl font-bold">
                Register your account
            </h1>
        </TopBanner>
        <div class="w-2/5 mx-auto bg-gray-200 rounded p-5">
            <form method="POST"  @submit.prevent="registerUser">
                <LoadingScreen v-if="loading" />
                <h1 class="mb-8">Fill your credentials below</h1>

                <div class="flex flex-col">
                    <input type="text" class="my-2 py-2 text-black bg-white focus:bg-transparent border-l-2 pl-3 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out"
                           placeholder="Your name ..." name="name" autocomplete="off" v-model="name">
                    <input type="text" class="my-2 py-2 text-black bg-white focus:bg-transparent border-l-2 pl-3 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out"
                           placeholder="Email ..." name="email" autocomplete="off" v-model="email">
                    <input type="password" class="my-2 py-2 text-black bg-white focus:bg-transparent border-l-2 pl-3 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out"
                           placeholder="Password ..." name="password" v-model="password">
                </div>
                <div class="mt-8 flex items-center">
                    <button type="submit"
                        class="text-white bg-green-500 rounded-full py-2 px-6 hover:bg-green-600 focus:outline-none transition duration-300 ease-in-out">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Register',
    data() {
        return {
            name: '',
            email: '',
            password: '',
            loading: false,
        }
    },
    methods: {
        registerUser() {
            this.loading = true;

            this.$store.dispatch('registerUser', {
                name: this.name,
                email: this.email,
                password: this.password,
            }).then(response => { 
                this.loading = false
                this.$router.push('/login')    
            }).catch(error => {
                this.loading = false
            })
        }
    }
}
</script>

<style>

</style>