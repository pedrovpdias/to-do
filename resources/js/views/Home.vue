<script setup lang="ts">
  import Header from '../ui/Header.vue';
  import TaskList from '../ui/TaskList.vue';

  import Toast from '../ui/Toast.vue';

  import { reactive, onMounted } from 'vue';
  import { useRoute, useRouter } from 'vue-router';

  const route = useRoute();
  const router = useRouter();

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

  onMounted(() => {
    const toasType = route.query.toasType;
    const toasMessage = route.query.toasMessage;

    if(toasType && toasMessage) {
      showToast({ type: toasType, message: toasMessage });
    }
  });

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

