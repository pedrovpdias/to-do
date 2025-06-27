<template>
  <div>
    <header class="flex flex-col">
      <div class="flex justify-between items-center p-8">
        <h1 class="text-4xl flex items-end gap-3 font-bold text-black">
          <span class="text-sky-500 text-2xl">
            <i class="bi bi-check-square"></i>
          </span>

          List.it
        </h1>

        <router-link 
          to="" 
          title="Adicionar nova tarefa"
          class="size-10 aspect-square grid place-content-center rounded-full bg-sky-500 text-white text-3xl transition-colors hover:bg-sky-600"
        >
          <i class="bi bi-plus"></i>
        </router-link>
      </div>

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
      </nav>
    </header>

    <ul class="divide-y divide-slate-100 grid gap-2 px-4">
      <li class="py-4">
        <router-link 
          to="" 
          class="flex items-center gap-4 p-4 hover:bg-sky-50 hover:text-sky-500 active:bg-sky-100 transition-colors rounded-lg"
        >
          <div class="flex flex-col gap-1">
            <span class="font-bold text-slate-900">Tarefa 1</span>
            <span class="text-slate-700">Descrição da tarefa 1</span>
          </div>

          <div class="ml-auto flex gap-2">
            <span class="w-2 h-2 bg-sky-500 rounded-full"></span>
            <span class="w-2 h-2 bg-sky-500 rounded-full"></span>
            <span class="w-2 h-2 bg-sky-500 rounded-full"></span>
          </div>
        </router-link>
      </li>
      
      <li class="py-4">
        <router-link 
          to="" 
          class="flex items-center gap-4 p-4 hover:bg-sky-50 hover:text-sky-500 active:bg-sky-100 transition-colors rounded-lg"
        >
          <div class="flex flex-col gap-1">
            <span class="font-bold text-slate-900">Tarefa 2</span>
            <span class="text-slate-700">Descrição da tarefa 2</span>
          </div>

          <div class="ml-auto flex gap-2">
            <span class="w-2 h-2 bg-sky-500 rounded-full"></span>
            <span class="w-2 h-2 bg-sky-500 rounded-full"></span>
            <span class="w-2 h-2 bg-sky-500 rounded-full"></span>
          </div>
        </router-link>
      </li>
    </ul>
  </div>

</template>

