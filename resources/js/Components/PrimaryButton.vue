<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-ogblue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-ogblue-700 focus:bg-ogblue-700 active:bg-ogblue-900 focus:outline-none focus:ring-2 focus:ring-ogred-500 focus:ring-offset-2 transition ease-in-out duration-150">
        <slot />
    </button>
</template>
