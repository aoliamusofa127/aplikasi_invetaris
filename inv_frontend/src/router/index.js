import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'login',
      component: () => import('../views/LoginView.vue')
    },
    {
      path: '/users',
      name: 'users',
      component: () => import('../views/user/Index.vue')
    },
    {
      path: '/adduser',
      name: 'adduser',
      component: () => import('../views/user/AddUser.vue')
    },
    {
      path: '/updateuser/:userId',
      name: 'updateuser',
      props:true,
      component: () => import('../views/user/UpdateUser.vue')
    },
    {
      path: '/deleteuser/:userId',
      name: 'user',
      component: () => import('../views/user/Index.vue')
    },
    {
      path: '/pegawai',
      name: 'pegawai',
      component: () => import('../views/pegawai/Index.vue')
    },
    {
      path: '/addpegawai',
      name: 'addpegawai',
      component: () => import('../views/pegawai/AddPegawai.vue')
    },
    {
      path: '/ruang',
      name: 'ruang',
      component: () => import('../views/ruang/IndexRuaang.vue')
    },
    {
      path: '/addruang',
      name: 'addruang',
      component: () => import('../views/ruang/AddRuang.vue')
    },
    {
      path: '/updateruang/:ruangId',
      name: 'updateruang',
      component: () => import('../views/ruang/UpdateRuang.vue')
    },
    {
      path: '/updateruang/:ruangId',
      name: 'updateruang',
      props:true,
      component: () => import('../views/ruang/UpdateRuang.vue')
    },
    {
      path: '/inventaris',
      name: 'inventaris',
      component: () => import('../views/inventaris/Index.vue')
    },
    {
      path: '/peminjaman',
      name: 'peminjaman',
      component: () => import('../views/peminjaman/Index.vue')
    },
    {
      path: '/detailpinjam',
      name: 'detailpinjam',
      component: () => import('../views/detailpinjam/Index.vue')
    },
  ]
});

router.beforeEach((to, from, next) => {
  const loggedIn = localStorage.getItem('token');
  if (to.matched.some(record => record.meta.requiresAuth) && !loggedIn) {
    next('/');
  } else {
    next();
  }
});

export default router
