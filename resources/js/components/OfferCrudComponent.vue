<template>
  <div class="card">
    <div class="card-body d-flex flex-column">
      <h5 class="align-self-center font-weight-bold">{{newName | properCase}}</h5>
      <label for="name">Nome offerta: </label>
      <input type="text" name="name" placeholder="Inserisci nuovo nome" v-model="newName">
      <label for="costomensile">Costo mensile(in €) :</label>
      <input type="number" name="costomensile" placeholder="Inserisci nuovo costo mensile" v-model="newCostoMensile">
      <label for="descrizione">Descrizione:</label>
      <textarea type="text" v-model="newDescription" rows="4"></textarea>
      <label for="datainizio">Data inizio:</label><input type="date"  v-model="newDataInizio">
       <label for="datafine">Data fine:</label><input type="date"  v-model="newDataFine">
        <label for="categories"> Categorie:</label>
        <!-- <ul style="list-style:none;">
        <li v-for="(el,ind) in categories" :key=ind>{{categoryNames[el.pivot.category_id]}}</li>
        </ul> -->
         <!-- v-model="newCategories" -->
        <!-- :selected="categoriesinArray().includes(val) ? 'selected' :''" -->
       <select name="categories[]" id="" multiple v-model="newCategories">
        <option :value="val" v-for="val in [0,1,2,3,4]" :key=val>{{categoryNames[val]}}</option>
    </select>
            <div class="buttons" style="margin-top:10px;">
     <button  class="goldbtn" @click="update">Aggiorna</button>
      <button   class="goldbtn" @click="del">Cancella</button>
    </div>
    </div>
    </div>
</template>
<script>
  export default {
    name:'OfferCrudComponent',
    data:function(){
        return {
           newName:this.name,
           newCostoMensile:this.costo_mensile,
           newDescription:this.descrizione,
           newDataInizio:this.data_inizio,
           newDataFine:this.data_fine,
    //        selectedCategories:[1],
    //        categoryNames2:[ { text: 'Adsl', value: 0 },
    //    { text: 'Fibra', value: 1 },  { text: '5G', value: 2 },
    //    { text: 'Mobile', value: 3 }, { text: 'Estero', value: 4 }],
           newCategories:[],
           categoryNames:['Adsl','Fibra','5G','Mobile','Estero']
        }
    },
    methods: {
        // categoriesinArray(){
        //   let arr=[];
        //  this.categories.forEach(element => {
        //  arr.push(element.pivot.category_id);
        //  });
        //  return arr;
        // },
   update() {
        this.$emit('update', this.id,this.newName,this.newCostoMensile,this.newDescription,this.newDataInizio,this.newDataFine,this.newCategories);
      },
      del() {
        this.$emit('delete', this.id);
      },

    },
    mounted() {
      console.log(this.categories);
    // console.log(this.data_inizio);
         this.categories.forEach(element => {
         this.newCategories.push(element.id - 1);
         });
    },
    props: ['id','name','costo_mensile','descrizione','data_inizio','data_fine','categories'],
    filters: {
      properCase(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
      }
    }
  }
</script>
<style lang="scss" scoped>

.card{
    width:500px;
    border:4px solid black;
    border-radius:10px;
    margin:20px;
background-image:url('https://freerangestock.com/sample/25036/orange-gradient.jpg');
background-position: left center;
background-size: cover
}
</style>

