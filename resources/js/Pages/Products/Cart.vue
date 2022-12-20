<script setup>
defineProps({
    cartItems: Object,
    errors: 'This is error'
})
</script>
<!-- class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700" -->
<!-- class="flex flex-col justify-between p-4 leading-normal" -->
<!-- class="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" -->
<template>
    <!-- Navbar -->
    <Navbar />
    <div class="grid grid-cols-12 mx-2 gap-2">
        <div class="divide-y divide-solid xl:col-span-8 lg:col-span-8 md:col-span-8 col-span-12">
            <p class="text-2xl ml-5 font-semibold">Shopping Basket</p>
            <div v-for="(cartItem, key) in cartItems" :key="key">
                <a href="#" class="flex m-5">
                    <img  class="w-1/3" src="https://via.placeholder.com/440x200" alt="">
                    <div class="w-2/3 ml-3">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ cartItem.name }}</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ cartItem.details}}</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="xl:col-span-4 lg:col-span-4 md:col-span-4 col-span-12 bg-green-400">
            <h1>This is basket summary</h1><p>{{$page.props.errors}}</p>
            <Summary 
                @increment-by-one="incrementCount($event)" 
                @decrement-by-one="decrementCount($event)"
                @delete-item="deleteSingleItem($event)"
                :cartItems="cartItems"
            >
            </Summary>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
import Navbar from "@/Layouts/Navbar.vue"
import Summary from "@/Pages/Cart/Summary.vue"

export default {
    name: "Cart.vue",
    components: {
        Navbar,
        Summary,
        Inertia,
        Link
    },
    methods: {
        formatCurrency(price) {
            price = (price /100);
            return price.toLocaleString('en-GB', { style: 'currency', currency: 'GBP'})
        },
        incrementCount(item) {
            this.$inertia.put(this.route('cart.incrementItem', item.rowId), item, {
                preserveScroll: true,
                preserveState: true,
                resetOnSuccess: false
            })
        },
        decrementCount(item) {
            this.$inertia.put(this.route('cart.decrementItem', item.rowId), item, {
                preserveScroll: true,
                preserveState: true,
                resetOnSuccess: false
            })
        },
        deleteSingleItem(item) {

            this.$inertia.delete(this.route('cart.delete', item.rowId), item, {
                preserveScroll: true,
                preserveState: true,
                resetOnSuccess: false
            })
        },

    }
}
</script>

<style scoped>

</style>
