<template>
        <nav role="navigation">
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
