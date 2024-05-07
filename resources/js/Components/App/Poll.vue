<script setup>
defineProps(['content']);
</script>

<template>
    <div>
        <div class="my-4"> {{ content.id }} - {{ content.type }} - {{ content.issue_id }} {{ content.user.name }}</div>
        <p class="my-4">{{ content.title }}</p>
        <ul v-for="answers in content.answers">
            <li>{{ answers.orderId }} - {{ answers.answer }}</li>

        </ul>
    </div>
</template>