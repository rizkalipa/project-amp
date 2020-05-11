<template>
    <div>
        <div class="block bg-white text-black shadow-md mt-5 rounded absolute">
            <router-link to="/login" v-for="cart in carts" :key="cart.id">
                <div class="px-8 py-3 text-sm hover:bg-gray-300 rounded w-full flex items-center" href="">
                    <img :src="cart.product.image" class="w-1/5">
                    <div class="ml-3">
                        <p class="text-md mb-2">{{ cart.product.name }}</p>
                        <p class="text-sm text-gray-500">Order qty : {{ cart.total_count }}</p>
                    </div>
                </div>
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    computed: {
        carts() {
            return this.$store.getters.carts
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