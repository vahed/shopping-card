<template>
    <Navbar />
    <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">
        Products
    </h2>
    <div class="grid grid-cols-4">
        <div v-for="product in productsByCategory" :key="product.id">
            <div class="m-4 bg-white rounded shadow overflow-hidden" @click="showProduct(product)">
                <div class="p-4">
                    <img class="mb-4" src="https://via.placeholder.com/180x140">
                    <div class="font-semibold text-sm font-mont">{{ product.name }}</div>
                    <div class="mt-3 text-xs text-gray-500 font-mont">{{ product.description }}</div>
                </div>
                <div class="border-t px-4 py-2 fonr-bold text-sm font-mont">{{ formatCurrency(product.price) }}</div>
            </div>
        </div>
    </div>

</template>

<script>
import { Head } from '@inertiajs/inertia-vue3';
import Navbar from "@/Layouts/Navbar.vue";

export default {
    name: "ProductByCategory.vue",
    components: {
        Navbar,
        Head
    },
    props: {
        productsByCategory: Object,
        errors: Object,
        message: Object
    },
    methods: {
        formatCurrency(price) {
            price = (price /100);
            return price.toLocaleString('en-GB', { style: 'currency', currency: 'GBP'})
        },
        showProduct(product) {
            // this.$inertia.post(this.route('cart.store'), {
            //     id: product.id,
            //     name: product.name
            // })
            this.$inertia.get(this.route('products.show',product.id))
        }
    }
}
</script>

<style scoped>

</style>
