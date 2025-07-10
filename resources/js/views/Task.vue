<script setup lang="ts">
  import Header from '../ui/Header.vue';

  import { useRoute } from 'vue-router';
  

  // Pega a ID da tarefa da URL
  const route = useRoute();
  const taskId = route.params.id;

  const breadcrumbLinks = [
    {
      url: '' as string,
      label: 'Início' as string
    },
    {
      url: `/task/${taskId}` as string,
      label: 'Tarefa' as string
    }
  ];

  const tasks = localStorage.getItem(`tasks`) ? JSON.parse(localStorage.getItem(`tasks`) || '[]') : null;
  const task = tasks ? tasks.filter((task: any) => task.id == taskId) : null;
  

</script>

<template>
  <div>
    <Header :breadcrumbLinks="breadcrumbLinks" />

    <section v-if="task">
      <h2 id="task-title" class="sr-only">
        Tarefa
      </h2>

      
    </section>

    <p v-else class="text-slate-400 size-full grid place-content-center">
      A tarefa selecionada não pôde ser encontrada.
    </p>

  </div>
</template>