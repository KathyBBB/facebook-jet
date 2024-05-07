<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Feed from '@/Components/App/Feed.vue';
import { useForm, Head } from '@inertiajs/vue3';
import { useGeneralStore } from '@/stores/general.js';
import { ref, onMounted } from 'vue'

const store = useGeneralStore();

onMounted(() => {
    store.create = 'poll';
})

defineProps(['contents', 'title', 'description', 'errors']);

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
</script>

<template>

    <Head title="Polls" />
    <AppLayout>
        <div class="max-w-7xl mx-auto w-full grow-0">
            <div class="mx-auto px-2">
                <h3>Poll Page</h3>
                <!-- <PrimaryButton @click="showModal = !showModal">Create Poll</PrimaryButton> -->
            </div>


            <form @submit.prevent="form.post(route('polls.store'), { onSuccess: () => form.reset() })">
                <input type="hidden" v-model="store.issue.id" id="issue" name="issue" />
                <div>
                    <input v-model="form.title" placeholder="What's on your mind?"
                        class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
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
            </form>
            <Feed :contents="contents" />
        </div>
    </AppLayout>
</template>