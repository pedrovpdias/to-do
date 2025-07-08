<script setup lang="ts">
  import { PropType } from 'vue';

  defineProps({
    priority: {
      type: String as PropType<string>,
      required: true
    }
  });
</script>

<template>
  <div class="text-sm">
    <span v-if="priority === 'high'" class="relative">
      <i class="bi bi-triangle-fill absolute animate-ping text-red-500"></i>
      <i class="bi bi-triangle-fill relative text-red-500"></i>
      <i class="bi bi-exclamation absolute text-white left-0 top-px"></i>
    </span>

    <span v-else-if="priority === 'medium'" class="relative">
      <i class="bi bi-triangle-fill relative text-yellow-500"></i>
      <i class="bi bi-exclamation absolute text-black left-0 top-px"></i>
    </span>

    <span v-else class="text-emerald-500">
      <i class="bi bi-info-circle"></i>
    </span>
  </div>
</template>

<script lang="ts">
  export default {
    name: 'PriorityIndicator'
  }
</script>