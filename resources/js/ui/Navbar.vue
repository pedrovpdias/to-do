<script setup lang="ts"></script>

<template>
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
</template>

<script lang="ts">
  export default {
    name: 'Navbar'
  }
</script>