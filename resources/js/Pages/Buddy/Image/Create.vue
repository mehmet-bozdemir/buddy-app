<script setup>
import Box from '@/Components/UI/Box.vue'

import route from 'ziggy-js/src/js/index.js'
import {useForm} from '@inertiajs/vue3'
import {computed} from 'vue'


const props = defineProps({buddy:Object})

const form = useForm({
  images:[],
})

const canUpload = computed(()=> form.images.length)

const upload = () => {
  form.post(
    route('buddy.image.store', {buddy: props.buddy.id}), { onSuccess: () => form.reset('images')},
  )
}

const addFiles = (event) => {
  for (const image of event.target.files ) {
    form.images.push(image)
  }
}

const reset = () => form.reset('images')
</script>

<template>
  <Box>
    <form @submit.prevent="upload">
      <div class="flex justify-between items-center">
        <input
          class="border rounded-md file:px-4 file:py-2 border-yellow-400 file:text-gray-700 file:text-gray-100 file:border-0 file:bg-yellow-400  file:hover:bg-yellow-500 file:hover:cursor-pointer file:mr-4"
          type="file"
          multiple @input="addFiles"
        />
        <div class="flex justify-end gap-1">
          <button type="submit" class="btn-primary disabled:opacity-25 disabled:cursor-not-allowed" :disabled="!canUpload">Send</button>
          <button type="reset" class="btn-primary" @click="reset">Reset</button>
        </div>
      </div>
    </form>
  </Box>
</template>
