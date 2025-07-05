<script setup lang="ts">
  import Task from '../components/Task.vue';

  const tasks = JSON.parse(localStorage.getItem('tasks') || '[]');
</script>

<template>
  <ul
    v-if="tasks.length > 0"
    aria-labelledby="tasks-title"
    role="list" 
    class="divide-y divide-slate-100 grid px-4"
  >
    <Task v-for="task in tasks" :key="task.id" :task="task" />
  </ul>

  <p v-else class="text-slate-400 size-full grid place-content-center">Nenhuma tarefa encontrada.</p>
</template>

<script lang="ts">
  export default {
    name: 'TaskList'
  }
</script>