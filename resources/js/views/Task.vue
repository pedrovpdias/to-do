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
      url: '/' as string,
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

          <span class="font-bebas text-4xl text-sky-500 w-fit max-w-xl">
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

          <span class="flex items-center gap-4">
            {{ task[0].deadline ? task[0].deadline.split('T')[0].split('-').reverse().join('/') : '' }}

            <span
              v-if="task[0].deadline < new Date().toISOString().split('T')[0] && !task[0].done"
              class="text-xs flex items-center gap-2  px-2 py-1 rounded-full"
              :class="[
                task[0].priority === 'high' ? 'text-red-500 bg-red-100' : 'text-slate-400 bg-slate-100'
              ]"
            >
              <i 
                class="bi"
                :class="[
                  task[0].priority === 'high' ? 'bi-exclamation-triangle' : 'bi-info-circle'
                ]"
              ></i>

              Expirada
            </span>
          </span>
        </div>

        <div class="grid gap-1">
          <span class="text-slate-400 text-xs">
            Prioridade
          </span>

          <span class="flex items-center gap-2">
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
            Categoria
          </span>

          <span v-if="task[0].category === '1'" class="flex items-center gap-2">
            <i class="bi bi-briefcase-fill opacity-50"></i>

            Trabalho          
          </span>

          <span v-else-if="task[0].category === '2'" class="flex items-center gap-2">
            <i class="bi bi-people-fill opacity-50"></i>

            Pessoal  
          </span>

          <span v-else class="flex items-center gap-2">
            <i class="bi bi-mortarboard-fill opacity-50"></i>

            Estudos
          </span>
        </div>

        <div class="grid gap-1">
          <span class="text-slate-400 text-xs">
            Status
          </span>

          <span class="flex items-center gap-2">
            <span v-if="task[0].done" class="text-sky-500 text-sm">
              <i class="bi bi-check-circle-fill"></i>
            </span>

            {{ task[0].done ? 'Concluída' : 'Pendente' }}
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