<script setup>
import Navbar from "@/Layouts/Navbar.vue";
</script>

<template>
    <!-- Navbar -->
    <Navbar />

    <section class="text-gray-700 body-font overflow-hidden mt-8 mx-3" v-if="product">
        <div class="container mx-auto">
            <div class="flex flex-wrap">
                <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="https://dummyimage.com/640x640">
                <div v-for="products in product" class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="title-font font-medium text-2xl text-gray-900 float-right">{{ products.name }}</div>
                        <!-- ... -->
                        <div class="float-right text-right font-bold">{{ formatCurrency(products.price) }}</div>
                    </div>
                    <p
                        class="mt-4 leading-relaxed"
                        v-text="products.description"
                    ></p>
                    <div class="font-semibold grid grid-cols-1 mt-4 gap-4 border-t-2 text-right">
                        <span
                            :class="checkQty(products.quantity) === 'Out of stock' ? 'text-red-600'
                                    : checkQty(products.quantity) === 'Low in stock' ? 'text-red-400'
                                    : 'text-green-600'"
                            class="mt-4"
                        >{{ checkQty(products.quantity) }}</span>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex border-gray-200 mt-4">
                            <div
                                class="title-font font-medium text-2xl text-gray-900"
                            >Quantity
                            </div>
                        </div>
                        <div class="float-right text-right mt-4">
                                <select v-model="quantity" class="float-right appearance-none w-auto bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                    <option selected="selected">1</option>
                                    <option v-for="quantity in quantities" v-bind:value="quantity">
                                        {{ quantity }}
                                    </option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"></svg>
                                </div>
                        </div>

                    </div>

                    <div class="flex mt-6 pt-4 border-t-2 border-gray-200">
                        <button
                            class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded"
                            @click="addToCard"
                        >Add To Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
//import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
//import { ChevronDownIcon } from '@vue-hero-icons/outline'
import '../helperfunc'

export default {
    name: "Show.vue",
    // components: {
        //Menu, MenuButton, MenuItem, MenuItems
    // },
    data() {
        return {
            quantity: 1,
            quantities: [2,3,4,5,6,7,8,9,10],
            form: this.$inertia.form({
                id: this.product.id,
                name: this.product.name,
                price: this.product.price,
                product_code: this.product.product_code,
                details: this.product.details,
                image: this.product.image,
                slug: this.product.slug,
                quantity: 1,
                totalQty: this.product.quantity
            })
        }
    },
    props: {
        products: Object,
        product: Object,
        errors: Object,
        message: Object
    },
    methods: {
        formatCurrency(price) {
            price = (price /100);
            return price.toLocaleString('en-GB', { style: 'currency', currency: 'GBP'})
        },
        addToCard() {
            this.$inertia.post(this.route('cart.store', {
                id: 2,//this.product.id,
                name: 'sweater',//this.product.name,
                price: 19000,//this.product.price,
                product_code: 123455,//this.product.product_code,
                details: 'more details',//this.product.details,
                image: 'image1.png',//this.product.image,
                slug: 'sweater',//this.product.slug,
                quantity: 1,
                totalQty: 3//this.product.quantity
            }))
        },
        checkQty(qty) {
            if(qty < 10 && qty > 0)
                return 'Low in stock'
            else if(qty === 0)
                return 'Out of stock'
            else
                return 'In stock'
        }
    },
}
</script>

<style scoped>

</style>
