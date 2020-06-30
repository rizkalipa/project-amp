<template>
    <div>
        <TopBanner>
            <h1 class="text-3xl font-bold">Checkout your order</h1>
        </TopBanner>
        <div class="w-4/5 mx-auto">
            <div v-for="(cart,index) of carts.products" class="border-b border-gray-200 flex my-5" :key="index"> 
                <div class="w-2/5 my-3">
                    <img :src="cart.image" class="w-1/4">
                </div>
                <div class="3/5 align-left">
                    <h1 class="text-1xl mb-3 font-bold">{{ cart.name }}</h1>
                    <h2 class="text-sm mb-5">{{ cart.description }}</h2>
                    <p class="text-sm">Price : IDR {{ Intl.NumberFormat('id-ID').format(cart.price) }}</p>
                </div>
            </div>

            <div>
                <h1 class="text-2xl font-bold mb-5">
                    Total orders : IDR {{ Intl.NumberFormat('id-ID').format(total) }}
                </h1>

                <button @click="finishOrder()" class="py-2 px-3 text-center text-white rounded bg-blue-600 hover:bg-blue-400 transition duration-150 ease-in-out" style="cursor: pointer;">
                    Finish Order
                </button>
            </div>
            <LoadingScreen v-if="loading" />
        </div>
    </div>
</template>

<script>
    import TopBanner from "../components/TopBanner";
    export default {
        name: "Checkout",
        components: { TopBanner },
        data() {
            return {
                loading: false
            }
        },
        computed: {
            carts() {
                return this.$store.getters.carts
            },
            total() {
                let total = this.carts.products.reduce((before, next) => before.price + next.price)
                return total
            }
        },
        methods: {
            finishOrder() {
                this.loading = true
                this.$store.dispatch('finishOrder', {
                    'user_id': this.carts.user_id,
                    'cart_id': this.carts.id,
                    'total_price': this.total,
                }).then(resp => {
                    this.loading = false
                    this.$router.push('/')
                })
            }
        }
    }
</script>

<style scoped>

</style>
