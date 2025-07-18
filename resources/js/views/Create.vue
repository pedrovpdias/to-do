<script setup lang="ts">
  import TaskForm from '../layout/TaskForm.vue';

  import { ref } from 'vue';

  const favorite = ref(false);
  
  // import { useTemplateRef } from 'vue';
  import { useRouter } from 'vue-router';

  const router = useRouter();

  // const advancedOptions = useTemplateRef<HTMLDivElement>('advanced-options'); // Referencia do elemento de opções avançadas

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

  const priorityOptions = [
    {
      label: 'Alta' as string,
      value: 'high' as string
    },
    {
      label: 'Media' as string,
      value: 'medium' as string
    },
    {
      label: 'Baixa' as string,
      value: 'low' as string
    }
  ];

  const categoryOptions = [
    {
      label: 'Trabalho' as string,
      value: '1' as string
    },
    {
      label: 'Pessoal' as string,
      value: '2' as string
    },
    {
      label: 'Estudos' as string,
      value: '3' as string
    }
  ];

  // const recurrenceOptions = [
  //   {
  //     label: '--' as string,
  //     value: '0' as string
  //   },
  //   {
  //     label: 'Diariamente' as string,
  //     value: '1' as string
  //   },
  //   {
  //     label: 'Semanalmente' as string,
  //     value: '2' as string
  //   },
  //   {
  //     label: 'Mensalmente' as string,
  //     value: '3' as string
  //   },
  //   {
  //     label: 'Anualmente' as string,
  //     value: '4' as string
  //   }
  // ]

  // Salva a tarefa no local storage
  function handleTaskCreation(task: any) {
    // Busca as tarefas salvas no local storage
    const tasks = JSON.parse(localStorage.getItem('tasks') || '[]');

    // Adiciona a nova tarefa ao array de tarefas
    tasks.push(task);

    // Salva as tarefas atualizadas no local storage
    localStorage.setItem('tasks', JSON.stringify(tasks));

    // Redireciona para a tela inicial
    router.push({
      path: '/',
      query: {
        toasType: 'success',
        toasMessage: 'Tarefa criada com sucesso!'
      }
    });

  }

  function toggleFavorite() {
    favorite.value = !favorite.value;
  }
</script>

<template>
  <TaskForm 
    @submit="handleTaskCreation"
    :title="'Nova tarefa'"
    :description="'Insira abaixo os detalhes da tarefa que deseja criar'"
    :breadcrumbLinks="breadcrumbLinks" 
    :buttonText="'Criar tarefa'"
  />
</template>