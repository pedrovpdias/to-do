<script setup lang="ts">
  import Header from '../ui/Header.vue';

  import Label from '../components/form/Label.vue';
  import Input from '../components/form/Input.vue';
  import Textarea from '../components/form/Textarea.vue';
  import Select from '../components/form/Select.vue';

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
  ]
</script>

<template>
  <div>
    <Header :breadcrumbLinks="breadcrumbLinks" />

    <section class="flex flex-col items-start h-screen p-8 gap-8">
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

      <fieldset class="grid gap-8 w-full">
        <legend class="sr-only">
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
      </fieldset>
    </section>
  </div>
</template>