<script setup>
import Navbar from "@/Layouts/Navbar.vue";
</script>

<template>
    <!-- Navbar -->
    <Navbar />

    <section class="text-gray-700 body-font overflow-hidden" v-if="product">
        <div class="container px-12 py-24 mx-auto">
            <div class="lg:w-3/5 mx-auto flex flex-wrap">
                <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="https://dummyimage.com/640x640">
                <div v-for="products in product" class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                    <h2
                        class="text-sm title-font text-gray-500 tracking-widest uppercase inline-block mr-2"
                    ></h2>
                    <h1
                        class="text-gray-900 text-3xl title-font font-medium mb-2"
                        v-text="products.name"
                    ></h1>
                    <p
                        class="leading-relaxed"
                        v-text="products.description"
                    ></p>
                    <div class="flex mt-6 pt-4 border-t-2 border-gray-200">
                        <span
                            class="title-font font-medium text-2xl text-gray-900"
                            v-text="formatCurrency(products.price)"
                        ></span>

                        <!-- Dropdown menu -->
                        <div class="inline-block relative w-64 ml-5">
                            <select v-model="quantity" class="block appearance-none w-auto bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
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

export default {
    name: "Show.vue",
    // components: {
    //     Menu, MenuButton, MenuItem, MenuItems
    // },
    data() {
        return {
            quantity: 1,
            quantities: [2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],
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
        addToCard(){
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
        }
    },
}
</script>

<style scoped>

</style>
