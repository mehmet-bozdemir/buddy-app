<script setup>
import {getSign} from 'horoscope';
import {computed, reactive, ref} from "vue";

const props = defineProps({
    buddy: Object,
})

const zodiacSign = ref()
const zodiacs = reactive(
    [
        {
            name: 'pisces',
            url: '/Pisces-1.png',
        },
        {
            name: 'capricorn',
            url: '/Capricorn-1.png',
        },
        {
            name: 'aquarius',
            url: '/Aquarius-1.png',
        },
        {
            name: 'virgo',
            url: '/Virgo-1.png',
        },
        {
            name: 'aries',
            url: '/Aries-1.png',
        },
        {
            name: 'cancer',
            url: '/Cancer-1.png',
        },
        {
            name: 'gemini',
            url: '/Gemini-1.png',
        },
        {
            name: 'libra',
            url: '/Libra-1.png',
        },
        {
            name: 'leo',
            url: '/Leo-1.png',
        },
        {
            name: 'sagittarius',
            url: '/Sagittarius-1.png',
        },
        {
            name: 'scorpio',
            url: '/Scorpio-1.png',
        },
        {
            name: 'taurus',
            url: '/Taurus-1.png',
        }
    ]
)

const zodiacUrl = computed(() => {
    const zodiac = zodiacs.filter(a => a.name === props.buddy.zodiac_name)
    return zodiac.map(a => a.url).toString()
})

const zodiacName = computed(() => {
    const birthday = ref(props.buddy.birthday)
    const d = new Date(birthday.value);
    const day = d.getDate();
    const month = d.getMonth()+1;
    return zodiacSign.value = getSign({month: month, day: day})
})

</script>

<template>
  <div class="flex flex-col justify-center items-center">
      <div class="flex justify-center items-center">
          <div v-if="zodiacUrl">
              <img
                  :src="zodiacUrl"
                  class="rounded-full h-24 w-24"
              />
          </div>
          <div v-else class="h-24 w-24 border border-yellow-400 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600 flex items-center justify-center">
              <svg class="h-24 w-24 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg>
          </div>
      </div>
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


