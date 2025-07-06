<script setup lang="ts">
  import Header from '../ui/Header.vue';
  import TaskList from '../ui/TaskList.vue';

  const breadcrumbLinks = [
    {
      to: '' as string,
      label: 'Início' as string
    }
  ];

</script>

<template>
  <div>
    <Header :breadcrumbLinks="breadcrumbLinks" />

    <TaskList />
  </div>

</template>

