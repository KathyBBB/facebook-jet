<script setup>
import NewPollModal from '@/Components/App/NewPollModal.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import Feed from '@/Components/App/Feed.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useGeneralStore } from '@/stores/general.js'

defineProps(['contents', 'title', 'ca']);

import { ref } from 'vue'

const showModal = ref(false)

const store = useGeneralStore();
// initialize components based on data attribute selectors

const setIssue = 1;
const setCreate = 'poll';

const handleClick = (t) => {
    const setIssue = t
    //  alert(setIssue)

    store.issue = t;

};


</script>

<template>
    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Polls') }}
            </h2>
        </template>

        <div class="max-w-7xl mx-auto w-full grow-0">
            <div class="mx-auto px-2">
                <h3>Poll Page</h3>
               <PrimaryButton @click="showModal = !showModal">Create Poll</PrimaryButton>
            </div>
            <Feed :contents="contents" />

        </div>
        <NewPollModal :show="showModal" @close="showModal = false">
            <template #header>
                <div class="text-center">
                <h3 class="font-semibold tracking-widest text-lg">Create New Poll</h3>
                <h6 class="font-semibold">for {{ store.issue.title }}</h6>
            </div>
            </template>
            <template #body>
                <div>
                    <label for="title">Title</label>
                    <input type="text" id="title"  />
                </div>
                <div>
                    <label for="ca">Content</label>
                    <textarea id="ca" ></textarea>
                </div>
            </template>
            <template #footer>
                <PrimaryButton @click="showModal = false">Close</PrimaryButton>
                <PrimaryButton @click="showModal = false">Create</PrimaryButton>
            </template>
        </NewPollModal>
    </AppLayout>
</template>