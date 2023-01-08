<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/inertia-vue3';

const showingNavigationDropdown = ref(false);

defineProps({
    urlBeforeLogin: String
});

</script>

<template>
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
