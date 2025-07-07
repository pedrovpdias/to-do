<script setup lang="ts">
  const { breadcrumbLinks } = defineProps({
    breadcrumbLinks: {
      type: Array as any,
      required: true
    }
  });
console.log(breadcrumbLinks);
</script>

<template>
  <nav>
    <ul class="flex gap-2 divide-x divide-slate-100 text-xs">
      <li v-for="(breadcrumbLink, index) in breadcrumbLinks" :key="index">
        <router-link 
          :to="breadcrumbLink.url" 
          title="Início"
          class="p-4 text-slate-400 hover:bg-sky-50 hover:text-sky-500 active:bg-sky-100 transition-colors"
          :class="[ index === breadcrumbLinks.length - 1 ? 'cursor-default pointer-events-none opacity-50' : '' ]"
        >
          <i v-if="index === 0" class="bi bi-house-door"></i>

          <span v-else>
            {{ breadcrumbLink.label }}
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