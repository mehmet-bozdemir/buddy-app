<template>
  <div class="flex flex-col justify-center items-center">
      <div class="flex flex-row justify-center items-center">
          <span>{{ buddy.name }} {{ buddy.surname }}</span>
      </div>
      <div class="flex flex-row justify-center items-center">
          <label class=" text-gray-400 text-xs border border-yellow-600 p-px rounded m-px">Age</label>
          <span>{{ buddy.age }}</span>
      </div>
      <div class="flex flex-row justify-center items-center">
          <label class="text-gray-400 text-xs border border-yellow-600 p-px rounded m-px">Zodiac Name</label>
          <span>{{zodiacName}}</span>
      </div>
  </div>
</template>

<script setup>
import {getSign} from 'horoscope';
import {computed, ref} from "vue";

const props = defineProps({
  buddy: Object,
})

const zodiacSign = ref()

const zodiacName = computed(() => {
    const birthday = ref(props.buddy.birthday)
    const d = new Date(birthday.value);
    const day = d.getDate();
    const month = d.getMonth()+1;

    zodiacSign.value = getSign({month: month, day: day})

    console.log(zodiacSign.value);

    return zodiacSign.value
})



// const month = ref()
// const day = ref()

// zodiacSign.value = getSign(month, day)

// console.log(getSign({month: month, day: day}))

</script>
