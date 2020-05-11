<template>
    <div class="w-full pb-8">
        <div class="pb-8 mb-8 bg-blue-200">
            <Navbar />

            <div class="w-4/5 mx-auto">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "TopBanner"
    }
</script>

<style scoped>

</style>
