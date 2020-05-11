<template>
  <div :class="[ classNav ]">
    <div class="py-5 flex justify-between items-center">
        <div class="">
            <h1 class="font-bold pr-10 text-2xl"><router-link :to="{ name: 'Home' }">AMP</router-link></h1>
        </div>
        <div class="flex items-center relative">
            <p class="px-5" @mouseover="listMenu = true" @mouseleave="listMenu = false" style="cursor: pointer">
                <span><i class="fas fa-user"></i></span>
                <span v-if="username" class="ml-2 text-sm">Hello, {{ username }}</span>

                <transition name="fade">
                    <FloatListMenu v-show="listMenu" />
                </transition>
            </p>
            <p class="px-5" @mouseover="cartList = true" @mouseleave="cartList = false" :class="{ 'mx-8 py-1 rounded-full text-white bg-blue-600': cartFillStyle }">
                <span><i class="fas fa-shopping-cart"></i></span>
                <span v-if="carts != null" class="ml-2 text-sm">{{ carts.length }}</span>

                <transition name="fade">
                    <FloatCartList v-show="cartList" />
                </transition>
            </p>
            <p class="px-5">
                <span><i class="fas fa-heart" :class="{ 'text-red-600': wishFillStyle }"></i></span>
                <span v-if="wishCount > 0" class="ml-2 text-sm">{{ wishCount }}</span>
            </p>
        </div>
    </div>
  </div>
</template>

<script>
import FloatListMenu from "./FloatListMenu";
export default {
    components: {FloatListMenu},
    data() {
        return {
            cartCount: 2,
            wishCount: 3,
            listMenu: false,
            cartList: false,
        }
    },
    props: {
      classNav: {
          default: 'w-4/5 mx-auto mb-12',
      }
    },
    computed : {
        cartFillStyle() {
            return this.carts != null ? true : false;
        },
        wishFillStyle() {
            return this.wishCount > 0 ? true : false;
        },
        username() {
            return this.$store.getters.username
        },
        carts() {
            return this.$store.getters.carts
        }
    },
    mounted() {
        console.log(this.carts)
    }
};
</script>

<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .2s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>
