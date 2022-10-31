<script setup>
import CatItem from "@/Components/CatItem.vue";

defineProps({
    category: Object
})

</script>
<template>
        <div class="flex min-h-screen">
            <div class="w-64 shrink-0 bg-gray-50 border-r border-gray-200 py-4">
                <div class="px-4">
                    <a class="inline-block" href="#">
                        <Logo class="h-8 w-auto" />
                    </a>
                </div>

                <nav role="navigation">
                    <!-- pass item as prop to CatItem -->
                    <CatItem :item="item" v-for="item in category">
                    </CatItem>
                </nav>
            </div>

            <main class="p-4"></main>
        </div>

</template>

<script>
import {Head} from "@inertiajs/inertia-vue3";
import { ref } from 'vue'

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
}
</script>

<style scoped>
/*.hidden {*/
/*    display: v-bind(display);*/
/*    color: white;*/
/*}*/
</style>
