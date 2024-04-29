<script setup>
import { ref } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import Overview from '@/Components/App/Overview.vue';
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import { faker } from '@faker-js/faker';
import Feed from '@/Components/App/Feed.vue';
import { useGeneralStore } from '@/stores/general.js'
import { PencilSquareIcon } from '@heroicons/vue/20/solid';
import CreateSpeedDial from '@/Components/App/CreateSpeedDial.vue';

defineProps(['contents', 'title', 'ca']);

const store = useGeneralStore();
// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
})

// const issueData = [...Array(10)].map(() => ({
//     title: faker.lorem.words(2),
//     created_at: faker.date.recent(),

// }));

const setIssue = 1;
const setCreate = 'essay';

const handleClick = (t) => {
    const setIssue = t
    //  alert(setIssue)

    store.issue = t;

};

const handleCreate = (c) => {
    const setCreate = c
    //  alert(setIssue)

    store.create = c;
};
</script>

<template>
    <AppLayout title="Home">
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Home
            </h2>
        </template> -->

        <div class="max-w-7xl mx-auto w-full grow-0">

            <Feed :contents="contents" />

            <CreateSpeedDial />

        </div>

    </AppLayout>
</template>
