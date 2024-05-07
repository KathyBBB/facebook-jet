<script setup>
import NewPollModal from '@/Components/App/NewPollModal.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import Feed from '@/Components/App/Feed.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { CheckCircleIcon, PlusCircleIcon, XCircleIcon } from '@heroicons/vue/24/solid';
import { useGeneralStore } from '@/stores/general.js'
import { ref, onMounted } from 'vue'
import { useForm, router } from '@inertiajs/vue3'
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';

const store = useGeneralStore();

onMounted(() => {
    store.create = 'poll';
})
//defineProps(['contents', 'title', 'description', 'errors']);

const showModal = ref(false)

const form = useForm({
    title: '',
    newAnswers: [
        { answer_id: 1, answer: '' },
    ],
    errors: {
        title: '',
        newAnswers: [
            { answer_id: 1, answer: '' },
        ],
    },
});

let answerId = 1;

const addAnswer = () => {
    answerId++;
    form.newAnswers.push({
        answer_id: answerId,
        answer: '',
    });
    //answerId++;

};

// initialize components based on data attribute selectors

//const setIssue = 1;

const handleClick = (t) => {
    //const setIssue = t
    //  alert(setIssue)

    store.issue = t;

};

function validateAnswers() {
    //alert(form.newAnswers.length);

    for (const answer of form.newAnswers) {
        if (answer.answer === '') {
            form.errors.newAnswers = 'The Poll must have four answers!';
            showModal.value = true;
            return;
        }
        form.errors.newAnswers = [''];
        // form.title = '';
        // form.newAnswers = [
        //     { answer_id: 1, answer: '' },
        //     { answer_id: 2, answer: '' },
        //     { answer_id: 3, answer: '' },
        //     { answer_id: 4, answer: '' },
        // ];
        showModal.value = false;
        return;
    }

};

const closeModal = () => {
    showModal.value = false;
    form.title = '';
    form.newAnswers = [
        { answer_id: 1, answer: '' },
        { answer_id: 2, answer: '' },
        { answer_id: 3, answer: '' },
        { answer_id: 4, answer: '' },
    ];
    form.errors.title = '';
    form.errors.newAnswers = [''];
    showModal.value = false;
};

const submitQuestion = () => {

    if (form.title === '') {
        form.errors.title = 'The question cannot be empty!';
        showModal.value = true;
        return;
    }

    form.errors.title = '';

    validateAnswers();
    //alert(form.title + ' ' + form.newAnswers[0].answer + ' ' + form.newAnswers[1].answer + ' ' + form.newAnswers[2].answer + ' ' + form.newAnswers[3].answer, store.issue);
    router.post('/polls'), {
        title: form.title,
        answers: form.newAnswers,
        issue: store.issue,
    };

    return;
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
            <!-- <Feed :contents="contents" /> -->

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
                    <form @submit.prevent="submitQuestion">
                        {{ form.errors }} {{ form.newAnswers }}
                        <div>
                            <InputLabel for="title" value="New Poll" />
                            <TextInput v-model="form.title" id="title" type="text" class="mt-1 block w-full" required
                                placeholder="What is your question?" />
                            <InputError :message="form.errors.title"
                                class="p-2 m-2 rounded font-bold text-ogred-900 italic text-lg" />
                        </div>
                        <div>
                            <InputLabel for="description">Description</InputLabel>
                            <textarea id="description"
                                class="mt-1 block w-full border-gray-300 focus:border-ogblue-500 focus:ring-ogblue-500 rounded-md shadow-sm"
                                placeholder="Optional"></textarea>
                        </div>
                        <div>
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
                                        <th scope="row">{{ answer.answer_id }}</th>
                                        <td>
                                            <TextInput v-model="answer.answer" type="text" :ref="'answer' + index"
                                                class="w-full" required />

                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                    {{ form.newAnswers.length }} {{ form.newAnswers }}
                </template>
                <template #footer>
                    <div class="flex items-center gap-6 mx-auto justify-start my-4">
                        <PrimaryButton v-if="form.newAnswers.length < 4 && form.newAnswers.answer != ''"
                            @click="addAnswer">
                            <span class="px-2 flex items-center text-xxs">
                                <PlusCircleIcon class="h-5 w-5 mr-2" /> Add Answer
                            </span>
                        </PrimaryButton>

                    </div>
                    <div class="flex items-center gap-6 mx-auto justify-center">

                        <PrimaryButton @click="closeModal" class="bg-ogred-800"><span
                                class="px-2 flex items-center text-xxs">
                                <XCircleIcon class="h-5 w-5 mr-2" /> Close
                            </span></PrimaryButton>
                        <PrimaryButton type="submit" v-if="form.newAnswers.length > 3">
                            <span class="px-2 flex items-center text-xxs">
                                <CheckCircleIcon class="h-5 w-5 mr-2" /> Save
                            </span>
                        </PrimaryButton>
                    </div>
                </template>

            </NewPollModal>
        </Teleport>
    </AppLayout>
</template>