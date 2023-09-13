<template>
    <Search :filter="filter"></Search>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
        <Box v-for="buddy in buddies.data" :key="buddy.id">
            <Link :href="route('buddy.show', buddy.id)">
                <BuddyMainInfo :buddy="buddy" class="text-2xl font-bold"/>
                <BuddySecondaryInfo :buddy="buddy" class="text-lg"/>
            </Link>
            <div>
                <Link :href="route('buddy.edit', buddy.id)">Edit</Link>&nbsp;
                <Link :href="route('buddy.destroy', buddy.id)" method="delete" as="button">Delete</Link>
            </div>
        </Box>
    </div>

    <div v-if="buddies.data.length" class="w-full flex justify-center mt-8 mb-8">
        <Pagination :links="buddies.links"/>
    </div>

</template>

<script setup>
import {Link} from '@inertiajs/vue3'
import Box from "@/Components/UI/Box.vue";
import BuddyMainInfo from "@/Components/BuddyMainInfo.vue";
import BuddySecondaryInfo from "@/Components/BuddySecondaryInfo.vue";
import Pagination from "@/Components/UI/Pagination.vue";
import Search from "@/Components/UI/Search.vue";

defineProps({
    buddies: Object,
    filter: Object,
})
</script>
