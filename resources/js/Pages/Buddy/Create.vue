<template>
  <form @submit.prevent="create">
    <div class="grid grid-cols-6 gap-4">
      <div class="col-span-3">
        <label class="label">Name</label>
        <input v-model="form.name" type="text" class="input" />
        <div v-if="form.errors.name" class="input-error">{{ form.errors.name }}</div>
      </div>

      <div class="col-span-3">
        <label class="label">Surname</label>
        <input v-model="form.surname" type="text" class="input" />
        <div v-if="form.errors.surname" class="input-error">{{ form.errors.surname }}</div>
      </div>

      <div class="col-span-6">
        <label class="label">Age</label>
        <input v-model.number="form.age" type="text" class="input" />
        <div v-if="form.errors.age" class="input-error">{{ form.errors.age }}</div>
      </div>

      <div class="col-span-3">
        <label class="label">City of Birth</label>
        <input v-model="form.birth_place" type="text" class="input" />
        <div v-if="form.errors.birth_place" class="input-error">{{ form.errors.birth_place }}</div>
      </div>

      <div class="col-span-3">
        <label class="label">Mother Tongue</label>
        <input v-model="form.mother_tongue" type="text" class="input" />
        <div v-if="form.errors.mother_tongue" class="input-error">{{ form.errors.mother_tongue }}</div>
      </div>

      <div class="col-span-6">
        <label class="label">Birthday</label>
        <input v-model="form.birthday" type="date" class="input" />
        <div v-if="form.errors.birthday" class="input-error">{{ form.errors.birthday }}</div>
      </div>
      <div class="col-span-6">
        <button type="submit" class="btn-primary">Create</button>
      </div>
    </div>
  </form>
</template>

<script setup>
import {useForm} from '@inertiajs/vue3'
import route from 'ziggy-js/src/js/index.js'


const form = useForm({
  name: null,
  surname: null,
  age: 0,
  birth_place: null,
  mother_tongue: null,
  birthday: null,
})

const create = () => form.post(route('buddy.store'))
</script>

<style scoped>
label {
    margin-right: 2em;
}
div {
    padding: 2px
}
</style>
