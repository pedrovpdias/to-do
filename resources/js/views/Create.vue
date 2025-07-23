<script setup lang="ts">
  import TaskForm from '../layout/TaskForm.vue';
  import Toast from '../ui/Toast.vue';

  import { ref, reactive } from 'vue';

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
      url: '/new' as string,
      label: 'Nova tarefa' as string
    }
  ];

  // Salva a tarefa no local storage
  function handleTaskCreation(task: any) {
    // Busca as tarefas salvas no local storage
    const tasks = JSON.parse(localStorage.getItem('tasks') || '[]');

    // Adiciona a nova tarefa ao array de tarefas
    tasks.push(task);

    // Salva as tarefas atualizadas no local storage
    localStorage.setItem('tasks', JSON.stringify(tasks));

    showToast();

    clearForm();

  }

  function showToast() { 
    toastProps.type = 'success';
    toastProps.message = 'Tarefa criada com sucesso!';

    toastRef.value?.showToast(toastProps);
  }

  function clearForm() {
    const form = document.querySelector('form') as HTMLFormElement;
    form.reset();
  }

</script>

<template>
  <div>
    <Toast ref="toastRef" />

    <TaskForm 
      @submit="handleTaskCreation"
      :title="'Nova tarefa'"
      :description="'Insira abaixo os detalhes da tarefa que deseja criar'"
      :breadcrumbLinks="breadcrumbLinks" 
      :buttonText="'Criar tarefa'"
    />
  </div>
</template>