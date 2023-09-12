<template>
  <div>
    {{ buddy.mother_tongue }}, {{ buddy.birth_place }}
  </div>
</template>

<script setup>
defineProps({
  buddy: Object,
})
</script>
