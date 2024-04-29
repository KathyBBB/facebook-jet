<script setup>
import { faker } from '@faker-js/faker';
import Overview from './Overview.vue';
import Issues from './Issues.vue';
import { storeToRefs } from 'pinia'
import { useIssueStore } from '@/stores/issues.js'

//const { issues, loading, error } = storeToRefs(useIssueStore())
// const { fetchIssues } = useIssueStore()

// fetchIssues()

</script>

<template>
    <Issues />
    <!-- <div class="mx-auto">
        <Overview />
    </div> -->
</template>