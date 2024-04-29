<script setup>
import { onMounted } from 'vue';
import { initFlowbite } from 'flowbite';
import Overview from './Overview.vue';

onMounted(() => {
    initFlowbite();
})
</script>

<template>

    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">

        <ul class="text-sm font-medium text-center text-gray-500 rounded-lg shadow flex dark:divide-gray-700 dark:text-gray-400"
            id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
            <li class="w-full focus-within:z-10" role="presentation">
                <button class="inline-block w-full p-2 border-b-2 rounded-t-lg" id="profile-tab"
                    data-tabs-target="#profile"
                    data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500"
                    type="button" role="tab" aria-controls="profile" aria-selected="false">Overview</button>
            </li>
            <li class="w-full focus-within:z-10" role="presentation">
                <button
                    class="inline-block w-full p-2 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard"
                    aria-selected="false">Dashboard</button>
            </li>
            <li class="w-full focus-within:z-10" role="presentation">
                <button
                    class="inline-block w-full p-2 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings"
                    aria-selected="false">Settings</button>
            </li>
            <li class="w-full focus-within:z-10" role="presentation">
                <button
                    class="inline-block w-full p-2 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts"
                    aria-selected="false">Contacts</button>
            </li>
        </ul>
    </div>
    <div id="default-tab-content">
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
            aria-labelledby="profile-tab">
            <Overview />
            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                    class="font-medium text-gray-800 dark:text-white">Profile tab's associated content</strong>.
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores in quidem soluta, temporibus sint unde
                ad eos similique repudiandae dolor. Excepturi corrupti, magnam velit esse ex aliquam. Consequuntur
                deleniti eveniet doloribus est deserunt quaerat voluptates, sunt architecto incidunt. Et distinctio
                nobis fugit, maiores, quod omnis ullam voluptates quibusdam nulla ea dolores aut. Modi, quas aliquid.
                Sapiente temporibus sequi vel aut nobis beatae laborum tenetur officia suscipit earum dolor ipsum, id
                quo facere, accusamus, perferendis quisquam quaerat asperiores aperiam at harum omnis. Cum eligendi
                nobis minus maiores praesentium est, quis aperiam animi possimus aliquid suscipit iusto voluptatibus
                blanditiis aliquam ipsa, vero commodi delectus laborum at aut! Libero cumque quasi ad sequi numquam fuga
                in, iure deleniti eveniet adipisci consectetur. Esse quasi nam mollitia ad necessitatibus eos dolor hic,
                ratione nihil sapiente odio soluta vel magnam quia laudantium, eaque fugiat ex quas ab dolorum molestias
                itaque possimus voluptate architecto? Explicabo recusandae, quia accusamus id alias possimus praesentium
                eos dolores. Ut, at. Vel iste quasi, ratione omnis accusantium repellendus cum molestias nostrum! Ab
                distinctio esse adipisci quis delectus consequatur asperiores vero eos, obcaecati unde blanditiis
                tempora deleniti commodi est accusamus doloribus consequuntur, reprehenderit, earum architecto saepe.
                Est nihil ea nisi aut obcaecati natus.</p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, dicta autem numquam unde vitae animi a
                voluptatem similique velit quidem eveniet rem maxime iusto sit sapiente ea dolore ducimus voluptas
                repellendus officiis placeat molestiae blanditiis nulla mollitia? Ab nostrum quia maiores voluptatem
                totam qui unde ratione asperiores? Id fugit facilis ipsa optio possimus quaerat molestias nisi ducimus
                exercitationem mollitia rem earum nihil, provident laboriosam sequi excepturi distinctio recusandae
                officia voluptatibus. Sequi sapiente nostrum necessitatibus laboriosam enim ullam similique nobis
                voluptatem quod, illo a maiores ab officiis repellat soluta accusantium doloribus excepturi asperiores
                incidunt quos dolorem. Vero recusandae enim, nemo animi quis aperiam iusto rem aspernatur itaque
                repudiandae ipsum doloremque consequuntur nisi ratione? Dolores aliquid est odit ad possimus perferendis
                provident error, praesentium commodi optio. Voluptatum, fuga eligendi reiciendis excepturi natus
                consequatur vero magnam doloribus quod culpa vitae! Veniam exercitationem commodi facilis? Nesciunt
                vitae in quidem fuga sit pariatur, porro quod nisi asperiores enim est necessitatibus eum voluptatibus a
                blanditiis. Ad voluptatibus nihil nisi incidunt iure voluptatum dolorum dignissimos, tempore
                consequuntur voluptates veniam amet a unde necessitatibus in repellat impedit beatae, veritatis dicta
                eligendi cum ratione. Reprehenderit voluptatibus porro ad, aut minus voluptas iste odio excepturi
                exercitationem error quasi, soluta fuga?
            </p>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
            aria-labelledby="dashboard-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                    class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>.
                Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                classes to control the content visibility and styling.</p>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel"
            aria-labelledby="settings-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                    class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>.
                Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                classes to control the content visibility and styling.</p>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel"
            aria-labelledby="contacts-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                    class="font-medium text-gray-800 dark:text-white">Contacts tab's associated content</strong>.
                Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                classes to control the content visibility and styling.</p>
        </div>
    </div>

</template>