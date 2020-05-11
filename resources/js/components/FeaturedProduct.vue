<template>
    <div>
        <h1 class="text-1xl mb-8">Featured Product <span class="text-sm ml-3 bg-red-600 py-1 px-3 text-white rounded-full">Best Selling</span></h1>

        <div class="grid md:grid-cols-5 grid-cols-1 gap-5">

            <div class="md:col-span-2 bg-gray-200 p-5 flex flex-col justify-center rounded">
                <h1 class="text-2xl font-bold mb-5">Masker Sensi</h1>
                <p class="text-gray-700 mb-8">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed, vitae.</p>

                <CartButton />
            </div>

            <div class="md:col-span-3 border border-gray-700 rounded">
                <img src="/img/produk-2.png" class="mx-auto w-2/3">
            </div>

            <div class="md:col-span-3 border border-gray-700 rounded">
                <img src="/img/produk-1.png" class="mx-auto w-2/3">
            </div>

            <div class="md:col-span-2 bg-gray-200 p-5 flex flex-col justify-center rounded">
                <h1 class="text-2xl font-bold mb-5">Lakban Super Encep</h1>
                <p class="text-gray-700 mb-8">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed, vitae.</p>

                <CartButton />
            </div>

        </div>
    </div>
</template>

<script>
    import CustomButtom from "./CartButton";
    import CardProduct from "./CardProduct";
    export default {
        name: "FeaturedProduct",
        components: {CardProduct, CustomButtom}
    }
</script>

<style scoped>

</style>
