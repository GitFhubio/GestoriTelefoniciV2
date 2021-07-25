<template>
<div id="landing">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">Benvenuto in GestoriTelefonici.it</h1>
              <p class="lead">Scopri le offerte di migliaia di compagnie e scegli quella più adatta a te!</p>
            </div>
          </div>
<main class="container landing-page">
    <div class="section-title-container">
        <h2 class="text-center section-title" style="margin-top: 20px">I nostri operatori</h2>
    </div>
    <item-section :items="operators" class="section d-flex flex-wrap justify-content-center operatorsSection">
       </item-section>
    <category-section :array="categories" class="section d-flex flex-wrap justify-content-center categoriesSection">
    </category-section>
     <div class="section-title-container">
    <button class="text-center reset" @click="showAll" v-if="onSearch">Torna a tutte le offerte</button>
     </div>
 <div class="section-title-container">
 <h2 class="text-center section-title" style="margin-top: 20px">Le nostre offerte {{selected}}</h2>
     </div>
    <item-section :items="offers" :parameter="operators" class="section d-flex flex-wrap justify-content-center offersSection">
    </item-section>
</main>
</div>

</template>

<script>
  import ItemSection from './ItemSection.vue';
    import CategorySection from './CategorySection.vue';
export default {
  name: 'LandingPage',
  components: {
    ItemSection,
    CategorySection
  },
  data: function() {
    return {
      operators:[],
      offers:[],
      categories:[],
      selected: '',
      onSearch:false,
    }
  },
mounted: function() {
         axios
        .get('api/operators')
        .then((response) => {
            this.operators = response.data;
            console.log(this.operators)
        })
            axios
        .get('api/offers')
        .then((response) => {
            this.offers = response.data;
            console.log(this.offers)
        })
            axios
        .get('api/categories')
        .then((response) => {
            this.categories = response.data;
            console.log(this.categories);
        })
},
methods:{
        showAll() {
        axios
        .get('api/offers')
        .then((response) => {
            this.offers = response.data;
        })
        this.onSearch=false;
        this.selected='';
    },
},

created: function(){
  this.$event.$on('categoryselected', (data) => {
   this.offers=data[0];
   this.onSearch=data[1];
   this.selected=data[2];
})
}
}
</script>
