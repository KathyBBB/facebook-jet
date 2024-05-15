<script setup>
import { ref } from 'vue';
defineProps(['content']);

const picked = ref(null);
</script>

<template>
    <div>
        <!-- <div class="my-4"> {{ content.id }} - {{ content.type }} - {{ content.issue_id }} {{ content.user.name }}</div> -->
        <div class="flex justify-between items-center mx-auto">
            <div class="text-semibold uppercase">{{content.id}} {{ content.title }}</div>
            <span
                class="bg-yellow-100 text-yellow-800 border shadow-sm text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Unpublished</span>

        </div>
        <div class="flex justify-between items-center mx-auto border-b-2 pb-2">
            <span class="text-xs italic text-semibold"> {{ content.user.name }}</span>
            <span class="text-xs italic text-semibold"> {{ content.created_at }}</span>
        </div>
        <div>
            <p class="text-sm p-4">{{ content.content }}</p>
        </div>
        <div class="p-4">
            <ul v-for="answers in content.answers" :key="answers.id">
                <li class="w-full grid grid-cols-5 border-b mb-3">

                    <span class="mx-2 text-lg uppercase align-middle col-span-4">
                        <span class="font-semibold mr-3">~</span>{{answers.id}} - {{ answers.answer }}
                    </span>
                    <span><input type="radio" :value="answers.id" v-model="picked"></span>
                </li>

            </ul>
            <span>{{ picked }} {{ content.id }} {{ $page.props.auth.user.id }}</span>
        </div>
    </div>
</template>