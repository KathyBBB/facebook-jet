<script setup>
import { useGeneralStore } from '@/stores/general.js'

defineProps(['title', 'id', 'c_count', 'con_count', 'parent_id'], ['iss']);

const store = useGeneralStore();

const setIssue = {id: 0, title: 'All', c_count: 0, con_count: 0, parent_id: 0};

const handleClick = (t) => {
    const setIssue = t
    // alert("setIssue" + setIssue)

    store.issue = t;
};
</script>

<template>
    <button @click="handleClick({id, title})" class="h-24 w-44 p-2 shadow-md rounded-md text-center"
        :class="store.issue.id === id ? 'bg-teal-500 text-white' : 'bg-white'">
        <span class="text-xs capitalize font-semibold leading-none">
            {{ title }} {{ id }}
        </span>
        <!-- <span class="text-xxs">
                        {{ ca }}
                    </span> -->
        <div class="grid grid-cols-2 text-xxs mt-2">
            <div v-if="c_count != 0">Sub Issues</div>
            <div v-if="c_count != 0">{{c_count}}</div>
            <div>Content</div>
            <div>{{con_count}}</div>
        </div>

    </button>
    <!-- <button @click="handleClick(title)" class="h-40 w-44 p-4 bg-yellow-200 rounded-md text-center">
        <span class="text-sm capitalize font-semibold leading-none">
            {{ title }}
        </span>
      
        <div class="grid grid-cols-2 text-xxs mt-2">
            <div>Engaged</div>
            <div>20/100</div>
            <div>Red</div>
            <div>30/100</div>
            <div>Blue</div>
            <div>40/100</div>

        </div>

    </button> -->
</template>