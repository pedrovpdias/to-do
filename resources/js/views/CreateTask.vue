<script setup lang="ts">
  import Header from '../ui/Header.vue';

  const breadcrumbLinks = [
    {
      to: '' as string,
      label: 'Início' as string
    }
  ]
</script>

<template>
  <div>
    <Header :breadcrumbLinks="breadcrumbLinks" />

    <section class="flex justify-center items-center h-screen">
      <h1 class="text-4xl font-bold text-sky-500">
        Adicionar nova tarefa
      </h1>

      
    </section>
  </div>
</template>