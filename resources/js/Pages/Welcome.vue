<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Product from './Products/Product.vue';
import Footer from '@/Layouts/Footer.vue';
import Navbar from "@/Layouts/Navbar.vue";
import Category from "./Products/Category.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean
})

</script>

<template>
    <div class="trigger" @click="toggle">Menu</div>
    <Head title="Welcome" />
    <!-- <cart-button></cart-button> -->
    <!-- Navbar -->
    <Navbar />
    
    <div class="menu">
        <Category :categoryItems = "$page.props.categoryItems"/>
    </div>
    
    <!--Head -->
<!--    <div class="py-20" style="background: linear-gradient(90deg, #667eea 0%, #764ba2 100%)">-->
<!--        <div class="container mx-auto px-6">-->

<!--            <h2 class="text-4xl font-bold mb-2 text-white">-->
<!--                Smart Laravel Todo application powered by Inertia!-->
<!--            </h2>-->
<!--            <h3 class="text-2xl mb-8 text-gray-200">-->
<!--                The application displays todo list, update the entries, delete the entire entry and add new entry.-->
<!--            </h3>-->

<!--            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="bg-white font-bold rounded-full ml-1.5 py-4 px-8 shadow-lg uppercase tracking-wider">Dashboard</Link>-->
<!--            <template v-if="!$page.props.auth.user">-->
<!--                <Link :href="route('login')" class="bg-white font-bold rounded-full py-4 px-8 shadow-lg uppercase tracking-wider">-->
<!--                    Login-->
<!--                </Link>-->

<!--                <Link v-if="canRegister" :href="route('register')" class="bg-white font-bold rounded-full ml-1.5 py-4 px-8 shadow-lg uppercase tracking-wider">Register</Link>-->
<!--            </template>-->
<!--        </div>-->
<!--    </div>-->

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
import Cat from './Products/Category.vue'

export default {
    components : {
        Carousel,
        Cat
    },
    props: {
        category: Object
    },
    methods: {
        toggle() {
            const menu = document.querySelector('.menu');
            const trigger = document.querySelector('.trigger');
            menu.classList.toggle('menu--open');

            trigger.addEventListener('click', toggle);
        }
    }
}
</script>
<style scoped>
body {
  margin: 0;
}

.menu {
  top: 0;
  height: 100vh;
  box-sizing: border-box;
  margin-left: -320px;
  width: 320px;
  background-color:#FFF;
  /* transition: all .3s; */
  transition: 0.2s ease-in-out;
  padding: 1rem;
  z-index: 2 !important;
  position:absolute;
  border-color: black;
}

.menu--open {
  margin-left: 0;
}

a {
  color: #FFF;
  display: block;
}
</style>
