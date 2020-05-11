<template>
    <div>
        <div @click="isOpen = ! isOpen" class="py-2 px-3 text-center text-white rounded bg-blue-600 hover:bg-blue-400 transition duration-150 ease-in-out" style="cursor: pointer;">
            <p class="text-sm">
                Add to Cart
                <span><i class="fas fa-cart-plus ml-5"></i></span>
            </p>
        </div>
        <CartPopUp v-if="isOpen" @closePopUp="isOpen = false" :payload="productDetail" />
    </div>
</template>

<script>
    export default {
        name: "CartButton",
        props: [ 'id' ],
        data() {
            return {
                isOpen: false
            }
        },
        computed: {
            productDetail() {
                return this.$store.getters.products.filter(product => product.id == this.id)
            }
        }
    }
</script>

<style scoped>

</style>
