<template>
    <div>
        <TopBanner>
            <h1 class="text-5xl font-bold">Our stunning <br> product</h1><br>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, asperiores aut eaque ipsam maiores numquam officia praesentium qui quibusdam quo.
            </p>
        </TopBanner>

        <div class="w-4/5 mx-auto">
            <FeaturedProduct class="mb-8 pb-8" />

            <div class="flex items-center mb-8">
                <h1 class="text-1xl">List Product</h1>
                <select name="" id="" class="py-1 mx-5 pl-2 pr-24 rounded outline-none border focus:border focus:border-gray-500">
                    <option value="">Filter</option>
                </select>
            </div>

            <div class="grid md:grid-cols-3 grid-cols-1 gap-5">
                <CardProduct v-for="data in products" :title="data.name" :key="data.id" :id="data.id" :image="data.image">
                    {{  data.id + ' ' + data.description }}
                </CardProduct>
            </div>
        </div>
        <LoadingScreen v-if="loading" />
    </div>
</template>

<script>
import FeaturedProduct from "../components/FeaturedProduct";
import CardProduct from "../components/CardProduct";
import TopBanner from "../components/TopBanner";
export default {
    components: {TopBanner, CardProduct, FeaturedProduct},
    data() {
        return {
            result: '',
            loading: false,
        }
    },
    computed: {
        products() {
            return this.$store.getters.products
        }
    },
    beforeMount() {
        this.loading = true
        this.$store.dispatch('getUser')
            .then(response => {
                this.$store.dispatch('getProducts')
                this.loading = false
            })
            .catch(error => {
                this.$store.dispatch('getProducts')
                this.loading = false
            })
    }
};
</script>

<style>
</style>
