<script setup lang="ts">
  import Header from '../ui/Header.vue';

  import PriorityIndicator from '../components/PriorityIndicator.vue';
  import TaskButtonGroup from '../components/TaskButtonGroup.vue';

  import { useRoute } from 'vue-router';

  import { defineEmits } from 'vue';

  const emit = defineEmits(['toggleFavorite', 'handleDeleteTask']);
  
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

      <div class="grid gap-4 p-8 border-t border-t-1 border-t-slate-200 relative">
        <TaskButtonGroup 
          :task="task[0]" 
          @handle-delete-task="emit('handleDeleteTask', task[0].id)" 
          @toggle-favorite="emit('toggleFavorite', task[0].id)"
          class="absolute top-8 right-8"
        />

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
            {{ task[0].deadline.split('T')[0].split('-').reverse().join('/') }}
          </span>
        </div>

        <div class="grid gap-1">
          <span class="text-slate-400 text-xs">
            Prioridade
          </span>

          <span class="flex items-start gap-2">
            <PriorityIndicator :priority="task[0].priority" />

            <span v-if="task[0].priority === 'high'">
              Alta
            </span>

            <span v-else-if="task[0].priority === 'medium'">
              Média
            </span>

            <span v-else>
              Baixa
            </span>
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
            {{ task[0].created_at ? task[0].created_at.split('T')[0].split('-').reverse().join('/') : '' }}
          </span>
        </div>
      </div>
    </section>

    <p v-else class="text-slate-400 size-full grid place-content-center">
      A tarefa selecionada não pôde ser encontrada.
    </p>

  </div>
</template>