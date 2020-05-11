<script>
export default {
    name: 'Logout',
    loading: true,
    created() {
        this.$store.dispatch('logout')
        .then(response => {
            this.$router.push('/')
        })
    }
}
</script>

<style>

</style>