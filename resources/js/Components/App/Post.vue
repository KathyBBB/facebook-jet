<script setup>
defineProps(['content']);
</script>

<template>
    <div>
        <div class="my-4 flex gap-4 items-center"> {{ content.id }} - {{ content.type }} - {{ content.issue_id }}
            <img :src="content.user.profile_photo_path" :alt="content.user.name" class="h-8 w-8 rounded-full bg-white m-1">
            {{ content.user.name }}
        </div>

        <p class="py-2">{{ content.content }}</p>
        <div>
            <img :src="content.image" alt="" class="w-full" />
        </div>
    </div>
</template>