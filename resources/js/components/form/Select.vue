<script setup lang="ts">
  import { PropType } from 'vue';

  interface Option {
    value: string;
    label: string;
  }

  defineProps({
    id: {
      type: String as PropType<string>,
      required: true
    },
    options: {
      type: Array as PropType<Array<Option>>,
      required: true
    }
  })
</script>

<template>
  <select 
    :id="id" 
    class="border border-slate-200 focus:border-sky-500 focus:ring-1 focus:ring-sky-300/50 outline-none block w-full rounded-md py-1.5 px-2 sm:text-sm sm:leading-6"
  >
    <option v-for="option in options" :key="option.value">
      {{ option.label }}
    </option>
  </select>
</template>

<script lang="ts">
  export default {
    name: 'Select'
  }
</script>