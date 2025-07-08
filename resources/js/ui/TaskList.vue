<script setup lang="ts">
  import Task from '../components/Task.vue';

  import { ref, watch, onMounted, defineEmits, PropType } from 'vue';

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

  const { filter} = defineProps({
    filter: String as PropType<string>,
  });

  function handleTaskDone(id: number) {
    const tasks = JSON.parse(localStorage.getItem('tasks') || '[]');
    const task = tasks.find((task: any) => task.id === id);
    task.done = !task.done;
    
    localStorage.setItem('tasks', JSON.stringify(tasks));

    const toasMessage = task.done ? 'Tarefa concluída com sucesso!' : 'Tarefa marcada como pendente!';
    
    emit('showToast', { type: 'success', message: toasMessage });

    loadTasks(filter);
  }

  function handleFavoriteTask(id: number) {
    const tasks = JSON.parse(localStorage.getItem('tasks') || '[]');
    const task = tasks.find((task: any) => task.id === id);
    task.favorite = !task.favorite;

    localStorage.setItem('tasks', JSON.stringify(tasks));
    
    loadTasks(filter);
  }

  function handleDeleteTasks(id: number) {
    const tasks = JSON.parse(localStorage.getItem('tasks') || '[]');
    const taskIndex = tasks.findIndex((task: any) => task.id === id);
    tasks.splice(taskIndex, 1);

    localStorage.setItem('tasks', JSON.stringify(tasks));

    loadTasks(filter);
  }

  // watch(
  //   tasks,
  //   () => localStorage.setItem('tasks', JSON.stringify(tasks.value)),
  //   { deep: true }
  // );

  function loadTasks(filter?: string) {
    const tasksList = JSON.parse(localStorage.getItem('tasks') || '[]');

    if(!tasksList) return;

    if(filter) {
      const today = new Date().toISOString().split('T')[0];
      
      switch(filter) {
        case 'today':
          tasks.value = tasksList.filter((task: any) => task.deadline === today);
          break;
        case 'next':
          tasks.value = tasksList.filter((task: any) => task.deadline > today);
          break;
        case 'done':
          tasks.value = tasksList.filter((task: any) => task.done);
          break;
        case 'favorite':
          tasks.value = tasksList.filter((task: any) => task.favorite);
          break;
        default:
          tasks.value = tasksList;
          break;
      }
    }
    else tasks.value = tasksList;
  }

  onMounted(() => {
    loadTasks(filter);
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