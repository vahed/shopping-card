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
                        <div>Selected: {{ selected }}</div>

                        <select v-model="selected">
<!--                            <option disabled value="">Please select one</option>-->
<!--                            <option>A</option>                            <option>B</option>-->
<!--                            <option>C</option>-->


                        </select>

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

export default {
    name: "Show.vue",
    data() {
        return {
            selected: '',
            quantity: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],
            //quantity: 1,
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
