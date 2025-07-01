import { createRouter, createWebHistory } from 'vue-router';
import Home from '@/views/Home.vue';
import CreateTask from '@/views/CreateTask.vue';

const routes = [
  { 
    path: '/', 
    name: 'Home', 
    component: Home 
  },
  {
    path: '/new',
    name: 'Create Task',
    component: CreateTask,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router