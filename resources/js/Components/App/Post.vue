<script setup>
defineProps(['content']);
</script>

<template>
    <div>
        <div class="my-4"> {{ content.id }} - {{ content.type }} - {{ content.issue_id }} {{
            content.user.profile_photo_path }} {{ content.user.name }} </div>

        <p class="py-2">{{ content.content }}</p>
        <div>
            <img :src="content.image" alt="" class="w-full" />
        </div>
    </div>
</template>