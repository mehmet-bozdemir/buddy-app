<template>
    <span>{{buddy.birth_place}}, {{buddy.mother_tongue}}</span>
</template>

<script setup>
defineProps({
    buddy: Object
})

</script>
