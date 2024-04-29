<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    groups: {
        type: Array,
    },
});
</script>

<template>
    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Groups') }}
            </h2>
        </template>

        <div class="max-w-7xl mx-auto w-full grow-0">
            <div>
                <h3>Group Page</h3>
            </div>
            <div v-for="group in groups" class="p-4 flex flex-col gap-4">
                <div class="font-semibold capitalize">{{ group.name }}</div>
                <h3 v-if="group.user.length > 0" class="font-semibold underline">Members</h3>
                <div v-for="user in group.user" class="pl-4">{{ user.name }}</div>
            </div>

        </div>
    </AppLayout>
</template>