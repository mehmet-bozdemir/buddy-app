<template>
  <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
      <Box class=" md:col-span-7 flex items-center w-full">
          <div class="w-full text-center">Image</div>
      </Box>
      <Box class="md:col-span-5">
          <BuddyMainInfo :buddy="buddy" class="text-2xl font-bold"/>
          <BuddySecondaryInfo :buddy="buddy" class="text-lg"/>
      </Box>
  </div>
</template>

<script setup>
import BuddyMainInfo from "@/Components/BuddyMainInfo.vue";
import BuddySecondaryInfo from "@/Components/BuddySecondaryInfo.vue";
import Box from "@/Components/UI/Box.vue";

defineProps({
  buddy: Object,
})
</script>
