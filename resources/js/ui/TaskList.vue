<script setup lang="ts">
  import Task from '../components/Task.vue';

  import { ref, watch, onMounted, defineEmits } from 'vue';

  interface Task {
    id: number;
    title: string;
    description: string;
    deadline: string;
    priority: string;
    category: string;
    done: boolean;
    favorite: boolean;
  }

  const tasks = ref<Task[]>([]);

  const emit = defineEmits(['showToast']);

  function handleTaskDone(id: number) {
    const tasks = JSON.parse(localStorage.getItem('tasks') || '[]');
    const task = tasks.find((task: any) => task.id === id);
    task.done = !task.done;
    
    localStorage.setItem('tasks', JSON.stringify(tasks));

    const toasMessage = task.done ? 'Tarefa concluída com sucesso!' : 'Tarefa marcada como pendente!';
    
    emit('showToast', { type: 'success', message: toasMessage });

    loadTasks();
  }

  function handleFavoriteTask(id: number) {
    const tasks = JSON.parse(localStorage.getItem('tasks') || '[]');
    const task = tasks.find((task: any) => task.id === id);
    task.favorite = !task.favorite;

    localStorage.setItem('tasks', JSON.stringify(tasks));

    loadTasks();
  }

  function handleDeleteTasks(id: number) {
    const tasks = JSON.parse(localStorage.getItem('tasks') || '[]');
    const taskIndex = tasks.findIndex((task: any) => task.id === id);
    tasks.splice(taskIndex, 1);

    localStorage.setItem('tasks', JSON.stringify(tasks));

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
    <Task 
      v-for="task in tasks" 
      :key="task.id" 
      :task="task" 
      @toggle-task-done="handleTaskDone" 
      @toggle-favorite="handleFavoriteTask"
      @handle-delete-task="handleDeleteTasks"
    />
  </ul>

  <p v-else class="text-slate-400 size-full grid place-content-center">Nenhuma tarefa encontrada.</p>
</template>

<script lang="ts">
  export default {
    name: 'TaskList'
  }
</script>