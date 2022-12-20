<template>
        <!-- <div class="flex min-h-screen">
            <div class="w-64 shrink-0 bg-gray-50 border-r border-gray-200 py-4">
                <div class="px-4">
                    <a class="inline-block" href="#">
                        <Logo class="h-8 w-auto" />
                    </a>
                </div> -->

                <nav role="navigation">
                    <!-- pass item as prop to CatItem -->
                    <CatItem :item="item" v-for="item in categoryItems" :key="item.id">
                    </CatItem>
                </nav>


            <!-- </div>

            <main class="p-4"></main>
        </div> -->

</template>

<script>
import {Head} from "@inertiajs/inertia-vue3"
import { ref } from 'vue'
import CatItem from "../../Components/CatItem.vue"

export default {
    name: "Category.vue",
    computed: {
        categoryItems() {
            return this.$page.props.categoryItems
        }
    },
    components: {
        Head,
        CatItem
    },
    props: {
        category: Object,
        categoryItems: Object
    }
}
</script>

<style scoped>
/*.hidden {*/
/*    display: v-bind(display);*/
/*    color: white;*/
/*}*/
</style>
