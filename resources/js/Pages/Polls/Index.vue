<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Feed from '@/Components/App/Feed.vue';
import NewPollModal from '@/Components/App/NewPollModal.vue';
import { CheckCircleIcon, PlusCircleIcon, XCircleIcon } from '@heroicons/vue/24/solid';
import { useForm, Head } from '@inertiajs/vue3';
import { useGeneralStore } from '@/stores/general.js';
import { ref, onMounted } from 'vue'

const store = useGeneralStore();

onMounted(() => {
    store.create = 'poll';
})

defineProps(['contents', 'title', 'description', 'errors']);

const showModal = ref(false)

const form = useForm({
    title: '',
    newAnswers: [
        { order_id: 1, answer: '' },
        { order_id: 2, answer: '' },
        { order_id: 3, answer: '' },
        { order_id: 4, answer: '' },
    ],
    issue: store.issue.id,
});

const closeModal = () => {

    form.title = '';
    form.newAnswers = [
        { answer_id: 1, answer: '' },
        { answer_id: 2, answer: '' },
        { answer_id: 3, answer: '' },
        { answer_id: 4, answer: '' },
    ];
    form.errors.title = '';
    form.errors.newAnswers = [''];
    form.reset();
    showModal.value = false;
};
</script>

<template>

    <Head title="Polls" />
    <AppLayout>
        <div class="max-w-7xl mx-auto w-full grow-0">
            <div class="mx-auto px-2">
                <h3>Poll Page</h3>
                <PrimaryButton @click="showModal = !showModal">Create Poll</PrimaryButton>
            </div>
            <!-- <form @submit.prevent="form.post(route('polls.store'), { onSuccess: () => form.reset()})">
                <input type="hidden" v-model="store.issue.id" id="issue" name="issue" />
                <div>
                    <input v-model="form.title" placeholder="What's on your mind?"
                        class="block w-full border-gray-300 focus:border-ogblue-300 focus:ring focus:ring-ogblue-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        required />
                    <InputError :message="form.errors.title" class="mt-2" />
                </div>
                <tr v-for="(answer, index) in form.newAnswers">
                    <th scope="row">{{ answer.order_id }}</th>
                    <td>
                        <TextInput v-model="answer.answer" type="text" :ref="'answer' + index" class="w-full"
                            required />

                    </td>

                </tr>

                <PrimaryButton class="mt-4">Save</PrimaryButton>
            </form> -->
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
                    <form @submit.prevent="form.post(route('polls.store'), { onSuccess: () => closeModal() })">
                        <input type="hidden" v-model="store.issue.id" id="issue" name="issue" />
                        <div>
                            <input v-model="form.title" placeholder="What's on your mind?"
                                class="block w-full border-gray-300 focus:border-ogblue-300 focus:ring focus:ring-ogblue-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                required />
                            <InputError :message="form.errors.title" class="mt-2" />
                        </div>
                        <table class="w-full">
                            <thead>
                                <tr class="w-full">
                                    <th>#</th>
                                    <th>Answers</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        <InputError :message="form.errors.newAnswers"
                                            class="p-2 m-2 rounded font-bold text-ogred-900 italic text-lg" />
                                    </td>
                                </tr>

                                <tr v-for="(answer, index) in form.newAnswers">
                                    <th scope="row">{{ answer.order_id }}</th>
                                    <td>
                                        <TextInput v-model="answer.answer" type="text" :ref="'answer' + index"
                                            class="w-full" required />

                                    </td>

                                </tr>
                            </tbody>
                        </table>
                        <div class="flex items-center gap-6 mx-auto justify-center my-4">

                            <!-- <PrimaryButton @click="closeModal" class="bg-ogred-800"><span
                                    class="px-2 flex items-center text-xxs">
                                    <XCircleIcon class="h-5 w-5 mr-2" /> Close
                                </span></PrimaryButton> -->
                            <PrimaryButton type="submit" v-if="form.newAnswers.length > 3">
                                <span class="px-2 flex items-center text-xxs">
                                    <CheckCircleIcon class="h-5 w-5 mr-2" /> Save
                                </span>
                            </PrimaryButton>
                        </div>
                    </form>
                </template>
                <template #footer>

                    <!-- <div class="flex items-center gap-6 mx-auto justify-center">

                        <PrimaryButton @click="closeModal" class="bg-ogred-800"><span
                                class="px-2 flex items-center text-xxs">
                                <XCircleIcon class="h-5 w-5 mr-2" /> Close
                            </span></PrimaryButton>
                        <PrimaryButton type="submit" v-if="form.newAnswers.length > 3">
                            <span class="px-2 flex items-center text-xxs">
                                <CheckCircleIcon class="h-5 w-5 mr-2" /> Save
                            </span>
                        </PrimaryButton>
                    </div> -->
                </template>

            </NewPollModal>
        </Teleport>
    </AppLayout>
</template>