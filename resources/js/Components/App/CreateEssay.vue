<script setup>
import { useGeneralStore } from '@/stores/general.js'

const store = useGeneralStore();
</script>

<template>
    <section class="p-4 w-[95%] mx-auto border rounded shadow-md">
        <p> Hello Creator {{ store.issue }} {{ store.create }}</p>
        <p> Create {{ store.create }} Form</p>

    </section>
    <section class="p-4 w-[95%] mx-auto border rounded shadow-md">
        <p class="capitalize">{{ store.create }} Statistics</p>
        <p>Most Popular</p>
        <p>Most Popular by user state</p>
        <p>Most Popular by user county</p>

    </section>
</template>