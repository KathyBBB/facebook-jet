<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: String,
    active: Boolean,
});

const classes = computed(() => {
    return props.active
        ? 'relative flex items-center justify-center w-6 h-6 md:h-7 md:w-7 p-0.5 text-white transition-all duration-300 ease-linear bg-ogred-800 shadow-lg hover:bg-ogblue-800 rounded-lg'
        : 'relative flex items-center justify-center w-6 h-6 md:h-7 md:w-7 p-0.5 text-white transition-all duration-300 ease-linear bg-blue-900 shadow-lg hover:bg-red-800 hover:rounded-lg rounded-full';
});
</script>

<template>
    <Link :href="href" :class="classes">
    <slot />
    </Link>
</template>
