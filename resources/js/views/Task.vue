<script setup lang="ts">
  import Header from '../ui/Header.vue';
  import Toast from '../ui/Toast.vue';

  import PriorityIndicator from '../components/PriorityIndicator.vue';
  import TaskButtonGroup from '../components/TaskButtonGroup.vue';

  import { useRoute, useRouter } from 'vue-router';

  import { ref, onMounted, reactive } from 'vue';

  const emit = defineEmits(['toggleFavorite', 'handleDeleteTask']);

  const tasks = ref<any[]>([]);
  const task = ref<any>(null);
  const updateBanner = ref(false);
  const showUpdateBanner = ref(false);
  
  // Pega a ID da tarefa da URL
  const route = useRoute();
  const router = useRouter();
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

  const today = new Date().toISOString().split('T')[0];

  function loadTask(filter?: string) {
    const saved = localStorage.getItem('tasks');
    tasks.value = saved ? JSON.parse(saved) : [];

    task.value = tasks.value.find((t: any) => t.id == taskId) || null;

    if(!task.value) {
      router.push({
        path: '/',
        query: {
          toasType: 'success',
          toasMessage: 'Tarefa excluída com sucesso!'
        }
      });
    }
  }

  window.addEventListener('storage', (event) => {
    if (event.key === 'tasks') {
      const updatedTask = JSON.parse(localStorage.getItem('tasks') || '[]').find((t: any) => t.id == taskId) || null;

      if(updatedTask){
        if(  updatedTask.title === task.value.title && updatedTask.description === task.value.description && updatedTask.deadline === task.value.deadline && updatedTask.priority === task.value.priority && updatedTask.category === task.value.category && updatedTask.done === task.value.done && updatedTask.favorite === task.value.favorite) {
          return;
        }

        showUpdateBanner.value = true;
      }
      
      else return;
    }
  });

  loadTask();
  
  function formatDate(dateStr: string | undefined) {
    if (!dateStr || typeof dateStr !== 'string') return '';

    const [year, month, day] = dateStr.split('T')[0].split('-');
    return `${day}/${month}/${year}`;
  }

  function updateTask() {
    showUpdateBanner.value = false;
    loadTask();
  }

  onMounted(() => {
    if(!task.value) {
      router.push({
        path: '/',
        query: {
          toasType: 'error',
          toasMessage: 'Tarefa não encontrada!'
        }
      });
    }

    // Verifica query params
    if(route.query.toastMessage) {
      showToast(route.query.toastType || 'success', route.query.toastMessage);
    }
    
  });


  const toastProps = reactive({
    type: '' as string,
    message: '' as string
  });

  const toastRef = ref<InstanceType<typeof Toast> | null>(null); // Instancia o Toast
  function showToast(type, message) { 
    toastProps.type = type;
    toastProps.message = message; 

    toastRef.value?.showToast(toastProps);
  }
</script>

<template>
  <div>
    <Header :breadcrumbLinks="breadcrumbLinks" />

    <Toast ref="toastRef" />

    <section v-if="task">
      <h2 id="task-title" class="sr-only">
        Tarefa
      </h2>

      <div class="grid gap-4 p-8 border-t border-t-1 border-t-slate-200 relative mt-8">
        <button
          ref="updateBanner"
          type="button"
          @click="updateTask"
          :class="[
            showUpdateBanner ? 'grid' : 'hidden'
          ]"
        >
          <button 
            class="absolute top-0 left-0 right-0 w-auto bg-sky-100 py-1 px-2 text-sky-500 hover:bg-sky-200 flex items-center justify-center gap-2 text-xs transition-colors"
            
          >
            <i class="bi bi-arrow-clockwise"></i>
            Atualizar
          </button>
        </button>

        <TaskButtonGroup 
          :task="task"
          :filter="''"
          @load-tasks="loadTask()"
          class="absolute top-8 right-8"
        />

        <div class="grid gap-1">
          <span class="text-slate-400 text-xs">
            Tarefa
          </span>

          <span class="font-bebas text-4xl text-sky-500 w-fit max-w-xl">
            {{ task.title }}
          </span>
        </div>

        <div class="grid gap-1">
          <span class="text-slate-400 text-xs">
            Descrição
          </span>

          <span>
            {{ task.description }}
          </span>
        </div>

        <div class="grid gap-1">
          <span class="text-slate-400 text-xs">
            Prazo para conclusão
          </span>

          <span class="flex items-center gap-4">
            {{ formatDate(task.deadline) }}

            <span
              v-if="task.deadline < today && !task.done"
              class="text-xs flex items-center gap-2  px-2 py-1 rounded-full"
              :class="[
                task.priority === 'high' ? 'text-red-500 bg-red-100' : 'text-slate-400 bg-slate-100'
              ]"
            >
              <i 
                class="bi"
                :class="[
                  task.priority === 'high' ? 'bi-exclamation-triangle' : 'bi-info-circle'
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
            <PriorityIndicator :priority="task.priority" />

            <span v-if="task.priority === 'high'">
              Alta
            </span>

            <span v-else-if="task.priority === 'medium'">
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

          <span v-if="task.category === '1'" class="flex items-center gap-2">
            <i class="bi bi-briefcase-fill opacity-50"></i>

            Trabalho          
          </span>

          <span v-else-if="task.category === '2'" class="flex items-center gap-2">
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
            <span v-if="task.done" class="text-sky-500 text-sm">
              <i class="bi bi-check-circle-fill"></i>
            </span>

            {{ task.done ? 'Concluída' : 'Pendente' }}
          </span>
        </div>

        <div class="grid gap-1">
          <span class="text-slate-400 text-xs">
            Criada em
          </span>

          <span>
            {{ formatDate(task.created_at) }}
          </span>
        </div>
      </div>
    </section>

    <p v-else class="text-slate-400 size-full grid place-content-center">
      A tarefa selecionada não pôde ser encontrada.
    </p>

  </div>
</template>