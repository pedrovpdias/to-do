<script setup lang="ts">
  import Header from '../ui/Header.vue';
  import Navbar from '../ui/Navbar.vue';
  import TaskList from '../ui/TaskList.vue';

  import Toast from '../ui/Toast.vue';

  import { reactive, onMounted, PropType } from 'vue';
  import { useRoute } from 'vue-router';

  const route = useRoute();

  const breadcrumbLinks = [
    {
      url: '' as string,
      label: 'Início' as string
    }
  ];

  const toastProps = reactive({
    type: '' as string,
    message: '' as string
  });

  defineProps({
    filter: String as PropType<string>,
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

    <Navbar />

    <h2 id="tasks-title" class="sr-only">
      Tarefas
    </h2>

    <TaskList @show-toast="showToast" :filter="filter" />
  </div>
</template>

<script lang="ts">
  export default {
    name: 'ShowTasks'
  }
</script>