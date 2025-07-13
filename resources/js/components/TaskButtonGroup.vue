<script setup lang="ts">
  import FavoriteTaskButton from './FavoriteTaskButton.vue';
  import TaskButton from './TaskButton.vue';

  import { defineEmits, PropType } from 'vue';

  import { useRouter } from 'vue-router';

  const emit = defineEmits(['toggleFavorite', 'loadTasks']);

  const router = useRouter();

  const { task, filter } = defineProps({
    task: {
      type: Object,
      required: true
    },
    filter: String as PropType<string>,
  });
  
  function handleFavoriteTask(id: number) {
    const tasks = JSON.parse(localStorage.getItem('tasks') || '[]');
    const task = tasks.find((task: any) => task.id === id);
    task.favorite = !task.favorite;    

    localStorage.setItem('tasks', JSON.stringify(tasks));

    loadTasks(filter);
  }

  function handleDeleteTask(id: number) {
    const tasks = JSON.parse(localStorage.getItem('tasks') || '[]');
    const taskIndex = tasks.findIndex((task: any) => task.id === id);
    tasks.splice(taskIndex, 1);

    localStorage.setItem('tasks', JSON.stringify(tasks));

    loadTasks(filter);
  }

  function loadTasks(filter?: string) {
    emit('loadTasks', filter);
  }

  function editTask(id: number) {
    router.push(`/task/${id}/edit`);
  }
</script>

<template>
  <div class="ml-auto flex gap-2">
    <FavoriteTaskButton :favorite="task.favorite" :id="task.id" @toggle-favorite="handleFavoriteTask(task.id)" />

    <TaskButton @click="() => editTask(task.id)" :icon="'bi bi-pencil'" />

    <TaskButton @click="handleDeleteTask(task.id)" :icon="'bi bi-trash'" />
  </div>
</template>

<script lang="ts">
  export default {
    name: 'TaskButtonGroup'
  }
</script>