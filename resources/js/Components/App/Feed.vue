<script setup>
import Issues from './Issues.vue'
import { useGeneralStore } from '@/stores/general.js'
import Overview from './Overview.vue';
import Post from './Post.vue'
import Poll from './Poll.vue'
import Essay from './Essay.vue'
//=================
import { storeToRefs } from 'pinia'
import { useContentStore } from '@/stores/contents.js'

// const { contents, loading, error } = storeToRefs(useContentStore())
// const { fetchIssues } = useIssueStore()

// fetchIssues()

//====================
const store = useGeneralStore();

// store.$subscribe((mutation, state) => {
//     if (mutation.events.key === "issue") {
//         // alert('changed');
//     }
// });

// Use store to get contents
const props = defineProps(['contents']);
</script>

<template>

    <div class="grid grid-cols-1 mx-auto px-2">
        <section class="">
            <!-- <Issues /> -->

        </section>
        <section class="">


        </section>
        <div v-if="props.contents">
            <section class="flex flex-col">
                {{ props.contents.data.length }}

                <div v-for="content in props.contents.data" class="flex justify-center">

                    <div class="w-[95%] mx-auto" v-if="content.issue_id === store.issue.id">
                        <div v-if="content.type === 'post' && store.picked.includes('posts')"
                            class="bg-purple-100 p-4 my-2 rounded-md shadow-md border border-purple-500">
                            <Post :content="content" />

                        </div>
                        <div v-if="content.type === 'poll' && store.picked.includes('polls')"
                            class="bg-lime-50 p-4 my-2 rounded-md shadow-md border border-lime-500">
                            <Poll :content="content" />
                        </div>
                        <div v-if="content.type === 'essay' && store.picked.includes('essays')"
                            class="bg-teal-50 p-4 my-2 rounded-md shadow-md border border-teal-500">
                            <Essay :content="content" />
                        </div>
                    </div>

                    <!-- <div class="h-[150px] bg-purple-200 w-full">
                        <div v-if="content.type = 'essay'">
                            <div> {{ content.id }}</div>
                        </div>
                    </div> -->
                </div>
            </section>
        </div>
    </div>
</template>