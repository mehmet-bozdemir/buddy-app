<script setup>
import {Link} from '@inertiajs/vue3';
import Box from '@/Components/UI/Box.vue';
import BuddyMainInfo from '@/Components/BuddyMainInfo.vue';
import BuddySecondaryInfo from '@/Components/BuddySecondaryInfo.vue';
import Pagination from '@/Components/UI/Pagination.vue';
import Search from '@/Components/UI/Search.vue';
import {computed, ref} from "vue";

defineProps({
    buddies: Object,
    filter: Object,
})

</script>

<template>
  <Search :filter="filter" />
  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
    <Box v-for="buddy in buddies.data" :key="buddy.id">
      <div class="flex flex-col">
<!--        <div class="flex justify-center items-center">-->
<!--          <div v-if="buddy.images[0]">-->
<!--            <img-->
<!--              v-for="image in buddy.images.slice(0, 1)"-->
<!--              :key="image.id"-->
<!--              :src="image.src"-->
<!--              class="rounded-full h-24 w-24"-->
<!--            />-->
<!--          </div>-->
<!--          <div v-else class="h-24 w-24 border border-yellow-400 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600 flex items-center justify-center">-->
<!--            <svg class="h-24 w-24 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg>-->
<!--          </div>-->
<!--        </div>-->
        <div>
          <Link :href="route('buddy.show', buddy.id)">
            <BuddyMainInfo :buddy="buddy" class="text-2xl font-bold" />
            <BuddySecondaryInfo :buddy="buddy" class="text-lg" />
          </Link>
          <div>
          <div class="flex flex-row justify-end gap-2">
              <Link :href="route('buddy.edit', buddy.id)">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                  </svg>
              </Link>
              <Link :href="route('buddy.destroy', buddy.id)" method="delete" as="button">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                  </svg>
              </Link>
          </div>

          </div>
        </div>
      </div>
    </Box>
  </div>

  <div v-if="buddies.data.length" class="w-full flex justify-center mt-8 mb-8">
    <Pagination :links="buddies.links" />
  </div>
</template>

