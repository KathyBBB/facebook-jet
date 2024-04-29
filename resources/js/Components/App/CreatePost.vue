<script setup>
import { useGeneralStore } from '@/stores/general.js'
import { PhotoIcon, UserCircleIcon } from '@heroicons/vue/24/solid'

const store = useGeneralStore();

const pholder = 'Join the ' + store.issue.title + ' discussion...'
</script>

<template>
    <section class="p-4 w-[95%] mx-auto border rounded shadow-md">
        <!-- <p> Hello Creator Issue: {{ store.issue }} Create: {{ store.create }}</p>
        <p> Create {{ store.create }} Form</p> -->
        <form>
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                   
                    <p class="mt-1 text-sm text-gray-600">Your post will appear in the <span class="uppercase font-semibold">{{ store.issue.title }}</span>  collection</p>

                    <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                       
                        <div class="col-span-full">
                            
                            <div class="mt-2">
                                <textarea id="about" name="about" rows="3"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    :placeholder="pholder"></textarea>
                                    
                            </div>
                            
                        </div>

                        <div class="col-span-full">
                            <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                            <div class="mt-2 flex items-center gap-x-3">
                                <UserCircleIcon class="h-12 w-12 text-gray-300" aria-hidden="true" />
                                <button type="button"
                                    class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Change</button>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Cover
                                photo</label>
                            <div
                                class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <div class="text-center">
                                    <PhotoIcon class="mx-auto h-12 w-12 text-gray-300" aria-hidden="true" />
                                    <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                        <label for="file-upload"
                                            class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="file-upload" name="file-upload" type="file" class="sr-only" />
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>

    </section>
    <section class="p-4 w-[95%] mx-auto border rounded shadow-md">
        <p class="capitalize">{{ store.create }} Statistics</p>
        <p>Most Popular</p>
        <p>Most Popular by user state</p>
        <p>Most Popular by user county</p>

    </section>
</template>