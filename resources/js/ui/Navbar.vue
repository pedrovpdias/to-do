<script setup lang="ts">
  const tasks = localStorage.getItem(`tasks`) ? JSON.parse(localStorage.getItem(`tasks`) || '[]') : null;

  const expiredTasks = tasks.filter((task: any) => !task.done && task.deadline < new Date().toISOString().split('T')[0]);
  const highPriorityExpiredTasks = expiredTasks.filter((task: any) => task.priority === 'high'); console.log(highPriorityExpiredTasks)
  const todayTasks = tasks.filter((task: any) => task.deadline === new Date().toISOString().split('T')[0]);

  const navLinks = [
    {
      label: 'Hoje',
      url: '/',
      notification: todayTasks.filter((task: any) => task.done === false).length > 0
    },
    {
      label: 'Próximas',
      url: '/next',
      notification: false
    },
    {
      label: 'Concluídas',
      url: '/done',
      notification: false
    },
    {
      label: 'Favoritas',
      url: '/favorite',
      notification: false
    },
    {
      label: 'Expiradas',
      url: '/expired',
      notification: highPriorityExpiredTasks > 0 ? true : false
    },
    {
      label: 'Todas',
      url: '/all',
      notification: false
    },
  ]
</script>

<template>
  <nav class="flex justify-center gap-4 border-b border-b-1 border-b-slate-200 text-slate-400">
    <router-link 
      v-for="navLink in navLinks" 
      :key="navLink.label" 
      :to="navLink.url" 
      :title="navLink.label"
      class="relative p-4 border-b-3 transition-colors"
      :class="[ $route.path === navLink.url ? 'border-sky-500 text-sky-500' : 'border-transparent hover:border-sky-500 hover:text-sky-500' ]"
    >
      {{ navLink.label }}

      <span v-if="navLink.notification" class="absolute top-4 right-0">
        <span class="absolute top-0 right-0 size-2 aspect-square rounded-full bg-red-400 animate-ping"></span>
        <span class="absolute top-0 right-0 size-2 aspect-square rounded-full bg-red-500"></span>
      </span>
    </router-link>
  </nav>
</template>

<script lang="ts">
  export default {
    name: 'Navbar'
  }
</script>