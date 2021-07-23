
Vue.component('crud-page', require('./components/CrudPage.vue').default);
Vue.component('navbar-component', require('./components/NavbarComponent.vue').default);
Vue.component('footer-component', require('./components/FooterComponent.vue').default);
Vue.component('item-component', require('./components/ItemComponent.vue').default);
Vue.component('item-section', require('./components/ItemSection.vue').default);
Vue.component('landing-page', require('./components/LandingPage.vue').default);
 import Vue from 'vue';
 import axios from 'axios';
 Vue.prototype.$http = axios;
    import router from './router';
    import App from './components/App';
    require('./bootstrap');


     const app = new Vue({
       el: '#app',
       components:{App},
       router,
       data:  {
        // selected: 'All',
        // onSearch:false,
        // offersFound: 0,
        // categories: [],
        // searchProvider: '',
        // offers: [],
        // operators:[],
        // show:false,

    },
mounted: function() {
    // axios
    //     .get('api/categories')
    //     .then((response) => {
    //         this.categories = response.data;
    //         console.log(this.categories);
    //     })

    // axios
    //     .get('api/offers')
    //     .then((response) => {
    //         this.offers = response.data;
    //         console.log(this.offers)
    //     })

    // axios
    //     .get('api/operators')
    //     .then((response) => {
    //         this.operators = response.data;
    //         console.log(this.operators)
    //     })
},
methods: {
    // selectedCategory(category) {
    //     this.onSearch=true;
    //     this.selected = category.nome;
    //     axios
    //         .get('api/categories/' + category.nome)
    //         .then((response) => {
    //             this.offers = response.data;

    //         })
    // },
    // filterByProvider() {
    //     axios
    //     .get('api/offers')
    //     .then((response) => {
    //             this.selected = "searchByProvider";
    //             if(this.searchProvider) {
    //                 this.offers = response.data.filter(offer =>
    //                 offer.provider.toLowerCase().includes(this.searchProvider.toLowerCase())
    //                 );

    //             } else {
    //                 this.selected = 'All';
    //                 this.offers = response.data;
    //             }
    //         })

    // },

    // showAll() {
    //     this.selected = "All";
    //     this.searchProvider = "";
    //     axios
    //     .get('api/offers')
    //     .then((response) => {
    //         this.offers = response.data;
    //     })
    // },

      }
});
