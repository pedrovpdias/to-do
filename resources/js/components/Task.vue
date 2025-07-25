<script setup lang="ts">
  import PriorityIndicator from './PriorityIndicator.vue';
  import TaskButtonGroup from './TaskButtonGroup.vue';

  import { defineEmits, PropType } from 'vue';

  defineProps({
    task: {
      type: Object,
      required: true
    },
    filter: String as PropType<string>,
  });

  const emit = defineEmits(['toggleTaskDone', 'loadTasks']);

  function loadTasks(filter?: string) {
    emit('loadTasks', filter);
  }

  function toggleTaskDone(id: number) {
    emit('toggleTaskDone', id);
  }

</script>

<template>
  <li class="py-4">
    <div 
      class="flex items-center gap-8 p-4 outline outline-1 outline-transparent hover:outline-sky-300 transition-colors rounded-lg"
    >
      <button 
        class="size-10 aspect-square grid place-content-center rounded-full border-2 text-3xl text-center text-white"
        :class="[ 
          task.done 
          ? 'bg-sky-500 border-sky-500' 
          : 'border-slate-200 text-slate-200 hover:border-slate-300 hover:text-slate-300 active:border-sky-500 active:text-sky-500' ]"
        @click="toggleTaskDone(task.id)"
      >
        <i class="bi bi-check"></i>
      </button>
    
      <div class="flex flex-col gap-1">
        <router-link 
          :to="`/task/${task.id}`" 
          class="font-bold flex items-center gap-4 group w-fit"
        >
          <span class="line-clamp-1 hover:line-clamp-none group-hover:text-slate-400 transition-colors">
            {{ task.title }}
          </span>

          <PriorityIndicator :priority="task.priority" />
        </router-link>

        <span class="font-light text-xs min-h-12 line-clamp-3 text-slate-500">
          {{ task.description }}
        </span>
      </div>

      <TaskButtonGroup 
        :task="task" 
        :filter="filter"
        @load-tasks="loadTasks(filter);" 
      />
    </div>
  </li>
</template>

<script lang="ts">
  export default {
    name: 'Task'
  }
</script>