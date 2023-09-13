<script setup>
import {Link} from '@inertiajs/vue3'
defineProps({
  links: Array,
})
</script>

<template>
  <div class="flex gp-1">
    <Link
      v-for="(link, index) in links"
      :key="index" class="py-2 px-4 rounded-md"
      :href="link.url"
      :class="{'bg-yellow-500 dark:bg-yellow-300 text-gray-100' : link.active }"
      v-html="link.label"
    />
  </div>
</template>
