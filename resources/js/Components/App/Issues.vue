<script setup>
import { faker } from '@faker-js/faker';
import Issue from './Issue.vue';

import { storeToRefs } from 'pinia'
import { useIssueStore } from '@/stores/issues.js'

const { issues, loading, error } = storeToRefs(useIssueStore())
const { fetchIssues } = useIssueStore()

fetchIssues()

// const issueData = [...Array(10)].map(() => ({
//     title: faker.lorem.words(2),
//     created_at: faker.date.recent(),

// }));

</script>

<template>
    <div
        class="flex bg-yellow-300 h-28 space-x-2 items-center overflow-x-auto scrollbar-thin scrollbar-thumb-ogblue-800 scrollbar-track-slate-50 px-4 overflow-y-hidden" >
        <div v-for="iss in issues" >
            <Issue :title="iss.title" :ca="iss.created_at" :id="iss.id" :iss="iss" :c_count="iss.children_count" :con_count="iss.content_count" :parent_id="iss.parent_id" />
        </div>
    </div>
</template>