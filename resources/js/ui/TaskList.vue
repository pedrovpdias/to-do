<script setup lang="ts">
  import Task from '../components/Task.vue';

  import { ref, watch, onMounted } from 'vue';

  const tasks = ref([]);

  function handleTaskDone(id: number) {
    const tasks = JSON.parse(localStorage.getItem('tasks') || '[]');
    const task = tasks.find((task: any) => task.id === id);
    task.done = !task.done;
    
    localStorage.setItem('tasks', JSON.stringify(tasks));
    alert('Tarefa marcada como ' + (task.done ? 'concluida' : 'pendente'));

    loadTasks();
  }

  watch(
    tasks,
    () => localStorage.setItem('tasks', JSON.stringify(tasks.value)),
    { deep: true }
  );

  function loadTasks() {
    tasks.value = JSON.parse(localStorage.getItem('tasks') || '[]');
  }

  onMounted(() => {
    loadTasks();
  })

</script>

<template>
  <ul
    v-if="tasks.length > 0"
    aria-labelledby="tasks-title"
    role="list" 
    class="divide-y divide-slate-100 grid px-4"
  >
    <Task v-for="task in tasks" :key="task.id" :task="task" @toggle-task-done="handleTaskDone" />
  </ul>

  <p v-else class="text-slate-400 size-full grid place-content-center">Nenhuma tarefa encontrada.</p>
</template>

<script lang="ts">
  export default {
    name: 'TaskList'
  }
</script>