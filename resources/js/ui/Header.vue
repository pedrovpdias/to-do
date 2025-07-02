<script setup lang="ts">
  import Breadcrumb from '../components/Breadcrumb.vue';

  const { breadcrumbLinks } = defineProps({
    breadcrumbLinks: {
      type: Array,
      required: true
    }
  })

</script>

<template>
  <header class="flex flex-col">
    <div class="flex justify-between items-center p-8">
      <h1 class="text-4xl flex items-end gap-3 font-bold text-black">
        <span class="text-sky-500 text-2xl">
          <i class="bi bi-check-square"></i>
        </span>

        List.it
      </h1>

      <router-link 
        v-if="$route.name === 'Home'"
        to="/new" 
        title="Adicionar nova tarefa"
        class="size-10 aspect-square grid place-content-center rounded-full bg-sky-500 text-white text-3xl transition-colors hover:bg-sky-600"
      >
        <i class="bi bi-plus"></i>
      </router-link>
    </div>

    <div class="flex justify-between items-center">
      <Breadcrumb :breadcrumbLinks="breadcrumbLinks"/>

      <router-link 
        to="" 
        title="Voltar para a tela inicial"
        class="p-4 text-slate-400 hover:bg-sky-50 hover:text-sky-500 active:bg-sky-100 transition-colors flex items-center gap-2 text-xs w-fit"
      >
        <i class="bi bi-arrow-left-short"></i>

        Voltar
      </router-link>
    </div>

    <nav class="flex justify-center gap-4 border-b border-b-1 border-b-slate-200 text-slate-400">
      <router-link 
        to="" 
        title="Todas as tarefas"
        class="p-4 border-b-3 text-sky-500 border-sky-500 hover:pointer-events-none cursor-default"
      >
        Todas
      </router-link>

      <router-link 
        to="" 
        title="Tarefas de hoje"
        class="p-4 hover:bg-sky-50 hover:text-sky-500 active:bg-sky-100 transition-colors"
      >
        Hoje
      </router-link>

      <router-link 
        to="" 
        title="Proximas tarefas"
        class="p-4 hover:bg-sky-50 hover:text-sky-500 active:bg-sky-100 transition-colors"
      >
        Próximas
      </router-link>

      <router-link 
        to="" 
        title="Tarefas concluídas"
        class="p-4 hover:bg-sky-50 hover:text-sky-500 active:bg-sky-100 transition-colors"
      >
        Concluídas
      </router-link>

      <router-link 
        to="" 
        title="Tarefas favoritas"
        class="p-4 hover:bg-sky-50 hover:text-sky-500 active:bg-sky-100 transition-colors"
      >
        Favoritas
      </router-link>
    </nav>
  </header>
</template>

<script lang="ts">
  export default {
    name: "Header",
  };
</script>