<script setup>
import NewPollModal from '@/Components/App/NewPollModal.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import Feed from '@/Components/App/Feed.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useGeneralStore } from '@/stores/general.js'
import { ref, onMounted } from 'vue'
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';

const store = useGeneralStore();

onMounted(() => {
    store.create = 'poll';
})
defineProps(['contents', 'title', 'description']);

const showModal = ref(false)


// initialize components based on data attribute selectors

//const setIssue = 1;

const handleClick = (t) => {
    //const setIssue = t
    //  alert(setIssue)

    store.issue = t;

};


</script>

<template>
    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Polls') }}
            </h2>
        </template>

        <div class="max-w-7xl mx-auto w-full grow-0">
            <div class="mx-auto px-2">
                <h3>Poll Page</h3>
                <PrimaryButton @click="showModal = !showModal">Create Poll</PrimaryButton>
            </div>
            <Feed :contents="contents" />

        </div>
        <Teleport to="body">
            <NewPollModal :show="showModal" @close="showModal = false">
                <template #header>
                    <div class="text-center">
                        <h3 class="font-semibold tracking-widest text-lg">Create New Poll</h3>
                        <h6 class="font-semibold">for {{ store.issue.title }}</h6>
                    </div>
                </template>
                <template #body>
                    <form action="">
                        <div>
                            <InputLabel for="title" value="Poll Title" />
                            <TextInput id="title" type="text" class="mt-1 block w-full" required autocomplete="title" />
                            <!-- <InputError :message="form.errors.title" class="mt-2" /> -->
                        </div>
                        <div>
                            <InputLabel for="description">Description</InputLabel>
                            <textarea id="description" class="mt-1 block w-full border-gray-300 focus:border-ogblue-500 focus:ring-ogblue-500 rounded-md shadow-sm"></textarea>
                        </div>
                    </form>

                </template>
                <template #footer>
                    <PrimaryButton @click="showModal = false">Close</PrimaryButton>
                    <PrimaryButton @click="showModal = false">Create</PrimaryButton>
                </template>

            </NewPollModal>
        </Teleport>
    </AppLayout>
</template>