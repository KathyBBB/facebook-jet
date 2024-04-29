<script setup>
defineProps(['content']);
</script>

<template>
    <div>
        <div class="my-4"> {{ content.id }} - {{ content.type }} - {{ content.issue_id }}</div>
        <p class="my-4">{{ content.title }}</p>
        <ul>
            <li>Answer 1</li>
            <li>Answer 2</li>
            <li>Answer 3</li>
            <li>Answer 4</li>
        </ul>
    </div>
</template>