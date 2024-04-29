<script setup>
import { PencilSquareIcon, BookOpenIcon, ClipboardDocumentIcon } from '@heroicons/vue/20/solid';
import { useGeneralStore } from '@/stores/general.js'


const store = useGeneralStore();

const setCreate = 'essay';

const handleCreate = (c) => {
    const setCreate = c
    //  alert(setIssue)

    store.create = c;
};
</script>

<template>
    <div data-dial-init class="fixed end-10 bottom-16 group">
        <div id="speed-dial-menu-square" class="flex flex-col items-center hidden mb-4 space-y-2">

            <a href="./create" @click="handleCreate('poll')">
                <button type="link" data-tooltip-target="tooltip-poll" data-tooltip-placement="left"
                    class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-lg border border-gray-200 dark:border-gray-600 dark:hover:text-white shadow-sm dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
                    <ClipboardDocumentIcon class="h-6 w-6" />
                    <span class="sr-only">Create Poll</span>
                </button>
            </a>
            <div id="tooltip-poll" role="tooltip"
                class="absolute z-10 invisible inline-block w-auto text-nowrap px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Create Poll
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <a href="./create" @click="handleCreate('essay')">
                <button type="link" data-tooltip-target="tooltip-essay" data-tooltip-placement="left"
                    class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-lg border border-gray-200 dark:border-gray-600 dark:hover:text-white shadow-sm dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
                    <BookOpenIcon class="h-6 w-6" />
                    <span class="sr-only">Create Essay</span>
                </button>
            </a>
            <div id="tooltip-essay" role="tooltip"
                class="absolute z-10 invisible inline-block w-auto text-nowrap px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Create Essay
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <a href="./create" @click="handleCreate('post')">

                <button type="link" data-tooltip-target="tooltip-post" data-tooltip-placement="left"
                    class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-lg border border-gray-200 dark:border-gray-600 dark:hover:text-white shadow-sm dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
                    <PencilSquareIcon class="h-6 w-6" />
                    <span class="sr-only">Create Post</span>
                </button>
            </a>
            <div id="tooltip-post" role="tooltip"
                class="absolute z-10 invisible inline-block w-auto text-nowrap px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Create Post
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>
        <button type="button" data-dial-toggle="speed-dial-menu-square" aria-controls="speed-dial-menu-square"
            aria-expanded="false"
            class="flex items-center justify-center text-white bg-ogblue-700 rounded-lg w-10 h-10 hover:bg-ogred-800 dark:bg-ogblue-600 dark:hover:bg-ogblue-700 focus:ring-4 focus:ring-ogblue-300 focus:outline-none dark:focus:ring-ogblue-800">
            <svg class="w-5 h-5 transition-transform group-hover:rotate-45" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 1v16M1 9h16" />
            </svg>
            <span class="sr-only">Open actions menu</span>
        </button>
    </div>
</template>