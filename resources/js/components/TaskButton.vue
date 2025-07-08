<script setup lang="ts">
  import { PropType } from 'vue';

  defineProps({
    icon: {
      type: String as PropType<string>,
      required: true
    }
  })

</script>

<template>
  <button
    class="size-10 aspect-square grid place-content-center rounded-full bg-sky-50 text-sky-500 hover:bg-sky-100 transition-colors active:bg-sky-200 hover:cursor-pointer"
  >
    <i :class="icon"></i>
  </button>
</template>

<script lang="ts">
  export default {
    name: 'TaskButton'
  }
</script>