<script setup>
import { ref } from 'vue';
import { Link, router, useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    user: Object,
});

const form = useForm({
    _method: 'PUT',
    name: props.user.name,
    email: props.user.email,
    photo: null,
    birthdate: props.user.birthdate,
    zipcode_id: props.user.zipcode_id,
    education: props.user.education,
    party_affiliation: props.user.party_affiliation,
});

const verificationLinkSent = ref(null);
const photoPreview = ref(null);
const photoInput = ref(null);

const updateProfileInformation = () => {
    if (photoInput.value) {
        form.photo = photoInput.value.files[0];
    }

    form.post(route('user-profile-information.update'), {
        errorBag: 'updateProfileInformation',
        preserveScroll: true,
        onSuccess: () => clearPhotoFileInput(),
    });
};

const sendEmailVerification = () => {
    verificationLinkSent.value = true;
};

const selectNewPhoto = () => {
    photoInput.value.click();
};

const updatePhotoPreview = () => {
    const photo = photoInput.value.files[0];

    if (!photo) return;

    const reader = new FileReader();

    reader.onload = (e) => {
        photoPreview.value = e.target.result;
    };

    reader.readAsDataURL(photo);
};

const deletePhoto = () => {
    router.delete(route('current-user-photo.destroy'), {
        preserveScroll: true,
        onSuccess: () => {
            photoPreview.value = null;
            clearPhotoFileInput();
        },
    });
};

const clearPhotoFileInput = () => {
    if (photoInput.value?.value) {
        photoInput.value.value = null;
    }
};
</script>

<template>
    <FormSection @submitted="updateProfileInformation">
        <template #title>
            Profile Information
        </template>

        <template #description>
            Update your account's profile information and email address.
        </template>

        <template #form>
            <!-- Profile Photo -->
            <div v-if="$page.props.jetstream.managesProfilePhotos" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input id="photo" ref="photoInput" type="file" class="hidden" @change="updatePhotoPreview">

                <InputLabel for="photo" value="Photo" />

                <!-- Current Profile Photo -->
                <div v-show="!photoPreview" class="mt-2">
                    <img :src="user.profile_photo_url" :alt="user.name" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div v-show="photoPreview" class="mt-2">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                        :style="'background-image: url(\'' + photoPreview + '\');'" />
                </div>

                <SecondaryButton class="mt-2 me-2" type="button" @click.prevent="selectNewPhoto">
                    Select A New Photo
                </SecondaryButton>

                <SecondaryButton v-if="user.profile_photo_path" type="button" class="mt-2" @click.prevent="deletePhoto">
                    Remove Photo
                </SecondaryButton>

                <InputError :message="form.errors.photo" class="mt-2" />
            </div>

            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="name" value="Name" />
                <TextInput id="name" v-model="form.name" type="text" class="mt-1 block w-full" required
                    autocomplete="name" />
                <InputError :message="form.errors.name" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="email" value="Email" />
                <TextInput id="email" v-model="form.email" type="email" class="mt-1 block w-full" required
                    autocomplete="username" />
                <InputError :message="form.errors.email" class="mt-2" />

                <div v-if="$page.props.jetstream.hasEmailVerification && user.email_verified_at === null">
                    <p class="text-sm mt-2">
                        Your email address is unverified.

                        <Link :href="route('verification.send')" method="post" as="button"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-ogblue-500"
                            @click.prevent="sendEmailVerification">
                        Click here to re-send the verification email.
                        </Link>
                    </p>

                    <div v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                        A new verification link has been sent to your email address.
                    </div>
                </div>
            </div>
            <!-- Birthdate -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="birthdate" value="Birthdate" />
                <TextInput id="birthdate" v-model="form.birthdate" type="date" class="mt-1 block w-full"
                    autocomplete="birthdate" />
                <InputError :message="form.errors.birthdate" class="mt-2" />
            </div>
            <!-- Zipcode -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="zipcode_id" value="Zipcode" />
                <TextInput id="zipcode_id" v-model="form.zipcode_id" type="text" class="mt-1 block w-full"
                    autocomplete="zipcode_id" />
                <InputError :message="form.errors.zipcode_id" class="mt-2" />
            </div>
            <!-- Education -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="education" value="Education" />

                <select v-model="form.education" id="education" name="education" autocomplete="education"
                    class="mt-1 block w-full border-gray-300 focus:border-ogblue-500 focus:ring-ogblue-500 rounded-md shadow-sm">
                    <option value="High School" :selected="form.education">High School</option>
                    <option value="Technical/Vocational" :selected="form.education">Technical/Vocational Training
                    </option>
                    <option value="Some College" :selected="form.education">Some College</option>
                    <option value="Associates Degree" :selected="form.education">Associates Degree</option>
                    <option value="Bachelor Degree" :selected="form.education">Bachelor Degree</option>
                    <option value="Masters Degree">Masters Degree</option>
                    <option value="Doctoral Degree">Doctoral Degree</option>
                    <option value="Other">Other</option>
                </select>

            </div>
            <!-- Party Affiliation -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="party_affiliation" value="Party Affiliation" />

                <select v-model="form.party_affiliation" id="party_affiliation" name="party_affiliation" autocomplete="party_affiliation"
                    class="mt-1 block w-full border-gray-300 focus:border-ogblue-500 focus:ring-ogblue-500 rounded-md shadow-sm">
                    <option value="Democrat" :selected="form.party_affiliation">Democrat</option>
                    <option value="Independent" :selected="form.party_affiliation">Independent</option>
                    <option value="Republican" :selected="form.party_affiliation">Republican</option>
                    <option value="Other" :selected="form.party_affiliation">Other</option>
                </select>

            </div>
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="me-3">
                Saved.
            </ActionMessage>

            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </PrimaryButton>
        </template>
    </FormSection>
</template>
