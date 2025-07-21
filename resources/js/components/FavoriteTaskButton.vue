<script setup lang="ts">
  import { PropType } from 'vue';

  const emit = defineEmits(['toggleFavorite']);

  defineProps({
    id: {
      type: Number as PropType<number>,
      required: true
    },
    favorite: {
      type: Boolean as PropType<boolean>,
      required: true
    }
  });

  function toggleFavorite(id: number) {
    emit('toggleFavorite', id);
  }
</script>

<template>
  <button 
    class="size-10 aspect-square grid place-content-center rounded-full  transition-colors hover:cursor-pointer"
    :class="[ favorite ? 'bg-yellow-50 text-yellow-500 hover:bg-yellow-100 active:bg-yellow-200' : 'bg-sky-50 text-sky-500 hover:bg-sky-100 active:bg-sky-200' ]"
    @click="toggleFavorite(id)"
  >
    <i v-if="favorite" class="bi bi-star-fill"></i>
    <i v-else class="bi bi-star"></i>
  </button>
</template>

<script lang="ts">
  export default {
    name: 'FavoriteTaskButton'
  }
</script>