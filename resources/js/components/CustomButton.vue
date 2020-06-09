<template>
    <div class="text-center rounded transition duration-150 ease-in-out"
         :class="[ textColor, bgColor, btnSize, hoverClr ]" style="cursor: pointer;">
        <p class="text-sm">
            <slot></slot>
        </p>
    </div>
</template>

<script>
    export default {
        name: "CustomButtom",
        props: [ 'textColor', 'bgColor', 'size', 'hoverColor' ],
        data() {
            return {

            }
        },
        computed: {
            btnSize() {
                if (this.size == 'md') {
                    return 'py-1 px-2'
                } else if (this.size == 'lg') {
                    return 'py-2 px-3'
                } else {
                    return 'py-1 px-1'
                }
            },
            hoverClr() {
                return `hover:${this.hoverColor}`
            },
        }
    }
</script>

<style scoped>

</style>
