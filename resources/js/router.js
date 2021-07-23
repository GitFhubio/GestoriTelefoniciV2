import Vue from 'vue';
import VueRouter from 'vue-router';
import CrudPage from "./components/CrudPage";
import AdminDashboard from "./components/AdminDashboard";
Vue.use(VueRouter);

export default new VueRouter({
    routes:[{path:'/user/operators',component:CrudPage },
            {path:'/user/dashboard',component:AdminDashboard}
        ],
        mode:'history'
})
