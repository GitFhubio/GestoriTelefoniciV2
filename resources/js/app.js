Vue.component('category-component', require('./components/CategoryComponent.vue').default);
Vue.component('category-section', require('./components/CategorySection.vue').default);
Vue.component('admin-crud', require('./components/AdminCrud.vue').default);
Vue.component('admincrud-component', require('./components/AdminCrudComponent.vue').default);
Vue.component('lead-crud', require('./components/LeadCrud.vue').default);
Vue.component('leadcrud-component', require('./components/LidCrudComponent.vue').default);
Vue.component('offer-crud', require('./components/OfferCrud.vue').default);
Vue.component('offercrud-component', require('./components/OfferCrudComponent.vue').default);
Vue.component('navbar-component', require('./components/NavbarComponent.vue').default);
Vue.component('footer-component', require('./components/FooterComponent.vue').default);
Vue.component('item-component', require('./components/ItemComponent.vue').default);
Vue.component('item-section', require('./components/ItemSection.vue').default);
Vue.component('landing-page', require('./components/LandingPage.vue').default);
Vue.component('category-component', require('./components/CategoryComponent.vue').default);
Vue.component('operator-page', require('./components/OperatorPage.vue').default);
Vue.component('operator-component', require('./components/OperatorComponent.vue').default);
Vue.component('offer-component', require('./components/OfferComponent.vue').default);
 import Vue from 'vue';
 import axios from 'axios';
 Vue.prototype.$http = axios;
    import router from './router';
    import App from './components/App';
    require('./bootstrap');
 Vue.prototype.$event =new Vue();
   //sarebbe il mio bus
    // const bus= new Vue();
     const app = new Vue({
       el: '#app',
       components:{App},
       router,
       data:  {
        show:false,

    },
mounted: function() {
},
methods: {
      }
});
