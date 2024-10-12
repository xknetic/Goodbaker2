<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? 'block w-full ps-6 py-2 text-white bg-[#0108EE] shadow-xl rounded-lg transition duration-150 ease-in-out'
        : 'block w-full ps-6 py-2 rounded-lg hover:text-white hover:bg-[#0108EE] hover:shadow-xl hover:rounded-lg transition duration-150 ease-in-out'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>