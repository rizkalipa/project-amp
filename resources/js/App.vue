<template>
  <div class="">

      <FloatNavbar />

      <transition name="fade">
          <router-view></router-view>
      </transition>

      <div class="w-full bg-gray-900 mt-8">
          <div class="w-4/5 mx-auto py-4 text-center">
              <p class="text-gray-500 text-sm">2020 &copy; AMP
              </p>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    name: 'App',
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
}
</script>

<style scoped>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .2s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>
