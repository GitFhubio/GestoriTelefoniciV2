<template>
<div id="operator-page">

<offer-crud v-on:input="metodo2"></offer-crud>
<lead-crud :offertaselezionata="result" ></lead-crud>
</div>
</template>

<script>
  import OfferCrud from './OfferCrud.vue';
import LeadCrud from './LeadCrud.vue';
export default {
  name: 'OperatorPage',
  components: {
  OfferCrud,
  LeadCrud
  },
  data: function() {
    return {
      result:'All'
    }
  },
mounted: function() {
this.metodo2();
}
,
methods:{
    metodo2(cat){
   this.result=cat;
   console.log(this.result);
}

    }
}


</script>
