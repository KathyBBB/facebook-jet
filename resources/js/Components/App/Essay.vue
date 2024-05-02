<script setup>
defineProps(['content']);
</script>

<template>
    <div>
       <div class="justify-between flex">
        <div class="flex justify-start gap-4 items-center">
            <div class="">
                <div class="my-4"> <img :src="content.user.profile_photo_path" :alt="content.user.name" class="h-8 w-8 rounded-full bg-white m-1"></div>
            </div>
            <div class="">
                <div class="my-4"> {{ content.user.name }}</div>
            </div>
        </div>
        <div class="my-4 space-x-2 text-sm" v-if="content.series > 0"> 
            <button class="uppercase bg-teal-700 text-white px-3 py-1 rounded-lg">{{ content.type }}</button>
            <button class="italic bg-white border text-teal-800 px-3 py-1 rounded-lg">Series</button>
            {{ content.id }} -  {{ content.issue_id }}</div>
        </div>
       
        
        <h3 class="font-semibold uppercase">{{ content.title }}</h3>
        <p class="my-4">{{ content.content }}</p>
    </div>
</template>