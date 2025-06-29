<script setup lang="ts">
  import Header from '../ui/Header.vue';
</script>

<template>
  <div>
    <Header />

    <ul class="divide-y divide-slate-100 grid px-4">
      <li class="py-4">
        <div 
          class="flex items-center gap-8 p-4 border border-slate-100 shadow-lg hover:border-sky-200 transition-colors rounded-lg"
        >
          <button class="size-10 aspect-square grid place-content-center rounded-full bg-sky-500 text-sky-500 border border-sky-500 text-3xl text-center text-white">
            <i class="bi bi-check"></i>
          </button>
        
          <div class="flex flex-col gap-1">
            <span class="font-bold flex items-center gap-2">
              <span class="text-red-500 text-4xl">
                <i class="bi bi-dot"></i>
              </span>

              Tarefa 1
            </span>

            <span class="font-light">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. In id fringilla leo, in rutrum ipsum. Vivamus pretium sem eu ex iaculis, eget interdum nunc feugiat.
            </span>
          </div>

          <div class="ml-auto flex gap-2">
            <button class="size-10 aspect-square grid place-content-center rounded-full bg-sky-50 text-sky-500">
              <i class="bi bi-star"></i>
            </button>

            <button class="size-10 aspect-square grid place-content-center rounded-full bg-sky-50 text-sky-500">
              <i class="bi bi-pencil"></i>
            </button>

            <button class="size-10 aspect-square grid place-content-center rounded-full bg-sky-50 text-sky-500">
              <i class="bi bi-trash"></i>
            </button>
          </div>
        </div>
      </li>
      
      <li class="py-4">
        <div 
          class="flex items-center gap-8 p-4 border border-slate-100 shadow-lg hover:border-sky-200 active:bg-sky-100 transition-colors rounded-lg"
        >
          <button class="size-10 aspect-square grid place-content-center rounded-full text-sky-500 border border-slate-200 text-3xl text-center text-white hover:text-slate-300">
            <i class="bi bi-check"></i>
          </button>

          <div class="flex flex-col gap-1">
            <span class="font-bold flex items-center gap-2">
              <span class="text-green-500 text-4xl">
                <i class="bi bi-dot"></i>
              </span>

              Tarefa 2
            </span>

            <span class="font-light">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. In id fringilla leo, in rutrum ipsum. Vivamus pretium sem eu ex iaculis, eget interdum nunc feugiat.
            </span>
          </div>

          <div class="ml-auto flex gap-2">
            <button class="size-10 aspect-square grid place-content-center rounded-full bg-sky-50 text-sky-500">
              <i class="bi bi-star"></i>
            </button>

            <button class="size-10 aspect-square grid place-content-center rounded-full bg-sky-50 text-sky-500">
              <i class="bi bi-pencil"></i>
            </button>

            <button class="size-10 aspect-square grid place-content-center rounded-full bg-sky-50 text-sky-500">
              <i class="bi bi-trash"></i>
            </button>
          </div>
        </div>
      </li>

      <li class="py-4">
        <div 
          class="flex items-center gap-8 p-4 border border-slate-100 shadow-lg hover:border-sky-200 transition-colors rounded-lg"
        >
          <button class="size-10 aspect-square grid place-content-center rounded-full text-sky-500 border border-slate-200 text-3xl text-center text-white hover:text-slate-300">
            <i class="bi bi-check"></i>
          </button>
        
          <div class="flex flex-col gap-1">
            <span class="font-bold flex items-center gap-2">
              <span class="text-yellow-500 text-4xl">
                <i class="bi bi-dot"></i>
              </span>

              Tarefa 3
            </span>

            <span class="font-light">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. In id fringilla leo, in rutrum ipsum. Vivamus pretium sem eu ex iaculis, eget interdum nunc feugiat.
            </span>
          </div>

          <div class="ml-auto flex gap-2">
            <button class="size-10 aspect-square grid place-content-center rounded-full bg-sky-50 text-sky-500">
              <i class="bi bi-star"></i>
            </button>

            <button class="size-10 aspect-square grid place-content-center rounded-full bg-sky-50 text-sky-500">
              <i class="bi bi-pencil"></i>
            </button>

            <button class="size-10 aspect-square grid place-content-center rounded-full bg-sky-50 text-sky-500">
              <i class="bi bi-trash"></i>
            </button>
          </div>
        </div>
      </li>
    </ul>
  </div>

</template>

