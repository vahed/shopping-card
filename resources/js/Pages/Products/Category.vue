<template>
        <nav role="navigation">
            <div class="text-xl bg-yellow-600 text-white">
                <div class="p-3">
                    Catgegory menu<i class="fa fa-list-alt float-right" aria-hidden="true"></i>
                </div>
            </div>
            <!-- pass item as prop to CatItem -->
            <CatItem :item="item" v-for="item in categoryItems" :key="item.id">
            </CatItem>
        </nav>
</template>

<script>
import {Head} from "@inertiajs/inertia-vue3"
import CatItem from "../../Components/CatItem.vue"

export default {
    name: "Category.vue",
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
</style>
