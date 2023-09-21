<script setup>
import BuddyMainInfo from '@/Components/BuddyMainInfo.vue'
import BuddySecondaryInfo from '@/Components/BuddySecondaryInfo.vue'
import Box from '@/Components/UI/Box.vue'
import {Link} from '@inertiajs/vue3'
import route from 'ziggy-js/src/js/index.js'

defineProps({
    buddy: Object,
})
</script>

<template>
  <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
    <Box class=" md:col-span-7 flex items-center w-full">
      <div v-if="buddy.images.length" class="grid grid-cols-1 mx-auto lg:grid-cols-2 gap-1">
        <div v-for="image in buddy.images" :key="image.id" class="relative">
          <img :src="image.src" class="object-cover h-96 w-96" />
          <div class="absolute bottom-0 right-0">
            <Link
              :href="route('buddy.image.destroy', {buddy: buddy.id, image: image.id})"
              method="delete"
              as="button"
            >
              <button class="p-2 bg-yellow-500 rounded-full text-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
              </button>
            </Link>
          </div>
        </div>
      </div>
      <div v-else class="w-full text-center">No Image</div>
    </Box>
    <Box class="md:col-span-5">
      <BuddyMainInfo :buddy="buddy" class="text-2xl font-bold" />
      <BuddySecondaryInfo :buddy="buddy" class="text-lg" />
    </Box>
  </div>
  <div class="text-lg font-medium flex justify-end mt-4">
    <Link :href="route('buddy.image.create', {buddy: buddy.id})" class="btn-primary">+ Image</Link>
  </div>
</template>

