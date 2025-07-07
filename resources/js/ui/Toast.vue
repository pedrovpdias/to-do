<script lang="ts" setup>
  import { PropType, ref, watch, nextTick } from 'vue';

  const toast = ref();

  const { type, message } = defineProps({
    type: {
      type: String as PropType<string>,
      required: true
    },
    message: {
      type: String as PropType<string>,
      required: true
    }
  });
  
  const show = ref(false);

  watch(
    () => [type, message],
    async([newType, newMessage]) => {
      if(newType && newMessage) {
        show.value = true;

        await nextTick();
        setTimeout(() => show.value = false, 5000);
      }
    },
    { immediate: true }
  );
    
</script>

<template>
  <div
    ref="toast"
    class="bottom-4 right-4 z-50 flex gap-4 items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow overflow-hidden after:content-[''] after:absolute after:top-0 after:left-0 after:h-full after:w-1"
    :class="[
      show ? 'fixed' : 'hidden', 
      type === 'success' ? 'after:bg-emerald-500' : '',
      type === 'error' ? 'after:bg-red-500' : '',
      type === 'warning' ? 'after:bg-yellow-500' : ''
    ]"
  >
    <span 
      class="text-lg"
      :class="[ 
        type === 'success' ? 'text-emerald-500' : '', 
        type === 'error' ? 'text-red-500' : '',
        type === 'warning' ? 'text-yellow-500' : ''
      ]"
    >
      <i v-if="type === 'success'" class="bi bi-check-circle"></i>

      <i v-else-if="type === 'error'" class="bi bi-x-circle"></i>

      <i v-else class="bi bi-exclamation-triangle"></i>
    </span>

    <p class="text-sm">
      {{ message }}
    </p>
  </div>
</template>

<script lang="ts">
  export default {
    name: 'Toast'
  }
</script>