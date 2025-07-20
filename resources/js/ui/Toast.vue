<script setup lang="ts">
  import { ref } from 'vue';

  const show = ref(false);
  const type = ref('');
  const message = ref('');  

  function showToast(toastProps: any) {
    type.value = toastProps.type || 'success';
    message.value = toastProps.message;
    show.value = true;

    setTimeout(() => {
      show.value = false; // Define a visibilidade como false
    }, 3000);
  }
  
  // Expõe função para ser usada de fora do componente
  defineExpose({ showToast });

</script>

<template>
  <div
    v-if="show"
    class="fixed bottom-4 right-4 z-50 flex gap-4 items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow overflow-hidden after:content-[''] after:absolute after:top-0 after:left-0 after:h-full after:w-1"
    :class="[
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