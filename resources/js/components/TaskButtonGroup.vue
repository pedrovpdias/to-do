<script setup lang="ts">
  import FavoriteTaskButton from './FavoriteTaskButton.vue';
  import TaskButton from './TaskButton.vue';

  import { defineEmits } from 'vue';

  import { useRouter } from 'vue-router';

  const emit = defineEmits(['toggleFavorite', 'handleDeleteTask']);

  const router = useRouter();

  defineProps({
    task: {
      type: Object,
      required: true
    }
  });

  function handleDeleteTask(id: number) {
    emit('handleDeleteTask', id);
  }

  function editTask(id: number) {
    router.push(`/task/${id}/edit`);
  }
</script>

<template>
  <div class="ml-auto flex gap-2">
    <FavoriteTaskButton :favorite="task.favorite" :id="task.id" @toggle-favorite="emit('toggleFavorite', task.id)" />

    <TaskButton @click="() => editTask(task.id)" :icon="'bi bi-pencil'" />

    <TaskButton @click="() => handleDeleteTask(task.id)" :icon="'bi bi-trash'" />
  </div>
</template>

<script lang="ts">
  export default {
    name: 'TaskButtonGroup'
  }
</script>