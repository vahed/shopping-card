<template>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <title>Navigation</title>
        </head>
        <body>
            <!-- Navbar goes here -->
            <nav class="bg-white shadow-lg">
                <div class="max-w-6xl mx-auto px-4">
                    <div class="flex justify-between">
                        <div class="flex space-x-7">
                            <div>
                                <!-- Website Logo -->
                                <a href="#" class="flex items-center py-4 px-2">
                                    <!-- logo image could go here-->
                                    <span class="font-semibold text-gray-500 text-lg trigger" @click="toggle">{{ categoryText }}</span>
                                    <div class="menu">
                                        <Category :categoryItems = "$page.props.categoryItems"/>
                                    </div>
                                </a>
                            </div>
                            <!-- Primary Navbar items -->
                            <div class="hidden md:flex items-center space-x-1">
                                <Link :href="route('home.index')" :class=" $page.url === '/home' ? 'text-yellow-500 border-b-4 border-yellow-500' : 'text-gray-500 font-semibold hover:text-yellow-500'" class="py-4 px-2  font-semibold ">Home</Link>
                                <Link :href="route('products.index')" :class="$page.url === '/products' ? 'text-yellow-500 border-b-4 border-yellow-500' : 'text-gray-500 font-semibold hover:text-yellow-500'"  class="py-4 px-2 transition duration-300">Products</Link>
                                <Link href="" class="py-4 px-2 text-gray-500 font-semibold hover:text-yellow-500 transition duration-300">About</Link>
                                <Link href="" class="py-4 px-2 text-gray-500 font-semibold hover:text-yellow-500 transition duration-300">Contact Us</Link>
                                <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-600 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-gray-400 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
                                    <div class="relative">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                        </svg>
                                        <span v-if="($page.props.cartCount > 0)">
                                            <Link :href="route('cart.index')" class="absolute bottom-3 left-4 bg-amber-400 rounded-full w-5 h-5">
                                                {{ $page.props.cartCount }}
                                            </Link>
                                        </span>
                                    </div>
                                    
                                </a>
                            </div>
                        </div>
                        <!-- Secondary Navbar items -->
                        <div class="hidden md:flex items-center space-x-3 ">
                            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="py-2 px-2 font-medium text-gray-500 rounded hover:bg-yellow-500 hover:text-white transition duration-300">Dashboard</Link>
                            <template v-if="!$page.props.auth.user">
                                <Link :href="route('login')" class="py-2 px-2 font-medium text-gray-500 rounded hover:bg-yellow-500 hover:text-white transition duration-300">Log In</Link>
                            
                                <Link :href="route('register')" class="py-2 px-2 font-medium text-white bg-yellow-500 rounded hover:bg-yellow-400 transition duration-300">Sign Up</Link>
                            </template>
                        </div>
                        <!-- Mobile menu button -->
                        <div class="md:hidden flex items-center">
                            <Link href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-gray-600 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-gray-400 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
                                <div class="relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                                    <span v-if="($page.props.cartCount > 0)">
                                        <Link :href="route('cart.index')" class="absolute bottom-3 left-4 bg-amber-400 rounded-full w-5 h-5">
                                            {{ $page.props.cartCount }}
                                        </Link>
                                    </span>
                                </div>
                            </Link>
                            <button class="outline-none mobile-menu-button" @click="toggleMenu">
                            <svg class=" w-6 h-6 text-gray-500 hover:text-yellow-500 "
                                x-show="!showMenu"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        </div>
                    </div>
                </div>
                <!-- mobile menu -->
                <div class="hidden mobile-menu">
                    <ul class="">
                        <li class="active"><Link :href="route('home.index')" class="block text-sm px-2 py-4 text-white bg-yellow-500 font-semibold">Home</Link></li>
                        <li><Link :href="route('products.index')" class="block text-sm px-2 py-4 hover:bg-yellow-500 transition duration-300">Products</Link></li>
                        <li><Link href="#about" class="block text-sm px-2 py-4 hover:bg-yellow-500 transition duration-300">About</Link></li>
                        <li><Link href="#contact" class="block text-sm px-2 py-4 hover:bg-yellow-500 transition duration-300">Contact Us</Link></li>
                    </ul>
                </div>
                
            </nav>
        </body>
    </html>
</template>

<script>
import {Head, Link } from "@inertiajs/inertia-vue3"
import Category from "@/Pages/Products/Category.vue"

export default {
    name: "Navbar.vue",
    data() {
        return {
            expanded: false,
            categoryText: "Show all",
            isActive: true
        }
    },
    components: {
        //BreezeAuthenticatedLayout,
        Head,
        Link,
        Category
    },
    props: {
        category: Object
    },
    methods: {
        
        toggleMenu() {
            const menu = document.querySelector(".mobile-menu")
            menu.classList.toggle("hidden")
        },
        toggle() {
            this.expanded = !this.expanded;

            if (this.expanded) {
                this.categoryText = "Hide all";
            } else {
                this.categoryText = "Show all";
            }

            const menu = document.querySelector('.menu');
            const trigger = document.querySelector('.trigger');
            menu.classList.toggle('menu--open');

            //trigger.addEventListener('text-yellow-500 border-b-4 border-yellow-500', toggle);
        },
        makeLinkActive() {

        }
    }
}
</script>

<style scoped>
</style>
