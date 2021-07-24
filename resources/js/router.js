import Vue from 'vue';
import VueRouter from 'vue-router';
import AdminCrud from "./components/AdminCrud";
import AdminDashboard from "./components/AdminDashboard";
Vue.use(VueRouter);

export default new VueRouter({
    routes:[{path:'/user/operators',component:AdminCrud },
            {path:'/user/dashboard',component:AdminDashboard}
        ],
        mode:'history'
})
