<template>
<!--    <div v-for="categories in category">-->
<!--        <aside class="w-64" aria-label="Sidebar">-->
<!--            <div class="overflow-y-auto py-4 px-3 bg-gray-50 rounded dark:bg-gray-800">-->
<!--                <ul class="space-y-2">-->
<!--                    <li v-if="categories.children">-->
<!--                        <button @click="displaySubMenu" type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">-->
<!--                            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>-->
<!--                            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item="">{{ categories.name }}</span>-->
<!--                            <span v-if="categories.children">-->
<!--                                <svg sidebar-toggle-item="" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>-->
<!--                            </span>-->
<!--                        </button>-->
<!--                        <div v-for="category in categories.children">-->
<!--                            <ul id="dropdown-example" class="hidden py-2 space-y-2">-->
<!--                                <li>-->
<!--                                    <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">{{ category.name }}</a>-->
<!--                                    <span v-if="category.children">-->
<!--                                        <svg sidebar-toggle-item="" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>-->
<!--                                    </span>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                            <div v-for="cat in category.children">-->
<!--                                <ul id="dropdown-example" class="hidden py-2 space-y-2">-->
<!--                                    <li>-->
<!--                                        <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">{{ cat.name }}</a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </li>-->
<!--                    -->
<!--                </ul>-->
<!--            </div>-->
<!--        </aside>-->
<!--    </div>-->




    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" @click="closeNav()">&times;</a>
        <nav role="navigation" class="p-6">-
            <div v-for="categories in category">
                <ul>
                    <li>
                        <a >{{ categories.name }}</a>
                    </li>

                    <div v-for="category in categories.children">
                        <ul>
                            <a class="ml-5" href="#">{{ category.name }}</a>
                        </ul>
                        <div v-for="cat in category.children">
                            <a class="ml-10" href="#" >{{ cat.name }}</a>
                        </div>
                    </div>

                </ul>
           </div>
        </nav>
    </div>

    <span style="font-size:30px;cursor:pointer" @click="openNav()">&#9776;open</span>

</template>

<script >
import {Head} from "@inertiajs/inertia-vue3";
// import { ref } from 'vue'

// const display = ref('none')

export default {
    name: "Category.vue",
    data() {
        return {
            // display: 'none',
        }
    },
    components: {
        Head
    },
    props: {
        category: Object,
    },
    methods: {
        displaySubMenu()
        {
          this.display == 'block' ? this.display = 'none' : this.display='block'
        },
        openNav()
        {
            document.getElementById("mySidenav").style.width = "350px";
        },
        closeNav()
        {
            document.getElementById("mySidenav").style.width = "0";
        }
    },
    computed: {
        showCategory() {
            this.category = this.$inertia.get(this.route('category.index'))
        },
    }
}
</script>

<style scoped>
/*.hidden {*/
/*    display: v-bind(display);*/
/*    color: white;*/
/*}*/
.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}
</style>
