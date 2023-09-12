<template>
    <div>
        <span>{{buddy.name}} {{buddy.surname}} <span class="text-gray-400 p-2">|</span> {{buddy.age}}</span>
    </div>
</template>

<script setup>
defineProps({
    buddy: Object
})

</script>
