<template>
  <div v-for="buddy in buddies" :key="buddy.id">
    <Link :href="route('buddy.show', buddy.id)">{{ buddy.name }} {{ buddy.surname }}, {{ buddy.age }}, {{ buddy.birth_place }}</Link>
    <div>
      <Link :href="route('buddy.edit', buddy.id)">Edit</Link>&nbsp;
      <Link :href="route('buddy.destroy', buddy.id)" method="delete" as="button">Delete</Link>
    </div>
  </div>
</template>

<script setup>
import {Link} from '@inertiajs/vue3'

defineProps({
  buddies: Array,
})
</script>
