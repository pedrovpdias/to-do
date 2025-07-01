<script setup lang="ts">
  defineProps({
    breadcrumbLinks: {
      type: Array as any,
      required: true
    }
  });

</script>

<template>
  <nav>
    <ul class="flex gap-2 divide-x divide-slate-100 text-xs">
      <li v-for="(breadcrumbLink, index) in breadcrumbLinks" :key="index">
        <router-link 
          to="" 
          title="Início"
          class="p-4 text-slate-400 hover:bg-sky-50 hover:text-sky-500 active:bg-sky-100 transition-colors last:cursor-default last:pointer-events-none last:opacity-50"
        >
          <i v-if="index === 0" class="bi bi-house-door"></i>

          <span v-else>
            {{ breadcrumbLink.name }}
          </span>
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