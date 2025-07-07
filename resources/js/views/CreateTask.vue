<script setup lang="ts">
  import Header from '../ui/Header.vue';

  import Label from '../components/form/Label.vue';
  import Input from '../components/form/Input.vue';
  import Textarea from '../components/form/Textarea.vue';
  import Select from '../components/form/Select.vue';

  // import { useTemplateRef } from 'vue';
  import { useRouter } from 'vue-router';

  const router = useRouter();

  // const advancedOptions = useTemplateRef<HTMLDivElement>('advanced-options'); // Referencia do elemento de opções avançadas

  const breadcrumbLinks = [
    {
      to: '/' as string,
      label: 'Início' as string
    },
    {
      to: '/new' as string,
      label: 'Nova tarefa' as string
    }
  ];

  const priorityOptions = [
    {
      label: 'Alta' as string,
      value: '1' as string
    },
    {
      label: 'Media' as string,
      value: '2' as string
    },
    {
      label: 'Baixa' as string,
      value: '3' as string
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
  function handleTaskCreation() {
    // Cria um objeto com os dados da tarefa
    const task = {
      id: Date.now(), // gera um id único baseado na data/hora
      title: (document.getElementById('title') as HTMLInputElement).value,
      description: (document.getElementById('description') as HTMLInputElement).value,
      deadline: (document.getElementById('deadline') as HTMLInputElement).value,
      priority: (document.getElementById('priority') as HTMLInputElement).value,
      category: (document.getElementById('category') as HTMLInputElement).value,
      done: false,
    };

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
</script>

<template>
  <div>
    <Header :breadcrumbLinks="breadcrumbLinks" />

    <form @submit.prevent="handleTaskCreation" class="flex flex-col items-start p-8 gap-8">
      <div class="flex flex-col">
        <h1 class="text-4xl font-bold font-bebas text-sky-500">
          Nova tarefa
        </h1>

        <p class="font-light text-xs text-slate-400 flex items-center gap-2">
          <span class="text-[0.6rem]">
            <i class="bi bi-info-circle"></i>
          </span>
          Insira abaixo os detalhes da tarefa que deseja criar
        </p>

      </div>

      <fieldset class="grid gap-8 w-full border border-slate-100 p-8 rounded-lg">
        <legend class="text-slate-400 px-4 text-xs">
          Detalhes da tarefa
        </legend>

        <div class="grid gap-2">
          <Label :htmlFor="'title'" :text="'Tarefa'"></Label>

          <Input :id="'title'" :placeholder="'Insira o nome da tarefa a ser criada:'" />
        </div>

        <div class="grid gap-2">
          <Label :htmlFor="'description'" :text="'Descrição'"></Label>

          <Textarea :id="'description'" :placeholder="'Insira uma descrição sobre os detalhes da tarefa:'"/>
        </div>

        <div class="flex gap-2 items-center">
          <div class="grid gap-2">
            <Label :htmlFor="'deadline'" :text="'Prazo para conclusão'"></Label>
    
            <Input :id="'deadline'" :type="'date'" />
          </div>

          <div class="grid gap-2">
            <Label :htmlFor="'priority'" :text="'Prioridade'"></Label>

            <Select :id="'priority'" :options="priorityOptions" />
          </div>
        </div>

        <div class="grid gap-2">
          <Label :htmlFor="'category'" :text="'Categoria'"></Label>

          <Select :id="'category'" :options="categoryOptions" />
        </div>

        <div class="flex justify-end">
          <button 
            class="bg-sky-500 py-2 px-4 rounded-md text-white hover:bg-sky-600 font-semibold flex items-center uppercase"
            type="submit"
          >
            Criar tarefa
          </button>
        </div>
      </fieldset>
    </form>
  </div>
</template>