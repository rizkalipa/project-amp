<template>
    <div>
        <div class="block bg-white text-black shadow-md mt-5 rounded absolute">
            <router-link to="/login" v-for="(cart, index) in carts.products" :key="index">
                <div class="px-8 py-3 text-sm hover:bg-gray-300 rounded w-full flex items-center">
                    <img :src="cart.image" class="w-1/5">
                    <div class="ml-3">
                        <p class="text-md mb-2">{{ cart.name }}</p>
                        <p class="text-sm text-gray-500">Order qty : {{ cart.pivot.total_count }}</p>
                    </div>
                </div>
            </router-link>
            <div class="px-8 py-3 text-sm rounded w-full flex justify-between items-center">
                <router-link to="checkout">
                    <p class="text-sm">Checkout</p>
                </router-link>
                <router-link to="">
                    <p class="text-sm text-red-500">Delete All <i class="fas fa-trash ml-2"></i></p>
                </router-link>
            </div>
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