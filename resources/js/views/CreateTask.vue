<script setup lang="ts">
  import Header from '../ui/Header.vue';

  import Label from '../components/form/Label.vue';
  import Input from '../components/form/Input.vue';
  import Textarea from '../components/form/Textarea.vue';
  import Select from '../components/form/Select.vue';

  import { useTemplateRef, onMounted } from 'vue';

  const advancedOptions = useTemplateRef<HTMLDivElement>('advanced-options'); // Referencia do elemento de opções avançadas

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

  const recurrenceOptions = [
    {
      label: '--' as string,
      value: '0' as string
    },
    {
      label: 'Diariamente' as string,
      value: '1' as string
    },
    {
      label: 'Semanalmente' as string,
      value: '2' as string
    },
    {
      label: 'Mensalmente' as string,
      value: '3' as string
    },
    {
      label: 'Anualmente' as string,
      value: '4' as string
    }
  ]

  function toggleAdvancedOptions() {
    if(advancedOptions.value) {
      advancedOptions.value.classList.toggle('hidden');

      const advancedOptionsFieldset = advancedOptions.value.parentElement;

      const icon = advancedOptions.value.parentElement?.querySelector('i');

      if(advancedOptions.value.classList.contains('hidden')) {
        advancedOptionsFieldset?.classList.remove('border');
        advancedOptionsFieldset?.classList.remove('rounded');

        advancedOptionsFieldset?.classList.add('border-t');

        icon?.classList.remove('bi-caret-up-fill');
        icon?.classList.add('bi-caret-down-fill');
      }

      else {
        advancedOptionsFieldset?.classList.remove('border-t');
        advancedOptionsFieldset?.classList.add('border');
        advancedOptionsFieldset?.classList.add('rounded');

        icon?.classList.remove('bi-caret-down-fill');
        icon?.classList.add('bi-caret-up-fill');
      }
    }
  }

  onMounted(() => {
    
  })
</script>

<template>
  <div>
    <Header :breadcrumbLinks="breadcrumbLinks" />

    <section class="flex flex-col items-start p-8 gap-8">
      <div class="flex flex-col">
        <h1 class="text-4xl font-bold font-bebas text-sky-500">
          Nova tarefa
        </h1>

        <p class="font-light text-sm text-slate-400 flex items-center gap-2">
          <span class="text-xs">
            <i class="bi bi-info-circle"></i>
          </span>
          Insira abaixo os detalhes da tarefa que deseja criar
        </p>

      </div>

      <fieldset class="grid gap-8 w-full border border-slate-100 p-8 rounded-lg">
        <legend class="text-slate-400 px-4 text-sm">
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
            <Label :htmlFor="'date'" :text="'Data de conclusão'"></Label>
    
            <Input :id="'date'" :type="'date'" />
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

        <fieldset class="grid border-t border-slate-100">
          <legend class="text-slate-400 px-4 text-sm mx-auto">
            <button @click="toggleAdvancedOptions" class="flex items-center gap-2">
              Opções avançadas <span class="text-xs"><i class="bi bi-caret-down-fill"></i></span>
            </button>
          </legend>

          <div class="grid gap-8 p-8 hidden" ref="advanced-options">
            <div class="grid gap-2">
              <Label :htmlFor="'recurrence'" :text="'Recorrência'"></Label>

              <Select :id="'recurrence'" :options="recurrenceOptions" />
            </div>

            <div class="grid gap-2">
              <Label :htmlFor="'tags'" :text="'Tags'"></Label>

              <Input :id="'tags'" :placeholder="'Insira as tags separadas por vírgula:'" />
            </div>

            <fieldset class="grid gap-4 border-t py-8 border-slate-100">
              <legend class="text-slate-400 pr-4 text-sm">
                Anexos
              </legend>

              <div class="grid gap-2">
                <Label :htmlFor="'attachments'" :text="'Arquivos'"></Label>

                <input type="file" id="attachments">
              </div>

              <div class="grid gap-2">
                <Label :htmlFor="'links'" :text="'Links'"></Label>

                <Input :id="'links'" :placeholder="'Insira os links separados por vírgula:'" />
              </div>
            </fieldset>
          </div>
        </fieldset>

        <div class="flex justify-end">
          <button class="bg-sky-500 py-2 px-4 rounded-md text-white hover:bg-sky-600 font-semibold flex items-center">
            Criar tarefa
          </button>
        </div>
      </fieldset>
    </section>
  </div>
</template>