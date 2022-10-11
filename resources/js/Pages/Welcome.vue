<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Product from '../Components/Products/Product.vue';
import Footer from '@/Layouts/Footer.vue';
import Navbar from "@/Layouts/Navbar.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    products: Object,
})

</script>

<template>
    <Head title="Welcome" />

    <!-- Navbar -->
    <Navbar />

    <!--Head -->
    <div class="py-20" style="background: linear-gradient(90deg, #667eea 0%, #764ba2 100%)">
        <div class="container mx-auto px-6">

            <h2 class="text-4xl font-bold mb-2 text-white">
                Smart Laravel Todo application powered by Inertia!
            </h2>
            <h3 class="text-2xl mb-8 text-gray-200">
                The application displays todo list, update the entries, delete the entire entry and add new entry.
            </h3>

            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="bg-white font-bold rounded-full ml-1.5 py-4 px-8 shadow-lg uppercase tracking-wider">Dashboard</Link>
            <template v-if="!$page.props.auth.user">
                <Link :href="route('login')" class="bg-white font-bold rounded-full py-4 px-8 shadow-lg uppercase tracking-wider">
                    Login
                </Link>

                <Link v-if="canRegister" :href="route('register')" class="bg-white font-bold rounded-full ml-1.5 py-4 px-8 shadow-lg uppercase tracking-wider">Register</Link>
            </template>
        </div>
    </div>

    <!-- main -->
    <section class="container mx-auto px-6 p-10">
        <Product :products="products" />
    </section>

    <!-- footer -->
    <footer class="bg-gray-100">
        <Footer />
    </footer>
</template>
