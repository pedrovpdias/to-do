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

      <div class="grid gap-2 p-8">
        <div class="grid gap-1">
          <span class="text-slate-400 text-xs">
            Tarefa
          </span>

          <span>
            {{ task[0].title }}
          </span>
        </div>

        <div class="grid gap-1">
          <span class="text-slate-400 text-xs">
            Descrição
          </span>

          <span>
            {{ task[0].description }}
          </span>
        </div>

        <div class="grid gap-1">
          <span class="text-slate-400 text-xs">
            Prazo para conclusão
          </span>

          <span>
            {{ task[0].deadline }}
          </span>
        </div>

        <div class="grid gap-1">
          <span class="text-slate-400 text-xs">
            Prioridade
          </span>

          <span>
            {{ task[0].priority }}
          </span>
        </div>

        <div class="grid gap-1">
          <span class="text-slate-400 text-xs">
            Status
          </span>

          <span>
            {{ task[0].done ? 'Concluida' : 'Pendente' }}
          </span>
        </div>

        <div class="grid gap-1">
          <span class="text-slate-400 text-xs">
            Criada em
          </span>

          <span>
            {{ task[0].created_at }}
          </span>
        </div>
      </div>
    </section>

    <p v-else class="text-slate-400 size-full grid place-content-center">
      A tarefa selecionada não pôde ser encontrada.
    </p>

  </div>
</template>