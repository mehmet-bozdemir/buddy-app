<template>
    <div class="flex flex-col justify-center items-center">
        <div class="flex flex-row justify-center items-center">
            <label class=" text-gray-400 text-xs border border-yellow-600 p-px rounded m-px">City</label>
            <span>{{ buddy.birth_place }}</span>
        </div>
        <div class="flex flex-row justify-center items-center">
            <label class="text-gray-400 text-xs border border-yellow-600 p-px rounded m-px">Language</label>
            <span>{{buddy.mother_tongue}}</span>
        </div>
    </div>
</template>

<script setup>
defineProps({
  buddy: Object,
})

</script>
