<template>
    <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">
        Products
    </h2>
    <div class="grid grid-cols-4">
        <div v-for="product in products" :key="product.id">
            <div class="m-4 bg-white rounded shadow overflow-hidden" @click="showProduct(product)">
                <div class="p-4">
                    <div class="font-semibold text-sm">{{ product.name }}</div>
                    <div class="text-xs text-gray-500">{{ product.description }}</div>
                </div>
                <div class="border-t px-4 py-2 fonr-bold text-sm">{{ formatCurrency(product.price) }}</div>
            </div>
        </div>
    </div>

</template>

<script>
import { Head } from '@inertiajs/inertia-vue3';

export default {
    name: "Todo.vue",
    components: {
        Head
    },
    props: {
        products: Object,
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
