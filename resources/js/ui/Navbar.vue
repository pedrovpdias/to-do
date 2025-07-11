<script setup lang="ts">
  import { ref, computed, watchEffect } from 'vue';

  const tasks = ref<any[]>([]);

  // Carrega do localStorage ao iniciar
  const loadTasks = () => {
    const saved = localStorage.getItem('tasks');
    tasks.value = saved ? JSON.parse(saved) : [];
  };

  loadTasks();

  const today = new Date().toISOString().split('T')[0];

  const expiredTasks = computed(() =>
    tasks.value.filter(task => !task.done && task.deadline < today)
  );

  const highPriorityExpiredTasks = computed(() =>
    expiredTasks.value.filter(task => task.priority === 'high')
  );

  const todayTasks = computed(() =>
    tasks.value.filter(task => task.deadline === today)
  );

  const navLinks = computed(() => [
    {
      label: 'Hoje',
      url: '/',
      notification: todayTasks.value.some(task => !task.done)
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
      notification: highPriorityExpiredTasks.value.length > 0
    },
    {
      label: 'Todas',
      url: '/all',
      notification: false
    },
  ]);

  window.addEventListener('storage', (event) => {
    if (event.key === 'tasks') {
      loadTasks();
    }
  });

  window.addEventListener('tasks-updated', () => {
    loadTasks();
  });
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