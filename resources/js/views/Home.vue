<script setup lang="ts">
  import { reactive } from 'vue';
import Header from '../ui/Header.vue';
  import TaskList from '../ui/TaskList.vue';

  import Toast from '../ui/Toast.vue';

  const breadcrumbLinks = [
    {
      to: '' as string,
      label: 'Início' as string
    }
  ];

  const toastProps = reactive({
    type: '' as string,
    message: '' as string
  });

  function showToast(data: any) { 
    toastProps.type = data.type;
    toastProps.message = data.message;
  }

</script>

<template>
  <div>
    <Toast :type="toastProps.type" :message="toastProps.message" />

    <Header :breadcrumbLinks="breadcrumbLinks" />

    <h2 id="tasks-title" class="sr-only">
      Tarefas
    </h2>

    <TaskList @show-toast="showToast" />
  </div>

</template>

