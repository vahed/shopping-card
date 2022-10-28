<template>
    <!-- Navbar -->
    <Navbar />
    <section class="text-gray-700 body-font overflow-hidden" >
        <div>
            {{cartItems}}
            Cart page
        </div>
    </section>
</template>

<script>
export default {
    name: "Cart.vue",
    props: {
        cartItems: Object,
    },
}
</script>

<style scoped>

</style>
