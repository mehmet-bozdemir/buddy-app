<template>
    <form
        @submit.prevent="filter"
        class="w-full mb-4"
    >
        <div class="border-[1px] flex items-center justify-end gap-3 border-yellow-400 rounded-full bg-white">
            <input
                v-model="filterForm.name"
                class="w-full py-2 rounded-full text-gray-600 border-none focus:ring-0"
                type="text"
                placeholder="Find buddy"
                aria-label="Full name"
            >
            <button
                type="submit"
                class="p-2 bg-yellow-500 rounded-full text-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </button>
        </div>
    </form>
</template>

<script setup>
import {useForm} from "@inertiajs/vue3";

const props = defineProps({filter: Object})

const filterForm = useForm({
    name : props.filter.name ?? null,
})

const filter = () => {
    filterForm.get(
        route('buddy.index'),
        {
            preserveState: true,
            preserveScroll: true,
        },
    )
}

</script>
