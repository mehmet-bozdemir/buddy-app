<template>
<HeaderBlock></HeaderBlock>
    <header class="w-full bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 ">
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between">
                <div class="text-xl text-yellow-500 dark:text-yellow-300 font-bold">
                    <Link :href="route('buddy.index')">Buddies</Link>&nbsp;
                </div>
                <div class="text-3xl text-yellow-500 dark:text-yellow-300 font-bold text-center">
                    <Link :href="route('buddy.index')">buddyApp</Link>&nbsp;
                </div>
                <div class="text-lg font-medium">
                    <Link :href="route('buddy.create')" class="btn-primary">+ New Buddy</Link>&nbsp;
                </div>
            </nav>
        </div>
    </header>
    <main class="container mx-auto p-4">
        <div v-if="flashSuccess" class="mb-4 p-2 border rounded-md shadow-sm border-green-200 bg-green-50">
            {{ flashSuccess }}
        </div>
        <slot />
    </main>
</template>

<script setup>
import {Link, usePage} from '@inertiajs/vue3'
import {computed} from 'vue'
import HeaderBlock from "@/Components/UI/HeaderBlock.vue";

const page = usePage()
const flashSuccess = computed(
  () => page.props.flash.success,
)
</script>
