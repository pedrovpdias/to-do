<script setup lang="ts"></script>

<template>
  <nav>
    <ul class="flex gap-2 divide-x divide-slate-100 text-xs">
      <li>
        <router-link 
          to="" 
          title="Início"
          class="p-4 text-slate-400 hover:bg-sky-50 hover:text-sky-500 active:bg-sky-100 transition-colors"
        >
          <i class="bi bi-house-door"></i>
        </router-link>
      </li>
    </ul>
  </nav>
</template>

<script lang="ts">
  export default {
    name: "Breadcrumb",
  };
</script>