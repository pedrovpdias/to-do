<script setup lang="ts">
  import Breadcrumb from '../components/Breadcrumb.vue';

  import { useRouter } from 'vue-router';

  const router = useRouter();
  const history = window.history.state.back;
  console.log(history);

  const { breadcrumbLinks } = defineProps({
    breadcrumbLinks: {
      type: Array,
      required: true
    }
  });

  function getBack() {
    if(history) {
      router.go(-1);
    }
  }
  
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
        v-if="$route.name !== 'NewTask'"
        to="/new" 
        title="Adicionar nova tarefa"
        class="size-10 aspect-square grid place-content-center rounded-full bg-sky-500 text-white text-3xl transition-colors hover:bg-sky-600"
      >
        <i class="bi bi-plus"></i>
      </router-link>
    </div>

    <div class="flex justify-between items-center">
      <Breadcrumb :breadcrumbLinks="breadcrumbLinks"/>

      <button
        @click="getBack()" 
        title="Voltar para a página anterior"
        class="flex p-4 text-slate-400 hover:bg-sky-50 hover:text-sky-500 active:bg-sky-100 transition-colors items-end gap-2 text-xs w-fit border border-slate-100 rounded-lg border-r-0 rounded-r-none hover:border-sky-100"
        :class="[
          history === null || $route.name === 'Home' ? 'cursor-default pointer-events-none opacity-50' : ''
        ]"
      >
        <i class="bi bi-chevron-left"></i>
      </button>
    </div>
  </header>
</template>

<script lang="ts">
  export default {
    name: "Header",
  };
</script>