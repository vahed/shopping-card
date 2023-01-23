<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Footer from '@/Layouts/Footer.vue';
import Navbar from "@/Shared/Navbar.vue";
import Search from "@/Layouts/Search.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean
})

</script>

<template>

    <Head title="Welcome" />

    <div class="grid grid-cols-1 divide-y">
        <Navbar />
        <Search />
    </div>

    <Carousel />

    <!-- main -->
<!--    <section class="container mx-auto px-6 p-10">-->
<!--        <Product :products="products" />-->
<!--    </section>-->
<!--    <section class="container mx-auto px-6 p-10">-->
<!--        <Category :category="category"/>-->
<!--    </section>-->

    <!-- footer -->
    <footer class="bg-gray-100">
        <Footer />
    </footer>
</template>

<script>
import Carousel from '../Components/Carousel.vue'

export default {
    components : {
        Carousel
    },
}
</script>
<style scoped>
body {
  margin: 0;
}

a {
  color: #FFF;
  display: block;
}
</style>
