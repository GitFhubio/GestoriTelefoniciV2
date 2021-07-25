<template>
  <div class="crud">
    <div class="col-8">
      <h5>Nome: {{ name | properCase }}</h5>
       <h6>Costo mensile : {{ costo_mensile }}</h6>
        <h6>Descrizione: {{ descrizione }}</h6>
       <h6>Data inizio : {{ data_inizio  }}</h6>
        <h6>Data fine : {{ data_fine  }}</h6>
      <input type="text" placeholder="Inserisci nuovo nome" v-model="newName">
      <input type="number" placeholder="Inserisci nuovo costo mensile" v-model="newCostoMensile">
      <textarea type="text" placeholder="Inserisci nuova descrizione" v-model="newDescription"></textarea>
      <input type="date" placeholder="Inserisci nuova data inizio" v-model="newDataInizio">
     <input type="date" placeholder="Inserisci nuova data fine" v-model="newDataFine">
     <select name="categories[]" id="" multiple >
         <!-- v-model="newCategories" -->
         <!-- ['Adsl','Fibra','5G','Mobile','Estero'] -->
        <option :value="val" v-for="val in [1,2,3,4,5]"  :selected="categoriesinArray().includes(val) ? 'selected' :''" :key=val>{{val}}</option>
    </select>
    </div>
    <div class="buttons">
     <button @click="update">Update</button>
      <button @click="del">Delete</button>
    </div>
    </div>
</template>
<script>
  export default {
    name:'OfferCrudComponent',
    data:function(){
        return {
           newName:'',
           newCostoMensile:0,
           newDescription:'',
           newDataInizio:'',
           newDataFine:'',
           newCategories:[]
        //    categoriesID:[]
        }
    },
    methods: {
        categoriesinArray(){
          let arr=[];
         this.categories.forEach(element => {
 let category_name='';
 switch(element.pivot.category_id) {
  case 1:
 category_name='ADSL';
    break;
  case 2:
   category_name='Fibra';
    break;
      case 3:
   category_name='5G';
    break;
      case 4:
   category_name='Mobile';
    break;
      case 5:
   category_name='Estero';
    break;
  default:
  break;
}
//  this.categoriesID.push(element.pivot.category_id);
 arr.push(element.pivot.category_id);
         });
         return arr;
        },
   update() {
        this.$emit('update', this.id,this.newName,this.newCostoMensile,this.newDescription,this.newDataInizio,this.newDataFine,this.newCategories);
      },
      del() {
        this.$emit('delete', this.id);
      },

    },
    mounted() {
      this.categoriesinArray();
    },
    props: ['id','name','costo_mensile','descrizione','data_inizio','data_fine','categories'],
    filters: {
      properCase(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
      }
    }
  }
</script>
<style>

</style>
