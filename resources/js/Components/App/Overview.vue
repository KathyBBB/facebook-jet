<script setup>
import { ref, watch, onMounted } from 'vue';
import { useGeneralStore } from '@/stores/general.js'

defineProps(['newPicked']);

const store = useGeneralStore();

store.$subscribe((mutation, state) => {
    if (mutation.events.key === "issue") {
        // alert('changed');
    }
    if (mutation.events.key === "picked") {
        //  alert(picked.value);
    }
    if (mutation.events.key === "create") {
        //  alert(picked.value);
    }
});

const setIssue = 1;

defineEmits(['change-variable', 'change-picked']);

const newPicked = ref([]);
const picked = ref([]);

onMounted(() => {
  picked.value = store.picked;
})

const create = ref('post');

//const currentPicked = computed(() => store.picked);

const setPicked = watch(() => picked.value, () => {
    //alert(picked.value);
    store.picked = picked.value;
    picked.value = store.picked;

}, { deep: true });

const setCreate = watch(() => create.value, () => {
    //alert(picked.value);
    store.create = create.value;
    create.value = store.create;

}, { deep: true });



</script>

<template>
    <div class="bg-white w-full">
        <!-- <h3 class="mb-4 font-semibold text-center text-gray-900 dark:text-white">{{ store.issue }} - {{ picked }} - {{
            store.picked }}</h3> -->
        <!-- <ul v-if="route().current() === 'home'"
            class="items-center w-full md:w-1/2 text-xs font-medium text-gray-900 bg-white border border-gray-200 rounded-lg flex dark:bg-gray-700 dark:border-gray-600 dark:text-white text-center gap-4 mx-auto">

            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center ps-3 gap-4 justify-center">
                    <input v-model="picked" id="vue-checkbox-list" type="checkbox" value="polls"
                        class="text-lime-500 bg-gray-100 border-gray-300 rounded focus:ring-lime-500 dark:focus:ring-lime-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="react-checkbox-list">Polls</label>
                </div>
            </li>
            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center justify-center gap-4">
                    <input v-model="picked" id="react-checkbox-list" type="checkbox" value="posts"
                        class="text-purple-500 bg-gray-100 border-gray-300 rounded focus:ring-purple-500 dark:focus:ring-purple-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="react-checkbox-list">Posts</label>
                </div>
            </li>
            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center justify-center gap-4">
                    <input v-model="picked" id="react-checkbox-list" type="checkbox" value="essays"
                        class="text-teal-500 bg-gray-100 border-gray-300 rounded focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="react-checkbox-list">Essays</label>
                </div>
            </li>

        </ul> -->

        <ul v-if="route().current() === 'home'"
            class="items-center w-full md:w-1/2 text-xs font-medium text-gray-900 bg-white border border-gray-200 rounded-lg flex dark:bg-gray-700 dark:border-gray-600 dark:text-white text-center gap-4 mx-auto">
            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center justify-center">
                    <input v-model="picked" id="vue-checkbox-list" type="checkbox" value="essays" name="list-radio"
                        class="text-teal-500 bg-gray-100 border-gray-300 rounded focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="vue-checkbox-list"
                        class="w-full py-3 text-xs font-medium text-gray-900 dark:text-gray-300">View Essays</label>
                </div>
            </li>
            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center ps-3 gap-2">
                    <input v-model="picked" id="vue-checkbox-list" type="checkbox" value="polls"
                        class="text-lime-500 bg-gray-100 border-gray-300 rounded focus:ring-lime-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="vue-checkbox-list"
                        class="w-full py-3 ms-2 text-xs font-medium text-gray-900 dark:text-gray-300">View Polls
                    </label>
                </div>
            </li>
            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center ps-3">
                    <input v-model="picked" id="vue-checkbox-list" type="checkbox" value="posts"
                        class="text-purple-500 bg-gray-100 border-gray-300 rounded focus:ring-purple-500 dark:focus:ring-purple-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="vue-checkbox-list"
                        class="w-full py-3 ms-2 text-xs font-medium text-gray-900 dark:text-gray-300">View Posts</label>
                </div>
            </li>


        </ul>
        <ul v-if="route().current() === 'create'"
            class="items-center w-full md:w-1/2 text-xs font-medium text-gray-900 bg-white border border-gray-200 rounded-lg flex dark:bg-gray-700 dark:border-gray-600 dark:text-white text-center gap-4 mx-auto">
            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center ps-3">
                    <input v-model="create" id="horizontal-list-radio-military" type="radio" value="essay"
                        name="list-radio"
                        class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="horizontal-list-radio-military"
                        class="w-full py-3 ms-2 text-xs font-medium text-gray-900 dark:text-gray-300">Create
                        Essay</label>
                </div>
            </li>

            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center ps-3">
                    <input v-model="create" id="horizontal-list-radio-license" type="radio" value="poll"
                        name="list-radio"
                        class="text-purple-600 bg-gray-100 border-gray-300 focus:ring-purple-500 dark:focus:ring-purple-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="horizontal-list-radio-license"
                        class="w-full py-3 ms-2 text-xs font-medium text-gray-900 dark:text-gray-300">Create Poll
                    </label>
                </div>
            </li>
            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center ps-3">
                    <input v-model="create" id="horizontal-list-radio-id" type="radio" value="post" name="list-radio"
                        class="w-4 h-4 text-lime-600 bg-gray-100 border-gray-300 focus:ring-lime-500 dark:focus:ring-ogblue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="horizontal-list-radio-id"
                        class="w-full py-3 ms-2 text-xs font-medium text-gray-900 dark:text-gray-300">Create
                        Post</label>
                </div>
            </li>

        </ul>
    </div>
</template>