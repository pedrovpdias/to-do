import { createRouter, createWebHistory } from 'vue-router';

import Home from '../views/Home.vue';
import Next from '../views/Next.vue';
import Done from '../views/Done.vue';
import Favorite from '../views/Favorite.vue';
import Expired from '../views/Expired.vue';
import All from '../views/All.vue';

import Create from '../views/Create.vue';

const routes = [
  { 
    path: '/', 
    name: 'Home', 
    component: Home 
  },
  {
    path: '/next',
    name: 'Próximas',
    component: Next
  },
  {
    path: '/next',
    name: 'Próximas',
    component: Next
  },
  {
    path: '/done',
    name: 'Concluídas',
    component: Done
  },
  {
    path: '/favorite',
    name: 'Favoritas',
    component: Favorite
  },
  {
    path: '/expired',
    name: 'Expiradas',
    component: Expired
  },
  {
    path: '/all',
    name: 'Todas',
    component: All
  },
  {
    path: '/new',
    name: 'Create Task',
    component: Create,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router