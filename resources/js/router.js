import Vue from 'vue';
import VueRouter from 'vue-router';
import AdminCrud from "./components/AdminCrud";
import AdminDashboard from "./components/AdminDashboard";
Vue.use(VueRouter);

const router = new VueRouter({
    routes:[{path:'/user/operators',component:AdminCrud },
            {path:'/user/dashboard',component:AdminDashboard}
        ],
        mode:'history'
})

//piccolo test per proteggere rotte,funziona

// router.beforeEach((to, from, next) => {
//     // store.dispatch('fetchAccessToken');
//     // if (to.fullPath === '/users') {
//     //   if (!store.state.accessToken) {
//     //     next('/login');
//     //   }
//     // }
//     if (to.fullPath === '/user/operators') {
//       if (2==3) {
//         next('/user/dashboard');
//       }
//     }
//     next();
//   });

  export default router;
