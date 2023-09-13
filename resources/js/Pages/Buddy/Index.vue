<template>
  <Search :filter="filter" />
  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
    <Box v-for="buddy in buddies.data" :key="buddy.id">
      <div class="flex flex-col">
        <div class="flex justify-center items-center">
          <div v-if="buddy.images[0]">
            <img
              v-for="image in buddy.images.slice(0, 1)"
              :key="image.id"
              :src="image.src"
              class="rounded-full h-24 w-24"
            />
          </div>
          <div v-else class="h-24 w-24 border border-yellow-400 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600 flex items-center justify-center">
            <svg class="h-24 w-24 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg>
          </div>
          <!--                <div v-else class="rounded-full h-24 w-24 border border-yellow-400 flex items-center justify-center">-->
          <!--                </div>-->
        </div>
        <div>
          <Link :href="route('buddy.show', buddy.id)">
            <BuddyMainInfo :buddy="buddy" class="text-2xl font-bold" />
            <BuddySecondaryInfo :buddy="buddy" class="text-lg" />
          </Link>
          <div>
            <Link :href="route('buddy.edit', buddy.id)">Edit</Link>&nbsp;
            <Link :href="route('buddy.destroy', buddy.id)" method="delete" as="button">Delete</Link>
          </div>
        </div>
      </div>
    </Box>
  </div>

  <div v-if="buddies.data.length" class="w-full flex justify-center mt-8 mb-8">
    <Pagination :links="buddies.links" />
  </div>
</template>

<script setup>
import {Link} from '@inertiajs/vue3'
import Box from '@/Components/UI/Box.vue'
import BuddyMainInfo from '@/Components/BuddyMainInfo.vue'
import BuddySecondaryInfo from '@/Components/BuddySecondaryInfo.vue'
import Pagination from '@/Components/UI/Pagination.vue'
import Search from '@/Components/UI/Search.vue'

defineProps({
  buddies: Object,
  filter: Object,
})
</script>
