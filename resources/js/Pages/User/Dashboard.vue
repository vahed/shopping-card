<script setup>
import { ref } from 'vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

const showingNavigationDropdown = ref(false);

defineProps({
    urlBeforeLogin: String
});

</script>

<template>
    <Head title="Dashboard" />
    <div id="previous-page">
        <h1>This is User dashboard {{ urlBeforeLogin }}</h1>
            <DropdownLink :href="route('logout')" method="post" as="button">
                Log Out
            </DropdownLink>
            <div v-if="urlBeforeLogin">
                <Link :href="urlBeforeLogin">Back to your search</Link>
            </div>
    </div>
</template>
<script>

export default {
    methods: {
    }
}
</script>
