<script setup>
defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    cartItems: Object
})
</script>

<template>
    <!-- Navbar -->
    <Navbar />
<!--    class="grid xl:grid-cols-4 lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1"-->
<!--    <h2 class="text-4xl font-bold text-center text-gray-800 mb-8 mt-8">-->
<!--        Cart Items-->
<!--    </h2>-->

<!--    <div class="grid grid-cols-3 gap-4">-->

<!--        <div class="col-span-2">-->
<!--            <div v-for="cartItem in cartItems" :key="cartItems.id">-->
<!--                <div class="m-4 bg-white rounded shadow overflow-hidden" @click="showProduct(cartItem.id)">-->
<!--                    <div class="p-4">-->
<!--                        <img class="mb-4" src="https://via.placeholder.com/440x200">-->
<!--                        <div class="font-semibold text-sm font-mont">{{ cartItem.name }}</div>-->
<!--                        <div class="mt-3 text-xs text-gray-500 font-mont">{{ cartItem.details }}</div>-->
<!--                    </div>-->
<!--                    <div class="border-t px-4 py-2 fonr-bold text-sm font-mont">{{ formatCurrency(cartItem.price) }}</div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div>-->
<!--            <h1>This is 2/5 </h1>-->
<!--        </div>-->
<!--    </div>-->

    <div class="grid grid-cols-12 mx-2 gap-2">
        <div class="xl:col-span-8 lg:col-span-8 md:col-span-8 col-span-12 bg-green-400">
            <div v-for="cartItem in cartItems" :key="cartItems.id">
                
                <a href="#" class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <img class="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="https://via.placeholder.com/440x200" alt="">
                    <div class="flex flex-col justify-between p-4 leading-normal">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ cartItem.name }}</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ cartItem.details}}</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="xl:col-span-4 lg:col-span-4 md:col-span-4 col-span-12 bg-green-400">
            <h1>This is basket summary</h1>
            <Summary :cartItems="cartItems"  />
        </div>
    </div>
</template>

<script>
import Navbar from "@/Layouts/Navbar.vue";
import Summary from "@/Pages/Cart/Summary.vue"

export default {
    name: "Cart.vue",
    // props: {
    //     cartItems: Object,
    //     cartItem: Object
    // },
    components: {
        Navbar,
        Summary
    },
    methods: {
        formatCurrency(price) {
            price = (price /100);
            return price.toLocaleString('en-GB', { style: 'currency', currency: 'GBP'})
        }
    }
}
</script>

<style scoped>

</style>
