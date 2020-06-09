<template>
    <div class="border border-gray-700 rounded p-5">
        <img :src="image" class="mb-5" style="height: 250px;">
        <p class="text-md mb-5">{{ title }}</p>
        <p class="text-sm mb-5 text-gray-800">
            <slot></slot>
        </p>
        <div class="flex justify-between">
            <CartButton :id="id" />
            <div @click="addWishlist">
                <CustomButtom bg-color="bg-red-600 rounded-full" size="lg" text-color="text-white" hover-color="bg-red-500">
                <span class="i fas fa-heart"></span>
            </CustomButtom>
            </div>
        </div>
        <LoadingScreen v-if="loading" />
    </div>
</template>

<script>
    import CustomButtom from "./CustomButton";
    export default {
        name: "CardProduct",
        data() {
            return {
                loading: false
            }
        },
        components: {CustomButtom},
        props: [ 'title', 'image', 'id' ],
        methods: {
            addWishlist() {
                this.loading = true

                setTimeout(() => {
                   this.$store.dispatch('addWishlist', { id: this.id }).then(response => {
                    this.loading = false
                }) 
                }, 1000);
            }
        }
    }
</script>

<style scoped>

</style>
