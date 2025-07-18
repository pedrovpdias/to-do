<script setup lang="ts">
  import Header from '../ui/Header.vue';

  import Label from '../components/form/Label.vue';
  import Input from '../components/form/Input.vue';
  import Textarea from '../components/form/Textarea.vue';
  import Select from '../components/form/Select.vue';

  import { ref, onMounted } from 'vue';

  import { useRoute, useRouter } from 'vue-router';

  const emit = defineEmits(['submit']);

  interface Task {
    id: number | null;
    title: string;
    description: string;
    priority: string;
    category: string;
    deadline: string;
    done: boolean;
    favorite: boolean;
    created_at: string;
  }

  const task = ref<Task>({
    id: null,
    title: '',
    description: '',
    priority: '',
    category: '',
    deadline: '',
    done: false,
    favorite: false,
    created_at: ''
  });

  const favorite = ref(false);

  const route = useRoute();
  const router = useRouter();
  const taskId = route.params.id;

  defineProps({
    title: String as any,
    description: String as any,
    task: Object as any,
    breadcrumbLinks: Array as any,
    buttonText: String as any
  })

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

  function toggleFavorite() {
    favorite.value = !favorite.value;
  }

  onMounted(() => {
    if(taskId) {
      task.value = JSON.parse(localStorage.getItem('tasks') || '[]').find((t: any) => t.id == taskId) || null;

      favorite.value = task.value.favorite;
    }
  });

  function handleSubmit() {
    // Armazena novos valores vindos do formulário
    const newTaskValues = ref<Task>({
      id: (document.getElementById('id') as HTMLInputElement) ? parseInt((document.getElementById('id') as HTMLInputElement).value) : Date.now(),
      title: (document.getElementById('title') as HTMLInputElement).value,
      description: (document.getElementById('description') as HTMLInputElement).value,
      priority: (document.getElementById('priority') as HTMLInputElement).value,
      category: (document.getElementById('category') as HTMLInputElement).value,
      deadline: (document.getElementById('deadline') as HTMLInputElement).value, 
      done: task.value.done,
      favorite: favorite.value,
      created_at: task.value.created_at ? task.value.created_at : new Date().toISOString()
    });
    
    emit('submit', newTaskValues.value);
  }

</script>

<template>
  <div>
      <Header :breadcrumbLinks="breadcrumbLinks" />
    
    <form @submit.prevent="" class="flex flex-col items-start p-8 gap-8" @submit="handleSubmit" novalidate>
        <div class="flex flex-col">
          <h1 class="text-4xl font-bold font-bebas text-sky-500">
            {{ title }}
          </h1>

          <p class="font-light text-xs text-slate-400 flex items-center gap-2">
            <span class="text-[0.6rem]">
              <i class="bi bi-info-circle"></i>
            </span>
            {{ description }}
          </p>

        </div>

        <fieldset class="grid gap-8 w-full border border-slate-100 p-8 rounded-lg relative">
          <legend class="text-slate-400 px-4 text-xs">
            Detalhes da tarefa
          </legend>

          <div class="grid gap-1 absolute top-1 right-2">
            <label for="favorite" class="text-[0.6rem] text-slate-400">
              Marcar como favorita
            </label>

            <label 
              for="favorite" 
              class="grid place-content-center gap-2 size-6 aspect-square rounded-full group mx-auto text-[0.6rem]"
              :class="[
                favorite
                ? 'bg-yellow-50' 
                : 'bg-sky-50 hover:bg-sky-100 active:bg-sky-200' ]"
            >
              <span 
                class="pointer-events-none"
                :class="[
                  favorite
                  ? 'text-yellow-500' 
                  : 'text-sky-500 group-hover:text-sky-600 group-active:text-sky-700'
                ]"
              >
                <i 
                  class="bi"
                  :class="[
                    favorite
                    ? 'bi-star-fill' 
                    : 'bi-star' ]"
                ></i>
              </span>
            </label>

            <input 
              type="checkbox" 
              id="favorite" 
              class="hidden"
              @change="toggleFavorite" 
            />
          </div>

          <div class="grid gap-2">
            <Label :htmlFor="'title'" :text="'Tarefa'"></Label>

            <Input
              v-if="task.id"
              :id="'id'"
              :inputRef="'id'"
              :type="'hidden'"
              :vModel="task.id" 
              :value="task.id.toString()" 
            />

            <Input 
              :id="'title'"
              :inputRef="'title'" 
              :placeholder="'Insira o nome da tarefa:'" 
              :vModel="task.title" 
              :value="task.title.toString()" 
              required 
            />
          </div>

          <div class="grid gap-2">
            <Label :htmlFor="'description'" :text="'Descrição'"></Label>

            <Textarea
              :id="'description'"
              :textareaRef="'description'"
              :placeholder="'Insira uma descrição sobre os detalhes da tarefa:'"
              vModel="task.description"
              :value="task.description.toString()" 
            />
          </div>

          <div class="flex gap-8 items-center">
            <div class="grid gap-2">
              <Label :htmlFor="'deadline'" :text="'Prazo para conclusão'"></Label>
      
              <Input 
                :id="'deadline'"
                :inputRef="'deadline'"
                :type="'date'" 
                :vModel="task.deadline" 
                :value="task.deadline.toString()
                " 
              />
            </div>

            <div class="grid gap-2">
              <Label :htmlFor="'priority'" :text="'Prioridade'"></Label>

              <Select 
                :id="'priority'"
                :selectRef="'priority'"
                :options="priorityOptions"
                :vModel="task.priority" 
                :value="task.priority.toString()" 
              />
            </div>
          </div>

          <div class="grid gap-2">
            <Label :htmlFor="'category'" :text="'Categoria'"></Label>

            <Select 
              :id="'category'"
              :selectRef="'category'"
              :options="categoryOptions" 
              :vModel="task.category" 
              :value="task.category.toString()"
            />
          </div>

          <div class="flex justify-end">
            <button 
              class="bg-sky-500 py-2 px-4 rounded-md text-white hover:bg-sky-600 font-semibold flex items-center uppercase"
              type="submit"
            >
              {{ buttonText }}
            </button>
          </div>
        </fieldset>
      </form>
  </div>
</template>

<script lang="ts">
  export default {
    name: 'TaskForm'
  }
</script>