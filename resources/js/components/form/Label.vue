<script setup lang="ts">
  import { PropType } from 'vue';

  defineProps({
    htmlFor: {
      type: String as PropType<string>,
      required: true
    },
    text: {
      type: String as PropType<string>,
      required: true
    }
  })
</script>

<template>
  <label :for="htmlFor" class="block text-sm font-medium leading-6">
    {{ text }}
  </label>
</template>

<script lang="ts">
  export default {
    name: 'Label'
  }
</script>