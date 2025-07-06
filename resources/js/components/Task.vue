<script setup lang="ts">
  import { defineEmits } from 'vue';

  defineProps({
    task: {
      type: Object,
      required: true
    }
  });

  const emit = defineEmits(['toggleTaskDone']);

  function toggleTaskDone(id: number) {
    emit('toggleTaskDone', id);
  }  
  
</script>

<template>
  <li class="py-4">
    <div 
      class="flex items-center gap-8 p-4 border border-slate-100 shadow-lg hover:border-sky-200 transition-colors rounded-lg"
    >
      <button 
        class="size-10 aspect-square grid place-content-center rounded-full border-2 text-3xl text-center text-white"
        :class="[ task.done 
          ? 'bg-sky-500 border-sky-500' 
          : 'border-slate-200 text-slate-200 hover:border-slate-300 hover:text-slate-300 active:border-sky-500 active:text-sky-500' ]"
        @click="toggleTaskDone(task.id)"
      >
        <i class="bi bi-check"></i>
      </button>
    
      <div class="flex flex-col gap-1">
        <span class="font-bold flex items-center gap-2">
          <span class="text-red-500 text-4xl">
            <i class="bi bi-dot"></i>
          </span>

          {{ task.title }}
        </span>

        <span class="font-light">
          {{ task.description }}
        </span>
      </div>

      <div class="ml-auto flex gap-2">
        <button class="size-10 aspect-square grid place-content-center rounded-full bg-sky-50 text-sky-500">
          <i class="bi bi-star"></i>
        </button>

        <button class="size-10 aspect-square grid place-content-center rounded-full bg-sky-50 text-sky-500">
          <i class="bi bi-pencil"></i>
        </button>

        <button class="size-10 aspect-square grid place-content-center rounded-full bg-sky-50 text-sky-500">
          <i class="bi bi-trash"></i>
        </button>
      </div>
    </div>
  </li>
</template>

<script lang="ts">
  export default {
    name: 'Task'
  }
</script>