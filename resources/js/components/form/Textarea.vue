<script setup lang="ts">
  import { PropType } from 'vue';

  defineProps({
    id: {
      type: String as PropType<string>,
      required: true
    },
    textareaRef: {
      type: String as PropType<string>,
      required: true
    },
    placeholder: {
      type: String as PropType<string | null>,
      required: false
    }
  })
</script>

<template>
  <textarea 
    :id="id" 
    :ref="textareaRef"
    class="border border-slate-200 focus:border-sky-500 focus:ring-1 focus:ring-sky-300/50 outline-none block w-full rounded-md py-1.5 px-2 sm:text-sm sm:leading-6 placeholder:text-slate-400"
    :placeholder="placeholder || ''"
  />
</template>

<script lang="ts">
  export default {
    name: 'Textarea'
  }
</script>