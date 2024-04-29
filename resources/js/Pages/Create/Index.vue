<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useGeneralStore } from '@/stores/general.js'
import { PencilSquareIcon, BookOpenIcon, ClipboardDocumentIcon } from '@heroicons/vue/20/solid';
import CreatePost from '@/Components/App/CreatePost.vue';
import CreatePoll from '@/Components/App/CreatePoll.vue';
import CreateEssay from '@/Components/App/CreateEssay.vue';
import CreateSpeedDial from '@/Components/App/CreateSpeedDial.vue';

const store = useGeneralStore();

const setCreate = 'essay';

const handleCreate = (c) => {
    const setCreate = c
    //  alert(setIssue)

    store.create = c;
};
</script>

<template>
    <AppLayout title="Create">
        <div class="flex flex-col w-full gap-4 mt-2">
            <div v-if="store.create === 'post'">
                <CreatePost />

            </div>
            <div v-if="store.create === 'poll'">
                <CreatePoll />
            </div>
            <div v-if="store.create === 'essay'">
                <CreateEssay />
            </div>
           <CreateSpeedDial />
        </div>

    </AppLayout>
</template>