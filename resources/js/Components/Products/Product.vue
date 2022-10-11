<template>
    <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">
        Products
    </h2>
    <div class="grid grid-cols-4">
        <div v-for="product in products">
            <div class="m-4 bg-white rounded shadow overflow-hidden">
                <div class="p-4">
                    <div class="font-semibold text-sm">{{ product.name }}</div>
                    <div class="text-xs text-gray-500">{{ product.description }}</div>
                </div>
                <div class="border-t px-4 py-2 fonr-bold text-sm">£{{ product.price/100 }}</div>
            </div>
        </div>
    </div>

</template>

<script>
//import BreezeAuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
import { reactive } from 'vue';

export default {
    name: "Todo.vue",
    components: {
        //BreezeAuthenticatedLayout,
        Head
    },
    props: {
        products: Object,
        errors: Object,
        message: Object
    },
    setup() {
    }
}
</script>

<style scoped>

</style>
