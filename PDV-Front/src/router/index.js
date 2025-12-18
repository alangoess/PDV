import { createRouter, createWebHistory } from 'vue-router';

import Index from '../Pages/Produto/Index.vue';
import CategoriaIndex from '../Pages/Categoria/Index.vue';
import EstoqueIndex from '../Pages/Estoque/Index.vue';

const routes = [
//   {
//     path: '/',
//     name: 'home',
//     component: HomeView,
//   },
  {
    path: '/produtos',
    name: 'produtos.index',
    component: Index,
  },
  {
    path: '/categorias',
    name: 'categorias.index',
    component: CategoriaIndex,
  },
  {
    path: '/estoque',
    name: 'estoque.index',
    component: EstoqueIndex,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
