<template>
        <div>
  <div class="card" style="width:500px;margin:20px;">
    <div class="card-body d-flex flex-column">
      <label for="name">Nome:{{name}}</label>
       <input type="text" name="name" placeholder="Inserisci nuovo nome" v-model="newName">
      <label for="costomensile">Costo mensile: {{costo_mensile}} €</label>
      <input type="number" name="costomensile" placeholder="Inserisci nuovo costo mensile" v-model="newCostoMensile">
      <label for="descrizione">Descrizione:{{descrizione}} </label>
      <textarea type="text" v-model="newDescription"></textarea>
      <label for="datainizio">Data inizio:{{data_inizio}}</label><input type="date"  v-model="newDataInizio">
       <label for="datafine">Data fine:{{data_fine}}</label><input type="date"  v-model="newDataFine">
        <label for="categories"> Categorie:</label>
        <ul style="list-style:none;">
        <li v-for="(el,ind) in categories" :key=ind>{{el.pivot.category_id}}</li>
        </ul>
         <!-- v-model="newCategories" -->
         <!-- ['Adsl','Fibra','5G','Mobile','Estero'] -->
        <!-- :selected="categoriesinArray().includes(val) ? 'selected' :''" -->
       <select name="categories[]" id="" multiple v-model="newCategories">
        <option :value="val" v-for="val in [1,2,3,4,5]"  :key=val>{{val}}</option>
    </select>
    </div>
        <div class="buttons">
     <button @click="update">Update</button>
      <button @click="del">Delete</button>
    </div>
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
