<script setup lang="ts">
  import TaskForm from '../layout/TaskForm.vue';
  import Toast from '../ui/Toast.vue';

  import { ref, reactive } from 'vue';

  import { useRoute } from 'vue-router';

  const tasks = ref<any[]>([]);
  const task = ref<any>(null);

  // Pega a ID da tarefa da URL
  const route = useRoute();
  const taskId = route.params.id;

  const toastProps = reactive({
    type: '' as string,
    message: '' as string
  });

  const toastRef = ref<InstanceType<typeof Toast> | null>(null); // Instancia o Toast

  const breadcrumbLinks = [
    {
      url: '/' as string,
      label: 'Início' as string
    },
    {
      url: `/task/${taskId}` as string,
      label: 'Tarefa' as string
    },
    {
      url: `/task/${taskId}/edit` as string,
      label: 'Editar tarefa' as string
    }
  ];

  function handleUpdate(task: any) {
    tasks.value = tasks.value.map((t: any) => t.id == task.id ? task : t);
    localStorage.setItem('tasks', JSON.stringify(tasks.value));
    
    showToast();
    
    loadTask();
  }

  function showToast() { 
    toastProps.type = 'success';
    toastProps.message = 'Tarefa alterada com sucesso!';

    toastRef.value?.showToast(toastProps);
  }

  function loadTask() {
    const saved = localStorage.getItem('tasks');
    tasks.value = saved ? JSON.parse(saved) : [];

    task.value = tasks.value.find((t: any) => t.id == taskId) || null;
  }

  loadTask();
  
</script>

<template>
  <div>
    <Toast ref="toastRef" />

    <TaskForm 
      @submit="handleUpdate"
      :title="'Editar tarefa'"
      :description="'Insira abaixo os detalhes da tarefa que deseja editar'"
      :breadcrumbLinks="breadcrumbLinks" 
      :buttonText="'Salvar edição'"
    />
  </div>
</template>