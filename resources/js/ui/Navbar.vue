<script setup lang="ts">
  const navLinks = [
    {
      label: 'Hoje',
      url: '/',
      notification: false
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
      notification: false
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
      class="p-4 border-b-3 transition-colors"
      :class="[ $route.path === navLink.url ? 'border-sky-500 text-sky-500' : 'border-transparent hover:border-sky-500 hover:text-sky-500' ]"
    >
      {{ navLink.label }}
    </router-link>      
  </nav>
</template>

<script lang="ts">
  export default {
    name: 'Navbar'
  }
</script>