<template>
    <div class="fixed bg-gray-900 bg-opacity-75 top-0 left-0 bg-white w-full h-full">
        <div class="bg-white w-3/4 mx-auto my-10 p-10 rounded relative">
            <div @click="$emit('closePopUp', false)" style="cursor: pointer" class="absolute top-0 right-0 px-5 py-2">
                <span><i class="fas fa-times text-sm text-gray-400"></i></span>
            </div>
            <div class="flex items-center">
                <img :src="image" class="w-1/2">
                <div class="px-3"></div>
                <div>
                    <h1 class="text-2xl font-bold mb-5">{{ payload[0].name }}</h1>
                    <p class="text-sm text-gray-800 mb-5">
                        {{ payload[0].description }}
                    </p>
                    <div class="w-3/4 mb-5">
                        <input type="number" min=0 v-model="countProduct" class="w-full border border-gray-800 py-1 pl-3 rounded focus:outline-none">
                    </div>

                    <div class="w-2/4" @click="saveToCart">
                        <CustomButtom bg-color="bg-blue-600" size="lg" text-color="text-white" hover-color="bg-red-500">
                            Save to Cart
                        </CustomButtom>
                    </div>
                </div>
            </div>
        </div>
        <LoadingScreen v-if="loading" />
    </div>
</template>

<script>
import CustomButtom from '../components/CustomButton'
import LoadingScreen from '../components/LoadingScreen'

export default {
    components: {
        CustomButtom,
        LoadingScreen
    },
    props: [ 'payload' ],
    data() {
        return {
            image: this.payload[0].image,
            countProduct: 1,
            productPrice: 100,
            promoCode: 'Test',
            loading: false
        }
    },
    methods: {
        saveToCart() {
            this.loading = true

            this.$store.dispatch('saveToCart', { 
                product_id: this.payload[0].id,
                total_count: this.countProduct,
                total_price: this.productPrice,
                promo_code: this.promoCode,
            })
            .then(response => {
                this.loading = false
                this.$emit('closePopUp', false)
            })
            .catch(error => {
                this.loading = false
            })
        }
    }
}
</script>

<style>

</style>