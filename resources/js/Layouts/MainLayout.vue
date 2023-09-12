<template>
  <Link href="/buddy">Buddies</Link>&nbsp;
  <Link href="/buddy/create">New Buddy</Link>
  <div v-if="flashSuccess" class="mb-4 px-2 border rounded-md shadow-sm border-green-200 bg-green-50">
    {{ flashSuccess }}
  </div>
  <slot />
</template>

<script setup>
import {Link, usePage} from '@inertiajs/vue3'
import {computed} from 'vue'

const page = usePage()
const flashSuccess = computed(
  () => page.props.flash.success,
)
</script>
