<script setup>
import { Disclosure, DisclosureButton, DisclosurePanel} from '@headlessui/vue'
import { ChevronDownIcon } from "@heroicons/vue/20/solid"
import { computed, ref } from "vue"

const props =defineProps({
    item: Object,
})

const hasActiveChild = computed(() => {
    function hasActiveItewm(items) {
        return items.some(item => item.active || hasActiveItewm(item.children))
    }

    return hasActiveItewm(props.item.children)
})

</script>

<template>
    <disclosure v-slot="{ open }">
        <!-- display top category items -->
        <DisclosureButton
            :class="['text-left flex w-full items-center py-2 px-3 text-sm font-medium text-gray-600',
            'hover:bg-gray-100',
            open ? 'font-semibold text-gray-800' : 'font-medium text-gray-600']"
        >
<!--            <component :class="['w-6 h-6 shrink-0 mr-2 group-hover:text-gray-600',-->
<!--                open ? 'text-gray-600' : 'text-gray-400']"-->
<!--                :is="item.icon"-->
<!--                v-if="item.icon"-->
<!--            >-->
<!--            </component>-->

            <span class="flex-1" v-if="item.children.length === 0" @click="productByCategory(item.id)">{{ item.name }}</span>
            <span class="flex-1 font-black" v-if="item.children.length !== 0" >{{ item.name }}</span>

                <ChevronDownIcon
                v-if="item.children.length !== 0"
                :class="['h-6 w-6 shrink-0',
                open ? '-rotate-180 text-gray-600' : 'text-gray-400']"
            />
        </DisclosureButton>
        <DisclosurePanel class="ml-4">
            <!-- pass item recursively to display subcategory-->
            <CatItem
                v-for="child in item.children"
                :item="child"
            />
        </DisclosurePanel>
    </disclosure>

</template>

<script>
export default {
    data: () => ({
        item:{children: Object}
    }),
    methods: {
        productByCategory(category_id) {
            console.log('This is a test');
            this.$inertia.get(this.route('category.productByCategory', category_id));
        }
    }
}
</script>
<style scoped>

</style>
